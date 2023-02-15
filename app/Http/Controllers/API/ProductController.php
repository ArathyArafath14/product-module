<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\ProductData;
use App\Mail\ProductMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Exception;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductData::latest()->with('user')->paginate(5);
        return response()->json($products);
        //return view('product.index', $data);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(ProductRequest $request)
    {
        try{
            $product = ProductData::create($request->all());

            $notification = array(
                'message' => 'Product saved successfully!',
                'alert-type' => 'success'
            );

            $email = Auth::user()->email;

           Mail::to($data['email'])->send(new ProductMail($product));
             return redirect()->route('products.index')->with($notification);
           

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('products.index')->with($notification);
        }
    }

    public function show(ProductData $product)
    {
        //
    }

    public function edit(ProductData $product)
    {
        $data['product'] = $product;
        return view('product.edit', $data);
    }

    public function update(ProductRequest $request, ProductData $product)
    {

        try {
            $product = $product->update($request->all());

            $notification = array(
                'message' => 'Product saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('products.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('products.index')->with($notification);
        }
    }

    public function destroy(ProductData $product)
    {
        try{
            ProductData::find($product->id)->delete();

            $notification = array(
                'message' => 'Product deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('products.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('products.index')->with($notification);
        }
    }
}