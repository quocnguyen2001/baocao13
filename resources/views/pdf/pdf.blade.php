<style>
    h1{
        color:red;
    }
    body {
    font-family: DejaVu Sans, sans-serif;
    }
    table, th, td {  
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
<body>
    

<h1>Bạn đã đặt thành công vé</h1>
<li>Họ Tên : Nguyễn Văn Quốc</li>
<li>Số điện thoại : 0389598412</li>
<li>Thời gian in :{{$ngayin}}</li>

<hr>
<h3>Tất cả các vé</h3>
                        <table class="table" >
                        <thead>
                            <tr>
                            
                            <th scope="col">Mã vé</th>
                            <th scope="col">Loại vé</th>
                            <th scope="col">QR CODE</th>
                            <th scope="col">Hạn dùng</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($vedat as $v)
                            <tr>
                            <td >{{$v->mave}}</td>
                            <td >{{$v->tenloai}}</td>
                            <td><img class="card-img-top"
                                                        src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl={{$v->mave}}" width="100px"
                                                            alt="Card image cap"></td>
                            <td>Ngày sử dụng: 31/05/2021</td>
                        @endforeach   
                        </tbody>
                        </table>

            
                                            
                                            
                                            
                                            </body>