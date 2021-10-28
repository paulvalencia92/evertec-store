<?php

namespace App\Http\Controllers;

use App\Helpers\Uploader;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::withCount('orders')->get();
        return view('products.index', compact('products'));
    }



    public function store(ProductRequest $request)
    {

        $file = Uploader::uploadFile('file', 'products');

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            "file" => $file,
        ]);

        return redirect()
            ->route('products.index')
            ->with("message", ["success", __("El producto ha sido registrado con exito")]);
    }


    public function update(ProductRequest $request)
    {
        $product = Product::findOrFail($request->id);
        $file = $product->file;

        if ($request->hasFile('file')) {
            if ($product->file) {
                Uploader::removeFile("products", $product->file);
            }
            $file = Uploader::uploadFile('file', 'products');
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->file = $file;
        $product->save();

        return redirect()
            ->route('products.index')
            ->with("message", ["success", __("El producto ha sido actulizado con exito")]);
    }


    public function destroy(Product $product)
    {
        Uploader::removeFile("products", $product->file);
        $product->delete();
        return redirect()
            ->route('products.index')
            ->with("message", ["success", __("El producto ha sido eliminado con exito")]);
    }
}
