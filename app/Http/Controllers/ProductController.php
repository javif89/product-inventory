<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view($id) {
        return Product::with('variants')->where('id',$id)->first();
    }

    public function create(Request $request) {
        $product = Product::create($request->all());

        if(!empty($request->variants))
            $product->variants()->createMany($request->variants);

        return Product::with('variants')->where('id', $product->id)->first();
    }

    public function delete(Product $product) {
        $product->variants()->delete();
        $product->delete();
        return $product;
    }
}
