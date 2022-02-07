<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đầm sen park</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
            integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
       
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
<body>
    
    <header>
    <div class="navigation" id="navigation">
            <div class="container100  container h-100">
                <div class="row h-100">
                    <div class="col-sm-3 div-logo">
                       <a href="/"> <img src="images/LittleLogo.png"  class="align-items-center " id="logo" alt=""></a>
                    </div>
                    <div class="col-sm-6  div-menu  ">
                        <ul class="d-flex nav nav-header align-items-center w-100 d-flex justify-content-around  ">
                        
                                
                            
                            <li class="nav-item ">
                              <a class=" nav-link  " href="/">Trang chủ </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link   " href="/su-kien">Sự kiện</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link  " href="/lien-he">Liên hệ</a>
                            </li>
                          </ul>
                    </div>
                    <div class="col-sm-3 d-flex div-tel align-items-center justify-content-end div-hotline">
                        <a href="tel:+840123456"><i class="tel-css bi bi-telephone"></i> 0123456874</a>
                    </div>
                    <div class="btn-menu" id="btn-menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section>


        <div class="main-section">


            <div class="container main-content">
                <div class="text-event">
                    <p>Thanh toán</p>
                   
                </div>
                <div class=" div-top">

                    <div class="div-ticket h490px payment-content row h-payment ">
                        <div class="sticker-girl1">

                        </div>
 
                        <div class="div-left ">
                            <div class="vecuaban"></div>
                            <div class="tiket-left-child pl-5 pr-5 pad-5"> 
                                <div class="d-flex pl-5  justify-content-between mt-5 block">
                                    <div class="div-input-price input-f d-block">
                                        
                                        
                                        <label for=""  class="w-100">Số tiền thanh toán</label>
                                        <input type="text"   name="" class="" value="{{number_format(session('tien'))}} " >
                                    </div>
                                    <div class="div-input-qty input-f d-inline">
                                        <label for=""  class="w-100 ">Số lượng vé</label>
                                        <input type="text"   name="" class="" value="{{session('soluong')}} ">  <span> vé</span>

                                    </div>
                                    <div class="div-input-date input-f d-block">
                                        <label class="w-100" for="">Ngày sử dụng</label>
                                        <input type="text"   name="" class="" value="{{session('ngaydung')}}" >
                                    </div>
                                   
                                   
                                </div>
                                <div class="tt-lienhe mt-4 pl-5 input-f d-block ">
                                    <label class="w-100" for="">Thông tin liên hệ</label>
                                    <input type="text"   name="" class="input-ttlh" value="{{session('hoten')}}" >
                                </div>
                                <div class="tt-lienhe mt-5 pl-5 input-f d-block ">
                                    <label class="w-100" for="">Điện thoại</label>
                                    <input type="text"   name="" class="input-ttlh" value="{{session('sdt')}}" >
                                </div>
                                <div class="tt-lienhe mt-5 pl-5 input-f d-block ">
                                    <label class="w-100" for="">Email</label>
                                    <input type="text"   name="" class="input-ttlh" value="{{session('email')}}" >
                                </div>
                            </div>
                        </div>

                        <div class="div-center stiker-custom "></div>
                        <div class="div-right h700px">
                            <div class="tiket-left-child">
                                <div class="sticker-payment"> 
                                </div>
                                <div class="div-form-tiket p-2">
                                    <form action="/thanh-toan" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_ve" value="{{session('id_ve')}}">
                                    <input type="hidden" name="sl" value="{{session('soluong')}}">
                                    <input type="hidden" name="sdt" value="{{session('sdt')}}">
                                    <input type="hidden" name="email" value="{{session('email')}}">
                                        <div class="tt-lienhe mt-5 input-f d-block ">
                                            <label class="w-100" for="">Số thẻ</label>
                                            <input type="number"   name="stk_payment" class="w-100  " value="{{old('stk_payment')}}" placeholder="Nhập sô thẻ" required
                                            @if($errors->has('stk_payment'))style="color:red;font-weight: 500 !important;"@endif
                                            >
                                        </div>
                                        <div class="tt-lienhe mt-5 input-f d-block ">
                                            <label class="w-100" for="">Họ tên chủ thẻ</label>
                                            <input type="text"   name="name_order" class="w-100  " value="{{old('name_order')}}" placeholder="Nhập họ tên thẻ" required
                                            @if($errors->has('name_order'))style="color:red;font-weight: 500 !important;"@endif>
                                        </div>
                                        <div class="tt-lienhe   input-f mt-5 d-block  ">
                                            <label class="w-100" for="">Hạn sự dụng thẻ</label>  
                                            <div class=" d-flex tt-lienhe   input-f ">
                                                <input type="text" name="hsd_the" id="date" value="{{old('hsd_the')}}" class="date-ticket-input w40" placeholder="Hạn sự dụng thẻ" id="" required
                                                @if($errors->has('hsd_the'))style="color:red;font-weight: 500 !important;"@endif
                                                >
                                                <label for="date"><div class="btndate"></div></label>
                                            </div>
                                         </div>
                                        <div class="tt-lienhe my-5   input-f d-block">
                                            <label for=""  class="w-100 ">CVV/CVC</label>
                                            <input type="number"   name="codeCVV" class="" value="{{old('codeCVV')}}" placeholder="Mã CVV/CVC" required 
                                            @if($errors->has('codeCVV'))style="color:red;font-weight: 500 !important;"@endif
                                            >   
    
                                        </div>
                                        <div class="btn-order-ticket mt-5">
                                            
                                            <button class="mt-2 btnhover" >Thanh toán</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>


    </section>

    <script src="assets/js/custom.js"></script>
</body>

</html>