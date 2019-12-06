<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        // parent::__constructor();
        $this->data = [
            'one' => 1111,
            'two' => 2,
            // 'user' => \Auth::guard('customer')->user(),
        ];
        view()->share($this->data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // \App::setLocale();
        // app()->setLocale('km');
        session(['set_lang' => 'km']);
        seesion('set_lang');

        $data = [];
        return view('admins.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $create = Product::create($request->all());

        \App\Libraries\ProductLib::createProductPriceHistories($create);
        // $create->productPriceHistories()->create([
        //     'new_price' => $request->price
        // ]);
        if ($create) return redirect()->back()->with('success', 'Add success');
        return redirect()->back()->with('fail', 'Fail to add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
       
        $data['category'] = Product::findOrFail($id);
        return view('admins.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $category = Product::findOrFail($product->id);
        $product->update($request->all());

        \App\Libraries\ProductLib::createProductPriceHistories($product, $category);
        // $data = [];
        // if ($category->price) $data['old_price'] = $category->price;
        // $data['new_price'] = $product->price;
        // if ($category->price != $product->price) $product->productPriceHistories()->create($data);

        if ($product) return redirect()->back()->with('success', 'Update success');
        return redirect()->back()->with('fail', 'Update to add');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
