<?php

namespace App\Http\Controllers;

use App\Models\custom;
use Illuminate\Http\Request;

class CustomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $info_contact=custom::find(1);
        return view('admin.custom.custom_contact',['info_contact'=>$info_contact]);
    }
    public function save_contact_db(Request $req)
    {   
        custom::find(1)->update([
            'email' => $req->email,
            'sdt' => $req->sdt,
            'diachi' => $req->diachi,
            'mota_lienhe' => $req->mota_lienhe,
            
            
        ]);
        return redirect()->route('tb_lienhe')->with('success','Lưu thành công !');
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
     * @param  \App\Models\custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function show(custom $custom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function edit(custom $custom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, custom $custom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function destroy(custom $custom)
    {
        //
    }
}
