<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Link ảnh -->
    <link rel="stylesheet" href="/img">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Link css -->
    <link rel="stylesheet" href="/home.css">

    <!-- Link fontanware -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body class="p-4">
    {{-- nav --}}
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top">
        <div class="mr-10">
            <img src="/img/logo.jpg" alt="">

        </div>
        <div class="collapse navbar-collapse " id="collapsibleNavId">
            <div class="nav-middle ml-auto mr-auto">
                <a href="{{route('admin.home')}}" >
                    <i class="fa-solid fa-house"></i>
                </a>
                <a href="{{route('admin.quanly')}}" >
                    <i class="fa-solid fa-list" style="color: black"></i>
                </a>
                
                <a href="{{route('admin.profile')}}">
                    <i class="fa-solid fa-user-pen"></i>
                </a>
            </div>
            {{-- <ul class="navbar-nav ml-auto mr-auto mt-2 mt-lg-0 text-justify">
                <li class="nav-item active ">
                    <a class="nav-link" href="{{route('admin.home')}}">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('admin.quanly')}}">Quản lý</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Thông tin</a>
                </li>
            </ul> --}}
        </div>
        @if (Auth::guard('users')->check())
            <div class="dangnhap">
                <p>Xin chào {{ Auth::guard('users')->user()->hoten }}</p>
                <a href="{{route('logout')}}">
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
    <p class="text-center mb-4">Xin chào {{ Auth::guard('users')->user()->hoten }}</p>

    @if (Session::has('thongbao'))
        <div class="e p-4 mb-4 text-center " style="color: green">
            {{ Session::get('thongbao') }}
        </div>
    @endif
<div class="w-8/12 mx-auto border-2 rounded-xl shadow-sm">
    <h1 class="text-center font-bold text-xl bg-green-300 border-2 rounded-xl "> QUẢN LÝ TÀI KHOẢN</h1>
    <table class=" border-2 border-black w-full rounded-xl mx-auto">
        <thead>
            <tr>
                <th class="border p-2">STT</th>
                <th class="border p-2">Họ tên</th>
                <th class="border p-2">Chức vụ</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1
            @endphp

            @foreach ($data as $key)
                <tr class="text-center">
                    <td class="border p-2">{{ $i++ }}</td>
                    <td class="border p-2">{{ $key->hoten }}</td>
                    <td class="border p-2">{{ $key->role }}</td>
                    <td class="border p-2">{{ $key->email }}</td>
                    <td class="border p-2">
                        <form action="{{ route('admin.edit') }}" method="POST" class="inline">

                            <input type="hidden" name="id" value="{{ $key->id }}">
                            <button type="submit"class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Sửa</button>
                            
                            @csrf
                        </form>
                        <form action="{{ route('admin.destroy', $key->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $key->id }}">
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

<!-- Footer -->

</body>

</html>
