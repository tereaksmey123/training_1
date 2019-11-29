<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Libraries\ProductLib;

class ProductController extends Controller
{
    protected $varShare;

    public function __construct()
    {
        // parent::__construct();

        // $this->middleware(function ($request, $next) {
            $this->varShare = [
                'categories' => \App\Models\Category::all(),
                'loanTypes' => \App\Models\LoanType::all(),
                // 'user' => \Auth::guard('customer')->user(),
            ];
            view()->share($this->varShare);
            // return $next($request);
        // });

        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [];
        // $data['categories'] = \App\Models\Category::all();
        // $data['loanTypes'] = \App\Models\LoanType::all();
        return view('admin.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = Product::create($request->only(['name', 'price']));
        // if ($request->price) $create->productPriceHistories()->create([
        //     'new_price' => $request->price
        // ]);

        ProductLib::createPriceHistory($create);
        return redirect()->back();
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
    public function edit(Product $product)
    {
        //
        $data = [];
        $data['entry'] = $product;
        // $data['categories'] = \App\Models\Category::all();
        // $data['loanTypes'] = \App\Models\LoanType::all();
        return view('admin.products.edit', $data);
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
        $oldEntry = Product::find($product->id);

        $product->update($request->only(['name', 'price']));

        // dd($product);

        ProductLib::createPriceHistory($product, $oldEntry);
        // if ($product->price != $oldEntry->price) {
        //     $product->productPriceHistories()->create([
        //         'old_price' => $oldEntry->price,
        //         'new_price' => $product->price
        //     ]);
        // }
        return redirect()->back();
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
