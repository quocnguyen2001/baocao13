<?php

namespace App\Http\Controllers;
use App\Models\envent;
use App\Models\book;
use App\Models\pay;
use App\Models\ve;
use App\Models\loaive;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (auth::check() ) {
            return view('admin.index');
        }else
        {
            return redirect()->route('login');
        }
        
    }
    public function dangnhap()
    {
        return view('admin.login');
    }
    public function check_login(Request $req)
    {   
        $mes_err=[
            //required
            'email.required'=>'Email không được để rỗng !',
            'pass.required'=>' Mật khẩu không được để rỗng !',
            
            
            //max
            //'email.max'=>'Tên sản phẩm không được quá 255 kí tự !',
            //min
            'email.min'=>'Email ít nhất phải 6 kí tự !',
            'pass.min'=>'Mật khẩu ít nhất phải 6 kí tự !',
            

            
        ];
        $validated = $req->validate([
            'email' => 'required|min:6',
            'pass' => 'required|min:6',
            
            
            
        ],$mes_err);
        $email=$req->email;
        $pass=$req->pass;

        //dd(Auth::attempt(['email'=>$user,'password'=>$pass]));
        if(Auth::attempt(['email'=>$email,'password'=>$pass])){
            return redirect()->route('admin');
            //return redirect()->route('home');
        }else
        return redirect()->route('login')->with('error','Sai email hoặc mật khẩu !');
        //return view('admin',['err'=>'Thông tin Email hoặc mật khẩu không chính xác']);
    }
    public function logout()
    {
        auth::logout();
        return redirect()->route('login')->with('warning','Đăng xuất thành công !');
    }
    public function loaive()
    {   
        if (auth::check() ) {
            $listloaive=loaive::all();
            return view('admin.ve.loaive')->with( ['listloaive'=>$listloaive]);
        }else
        {
            return redirect()->route('login');
        }
        
    }
    public function themloai()
    {   
        if (auth::check() ) {
            return view('admin.ve.add_loaive');
        }else
        {
            return redirect()->route('login');
        }
        //$listloaive=loaive::all();
        
    }
    public function themloai_db(Request $req)
    {   
        if (auth::check() ) {
            loaive::create([
                'tenloai' => $req->tenloai,
                'giave' => $req->giave,
                
            ]);
            return redirect()->route('loaive')->with('success','Thêm loại thành công!');
        }else
        {
            return redirect()->route('login');
        }
        
    }
    public function xoaloai($id)
    {   
        if (auth::check() ) {
            loaive::destroy($id);
            return redirect()->route('loaive')->with('success','Xóa loại thành công!');
        }else
        {
            return redirect()->route('login');
        }
       
    }
    public function edit_loai($id)
    {   
        if (auth::check() ) {
            $loaive=loaive::find($id);
            return view('admin.ve.edit_loaive')->with(['loaive'=>$loaive]);
        }else
        {
            return redirect()->route('login');
        }
        
    }
    public function edit_loai_db(Request $req, $id)
    {   
        if (auth::check() ) {
            loaive::find($id)->update([
                'tenloai' => $req->tenloai,
                'giave' => $req->giave,
                
            ]);
            return redirect()->route('loaive')->with('success','Cập nhật loại thành công!');
        }else
        {
            return redirect()->route('login');
        }
        
    }
    public function ve()
    {   
        if (auth::check() ) {
            $listve = DB::table('booking')->select()
            ->join('loaive', 'booking.loaive', '=', 'loaive.id')
            ->get();
            //$listve=book::all();
            return view('admin.ve.quanlyve',['listve'=>$listve]);
        }else
        {
            return redirect()->route('login');
        }
        
        //return redirect()->route('adminve')->with( ['listve'=>$listve]);;
    }
    public function vechitiet($id)
    {   
        
        if (auth::check() ) {
            $thongtinkh=DB::table('booking')->where('id_ve',$id)->first();
            $thongtintt=DB::table('payments')->where('id_ve',$id)->first();
            $thongtinve=DB::table('ve')->where('id_ve',$id)->get();
            //$listve=book::all();
            return view('admin.ve.chitietve',['kh'=>$thongtinkh,'tt'=>$thongtintt,'ve'=>$thongtinve]);
        }else
        {
            return redirect()->route('login');
        }
        
        //return redirect()->route('adminve')->with( ['listve'=>$listve]);;
    }
    public function thanhtoan()
    {   
        if (auth::check() ) {
            $list_tt=pay::all();
            return view('admin.thanhtoan.lichsuthanhtoan')->with(['list_tt'=>$list_tt]);
        }else
        {
            return redirect()->route('login');
        }
        //$list_tt = DB::table('payments')->select()
            //->join('booking', 'payments.id_ve', '=', 'booking.id_ve')
            //->join('loaive', 'booking.loaive', '=', 'loaive.id')
            //->get();
        
    }
    public function users()
    {
        return view('admin.thanhvien.thanhvien');
    }
    public function sukien()
    {   
        if (auth::check() ) {
            $list_entvents=envent::all();
            return view('admin.sukien.sukien',['envent'=>$list_entvents]);
        }else
        {
            return redirect()->route('login');
        }
        
    }
    public function add_sukien()
    {   
        if (auth::check() ) {
            return view('admin.sukien.add_sukien');
        }else
        {
            return redirect()->route('login');
        }
        
    }
    public function add_sukien_db(Request $req)
    {   
        if (auth::check() ) {
            //thêm ảnh
            if ($req-> has('file')) {
                $file = $req-> file; 
                $file_name = $file-> getClientOriginalName();
                $file->move(base_path('public/uploads'),$file_name);
                }
            // thêm vào db
            envent::create([
                'sk_name' => $req->sk_name,
                'sk_price' => $req->sk_price,
                'sk_address' => $req->sk_address,
                'sk_img' => $file_name,
                'sk_detail' => $req->sk_detail,
                'sk_time' => $req->sk_time,
                'sk_status' => '1'
            ]);
            return redirect()->route('admin_sukien');
        }else
        {
            return redirect()->route('login');
        }
        
    }
    public function edit_sukien($id)
    {   
        
        if (auth::check() ) {
            $envent=envent::find($id);
            return view('admin.sukien.edit_sukien',['envent'=>$envent]);
        }else
        {
            return redirect()->route('login');
        }
        
    }
    public function edit_sukien_db($id ,Request $req )
    {   
        if (auth::check() ) {
            if ($req-> has('file')) {
                $file = $req-> file; 
                $file_name = $file-> getClientOriginalName();
                $file->move(base_path('public/uploads'),$file_name);
                }
            else{
                $envent =envent::find($id);
                $file_name=$envent->sk_img;
            }
            envent::find($id)->update([
                'sk_name' => $req->sk_name,
                'sk_price' => $req->sk_price,
                'sk_address' => $req->sk_address,
                'sk_img' => $file_name,
                'sk_detail' => $req->sk_detail,
                'sk_time' => $req->sk_time,
                'sk_status' => '1'
                
            ]);
            return redirect()->route('admin_sukien');
        }else
        {
            return redirect()->route('login');
        }
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_sukien($id)
    {
        envent::destroy($id);
        return redirect()->route('admin_sukien');
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
