<?php

namespace App\Http\Controllers;

use App\Models\custom_home;
use Illuminate\Http\Request;

class CustomHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info_home=custom_home::find(1);
        return view('admin.custom.custom_home',['info_home'=>$info_home]);
    }

    public function save_home_db(Request $req)
    {
        custom_home::find(1)->update([
            'mota_home' => $req->mota_home,
            'dong1' => $req->dong1,
            'dong2' => $req->dong2,
            'dong3' => $req->dong3,
            'dong4' => $req->dong4,
            
            
        ]);
        return redirect()->route('tb_home')->with('success','Lưu thành công !');
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
     * @param  \App\Models\custom_home  $custom_home
     * @return \Illuminate\Http\Response
     */
    public function show(custom_home $custom_home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\custom_home  $custom_home
     * @return \Illuminate\Http\Response
     */
    public function edit(custom_home $custom_home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\custom_home  $custom_home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, custom_home $custom_home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\custom_home  $custom_home
     * @return \Illuminate\Http\Response
     */
    public function destroy(custom_home $custom_home)
    {
        //
    }
}
