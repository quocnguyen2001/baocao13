<?php

namespace App\Http\Controllers;
use App\Models\envent;
use App\Models\loaive;
use App\Models\custom;
use App\Models\custom_home;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Mail;
use PDF;
class ControllerHome extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $mota_home=custom_home::find(1);
        $lienhe=custom::find(1);
        $listloaive=loaive::all();
        $url= url()->current();
        return view('nguoidung.index',['url'=>$url,'listloaive'=>$listloaive,'mota_home'=>$mota_home,'lienhe'=>$lienhe]);
    }
    public function lienhe()
    {   
        $lienhe=custom::find(1);
        $url= url()->current();
        return view('nguoidung.contact',['url'=>$url,'lienhe'=>$lienhe]);
    }
    public function sendmail(Request $req)
    {   
        $email=$req->email;
        //$url= url()->current();
        
        $data=['hoten'=>$req->hoten,'email'=>$req->email,'sdt'=>$req->sdt,'diachi'=>$req->diachi,'noidung'=>$req->noidung];
        Mail::send('email.mailcontact',['data'=>$data,],function($message) use ($email){
            
            $message->from('quocnguyenfpt01@gmail.com',"Đầm sen Park Contact");
            $message->to($email)->subject("Thông báo Contact khách hàng");
        });
        
        return redirect()->route('lienhe')->with('success','Gửi email liên hệ thành công!');
        //return view('nguoidung.contact',['url'=>$url]);
    }
    public function sukien()
    {   
        $lienhe=custom::find(1);
        $envent=envent::all();
        $url= url()->current();
        return view('nguoidung.envent',['url'=>$url,'envent'=>$envent,'lienhe'=>$lienhe]);
    }
    public function thanhtoan()
    {   
        $lienhe=custom::find(1);
        return view('nguoidung.thanhtoan',['lienhe'=>$lienhe]);
    }
    public function thanhcong()
    {   
        $lienhe=custom::find(1);
        return view('nguoidung.thanhcong',['lienhe'=>$lienhe]);
    }
    public function sukienct()
    {   
        $lienhe=custom::find(1);
        $url= url()->current();
        return view('nguoidung.sukien-chitiet',['url'=>$url,'lienhe'=>$lienhe]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf()
    {
        $pdf = PDF::loadView('pdf.pdf');
        return $pdf->download('pdf.pdf');
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
