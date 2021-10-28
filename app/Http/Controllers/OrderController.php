<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Customer;
use App\Models\Order;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(OrderRequest $request)
    {
        try {
            DB::beginTransaction();

            $customer = Customer::firstOrCreate(
                ['email' => $request->email],
                [
                    'name' => $request->name,
                    'movil' => $request->movil,
                    'address' => $request->address,
                    'city' => $request->city,
                ]
            );

            $customer->orders()->create([
                'code' => uniqid(),
                'product_id' => $request->product_id
            ]);

            DB::commit();
            return redirect()
                ->route('products.index')
                ->with("message", ["success", __("Muchas gracias por tu pedido, se ha generado tu orden")]);

        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('message', ['danger', $exception->getMessage()]);
        }
    }



    public function getMyOrders()
    {
        $orders = Order::filtered();
        return view('orders.my_orders', compact('orders'));
    }


    public function search()
    {
        session()->remove('search[email]');
        if (request('search')) {
            session()->put('search[email]', request('search'));
            session()->save();
        }

        return redirect(route('orders.owner'));
    }


    public function payOrder(Request $request, Order $order)
    {
        $order->load('product');

        $placetopay = new PlacetoPay([
            'login' => env('PTPAY_LOGIN'),
            'tranKey' => env('PTPAY_TRANKEY'),
            'baseUrl' => 'https://dev.placetopay.com/redirection/',
            'timeout' => 10000
        ]);


        $reference = $order->code;

        $request = [
            'payment' => [
                'reference' => $reference,
                'description' => "Pago producto - {$order->product->name}",
                'amount' => [
                    'currency' => 'USD',
                    'total' => $order->product->price,
                ],
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => env('APP_URL') . "/orders/{$reference}/payed",
            'cancelUrl' => env('APP_URL') . "/orders/{$reference}/reject",
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];

        $response = $placetopay->request($request);

        if ($response->isSuccessful()) {
            $url = $response->processUrl();
            return redirect()->away($url);
        } else {
            $response->status()->message();
        }
    }


    public function acceptOrder($code)
    {
        $order = Order::where('code', $code)->first();
        $order->status = Order::PAYED;
        $order->save();
        return redirect()->route('orders.owner')
            ->with("message", ["success", __("La orden ha sido generada correctamente, pronto llegara su pedido")]);
    }


    public function rejectOrder($code)
    {
        $order = Order::where('code', $code)->first();
        $order->status = Order::REJECTED;
        $order->save();
        return redirect()->route('orders.owner')
            ->with("message", ["danger", __("La orden ha sido rechaza")]);
    }
}
