<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Customer;
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
}
