<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // $request->validate
        $create = Category::create($request->only(['name']));
        if ($create) return redirect()->back()->with('success', 'Add success');
        return redirect()->back()->with('fail', 'Fail to add');
        // dd($request->all());
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
       
       $data['category'] = Category::findOrFail($id);
        return view('admins.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $validate = \Validator::make($request->all(),[], []);
        
        // if (imposible in laravel validate)$validate->errors()->add('name', 'You must update description agent field.');
        // return redirect()->back()->withErrors($validate);


        $category = Category::findOrFail($id);
        $create = $category->update($request->only(['name']));
        if ($create) return redirect()->back()->with('success', 'Update success');
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
