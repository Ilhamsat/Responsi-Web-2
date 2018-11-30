<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\a13382_ilhamsatriadi_model;

class a13382_ilhamsatriadi_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = a13382_ilhamsatriadi_model::all();
            return view('customer',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = new a13382_ilhamsatriadi_model();
		 $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->creditCardNumber = $request->creditCardNumber;
        $data->save();
        return redirect()->route('customer.index')->with('alert-success','Berhasil Menambahkan Data User!');
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
        $data = a13382_ilhamsatriadi_model::where('id',$id)->get();
        return view('customer_edit',compact('data'));
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
        $data = a13382_ilhamsatriadi_model::where('id',$id)->first();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->creditCardNumber = $request->creditCardNumber;
        $data->save();
        return redirect()->route('customer.index')->with('alert-success','Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = a13382_ilhamsatriadi_model::where('id',$id)->first();
        $data->delete();
        return redirect()->route('customer.index')->with('alert-success','Data berhasil dihapus!');
    }
}
