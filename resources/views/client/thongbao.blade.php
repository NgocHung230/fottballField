<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- link css  -->
    <link rel="stylesheet" href="/home.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- JavaScript Bootstrap (Popper.js and Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    {{-- nav   --}}
    <div class="">
       {{-- nav  --}}
       <nav class="navbar navbar-expand-sm navbar-dark fixed-top">
        <div class="mr-10">
            <img src="/img/logo.jpg" alt="">

        </div>
        <div class="collapse navbar-collapse " id="collapsibleNavId">
            <div class="nav-middle ml-auto mr-auto">
                <a href="{{ route('client.home') }}" >
                    <i class="fa-solid fa-house" ></i>
                </a>
                <a href="{{ route('client.quanly') }}" >
                    <i class="fa-solid fa-list"></i>
                </a>
                <a href="{{ route('client.thongbao') }}" >
                    <i class="fa-solid fa-bell" style="color: black"></i>
                </a>
                <a href="{{ route('client.thongke') }}">
                    <i class="fa-solid fa-chart-simple"></i>
                </a>
                <a href="{{ route('client.profile') }}">
                    <i class="fa-solid fa-user-pen"></i>
                </a>
                
            </div>
            {{-- <ul class="navbar-nav ml-auto mr-auto mt-2 mt-lg-0 text-justify">
                <li class="nav-item active ">
                    <a class="nav-link" href="{{ route('client.home') }}">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('client.quanly') }}">Quản lý</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('client.thongbao') }}">Thông báo</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('client.thongke') }}">Thống kê</a>
                </li>
            </ul> --}}
        </div>
        @if (Auth::guard('users')->check())
            <div class="dangnhap">
                <p>Xin chào {{ Auth::guard('users')->user()->hoten }}</p>
                <a href="{{ route('logout') }}">
                    <i class="fa-sharp fa-solid fa-right-from-bracket"></i>
                </a>

            </div>
        @else
            <div class="user">
                <div class="avatar ml-5">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <div class="sign">
                    <a href="">Đăng nhập</a>
                    <a href="">Đăng ký</a>
                </div>
            </div>
        @endif


    </nav>
        @if (Auth::guard('users')->check())
            <p>Xin chào {{ Auth::guard('users')->user()->hoten }}</p>
        @endif

        <p>Đây là User ThongBao</p>
        <div class="text-center font-bold text-3xl"
            THÔNG BÁO
            <i class="fa-solid fa-bullhorn"></i>
        </div>
        
        <div class="w-8/12 mx-auto">
            @foreach ($data as $key)
                <div>
                    @if ($key->updated_at == null)
                        

                        <div class="  mt-4 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-2 rounded-md">
                            <i class="fa-solid fa-bullhorn"></i>

                            {{$key->hoten}} ({{$key->email}}) đã đặt sân thành công {{ $key->tensancon }} - {{ $key->loaisan }} tại sân bóng
                            {{ $key->tensancha }},
                            địa chỉ {{ $key->diachi }} vào {{ $key->khunggio }}h-{{ $key->khunggio + 1 }}h ngày
                            {{ $key->ngay }} với giá tiền {{ $key->giatien }}$.
                            
                            
                        </div>
                        <label for="">{{$key->created_at}}</label>
                    @else
                        <div class="  mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md">
                            <i class="fa-solid fa-bullhorn"></i>

                            {{$key->hoten}} ({{$key->email}}) đã huỷ sân !!
                            
                            
                        </div>
                        <label for="">{{$key->updated_at}}</label>
                    @endif
                    

                </div>
            @endforeach
        </div>
</body>
<footer class="h-34 bg-gray-800 text-white py-4 mt-9">
    <div class="container mx-auto text-center">
        <div class="container">
            <p>Copyright © 2023. Sport Finder . All Rights Reserved.</p>
        </div>
    </div>
</footer>

</html>
