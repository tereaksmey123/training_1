<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\WebApi\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $request['status'] = 1;
        $products = Product::paginate(25);
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'category_id' => 'required|integer|exists:categories,id'
        ]);

        $product = Product::create($request->only([
            'name', 'price', 'category_id', 'profile'
        ]));
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModelsProduct  $modelsProduct
     * @return \Illuminate\Http\Response
     */
    public function show(Product $modelsProduct)
    {
        //
    }

    // public function update(Request $request, Product $product)
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->only([
            'name', 'price', 'category_id', 'profile'
        ]));

        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModelsProduct  $modelsProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $modelsProduct)
    {
        
    }
}
