<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- link css  -->
    <link rel="stylesheet" href="/home.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- JavaScript Bootstrap (Popper.js and Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>

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
                    <i class="fa-solid fa-list" style="color: black"></i>
                </a>
                <a href="{{ route('client.thongbao') }}">
                    <i class="fa-solid fa-bell"></i>
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

    <p class="my-4">Đây là trang Client thêm mới sân bóng</p>
    <h1 class="text-center bg-green-300"> 
        Thêm Mới Sân Bóng
    </h1>

    <form action="{{ route('client.update') }}" method="POST" class="max-w-md mx-auto border p-4 rounded">
        <div class="mb-4">
            <label for="tensan" class="block text-sm font-medium text-gray-700">Tên sân:</label>
            <input type="text" name="tensan" id="tensan" placeholder="Nhập tên sân"
                class="mt-1 p-2 border rounded-md w-full">
        </div>
        <div class="mb-4">
            <label for="diachi" class="block text-sm font-medium text-gray-700">Địa chỉ:</label>
            <input type="text" name="diachi" id="diachi" placeholder="Nhập địa chỉ sân"
                class="mt-1 p-2 border rounded-md w-full">
        </div>
        <div class="mb-4">
            <label for="sdt" class="block text-sm font-medium text-gray-700">SĐT:</label>
            <input type="text" name="sdt" id="sdt" placeholder="Nhập số điện thoại sân"
                class="mt-1 p-2 border rounded-md w-full">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">TẠO MỚI</button>
        @csrf
    </form>
</body>

</html>
