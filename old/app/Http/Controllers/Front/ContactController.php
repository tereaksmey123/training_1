<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        


        $types = \App\Models\ContactType::with(['contacts'])->get();
        return response()->json($types);
    //     $create = \App\Models\Contact::create([ 'name' => 'dara', 'date' => now(), 'contact_type_id' => 3]);

    //    $contacts = \App\Models\Contact::find($create->id);
    //     // $contacts->created_at->format('d F Y')
    // //    ->where('a', 'abc')->where('b', 3)
    //    ;
    // //    dd($contacts);
    //    return response()->json([
    //        'relationship' => $contacts->contactType->name,
    //        'name' => $contacts->name,
    //        'id' => $contacts->id,
    //        'code' => $contacts->code,
    //        'date' => $contacts->date,
    //        'date' => $contacts->date->format('d F Y')
    //     //    'now' => \Carbon\Carbon::parse(date('y-m-d'))->format('d F Y'),
    //     //    'date' => $contacts->created_at,
    //     //    'format' => $contacts->created_at->format('d F Y')
    //    ]);
    //    var_dump();die():
    //    $where(column, logic, value)
    //    column, value
    //    ->where(function ($q) {

    //    })
    //    (a =1 OR b = 1)
    //    where id = 1
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
