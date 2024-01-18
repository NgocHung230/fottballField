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

    <!-- JavaScript Bootstrap (Popper.js and Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    {{-- nav   --}}
    <div class="">
        <nav class="navbar navbar-expand-sm navbar-dark fixed-top">
            <div class="mr-10">
                <img src="/img/logo.jpg" alt="">
    
            </div>
            <div class="collapse navbar-collapse " id="collapsibleNavId">
                <div class="nav-middle ml-auto mr-auto">
                    <a href="{{ route('user.home') }}" >
                        <i class="fa-solid fa-house" ></i>
                    </a>
                    
                    <a href="{{ route('user.thongbao') }}" >
                        <i class="fa-solid fa-bell" style="color: black"></i>
                    </a>
                    
                    <a href="{{ route('user.profile') }}">
                        <i class="fa-solid fa-user-pen" ></i>
                    </a>
                    
                </div>
            </div>
            @if (Auth::guard('users')->check())
            <div class="flex-col ">
                <div class="dangnhap h-8">
                    <p>Xin chào {{ Auth::guard('users')->user()->hoten }}</p>
                    <a href="{{route('logout')}}">
                        <i class="fa-sharp fa-solid fa-right-from-bracket"></i>
                    </a>
                </div>
                <div class="text-center text-white text-xl ">
                    <p>{{ Auth::guard('users')->user()->acount }}$</p>
    
                </div>
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
        <div class="bg-green-300 text-center font-bold text-3xl">
            THÔNG BÁO
        </div>
        <div class="w-8/12 mx-auto">
            @foreach ($data as $key)
                <div>
                    @if ($key->updated_at == null)
                            <?php
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $dayCheck = now();
                            $modifiedDateTime = clone $dayCheck;
                            $modifiedDateTime->modify('-1 hour');   
                            
                            ?>
                            <div class="  mt-4 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-2 rounded-md">
                            <i class="fa-solid fa-bullhorn"></i>

                            Bạn đã đặt sân thành công {{ $key->tensancon }} - {{ $key->loaisan }} tại sân bóng
                            {{ $key->tensancha }},
                            địa chỉ {{ $key->diachi }} vào {{ $key->khunggio }}h-{{ $key->khunggio + 1 }}h ngày
                            {{ $key->ngay }} với giá tiền {{ $key->giatien }}$.
                            @if (Auth::guard('users')->user()->id==$key->iduser&&$key->updated_at==null&&$modifiedDateTime < DateTime::createFromFormat('Y-m-d H:i:s', $key->created_at))
                                <form action="" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$key->id}}">
                                    <input type="hidden" name="iddatsan" value="{{$key->iddatsan}}">
                                    <input type="hidden" name="idsancha" value="{{$key->idsancha}}">
                                    <input type="hidden" name="giatien" value="{{$key->giatien}}">
                                    <input type="hidden" name="ngay" value="{{$key->ngay}}">
                                    <button type="submit" style="color: red">Huỷ sân</button>
                                </form>
                            @endif

                        </div>
                        <label for="">{{$key->created_at}}</label>
                    @else
                        
                        <div class="  mt-4 bg-blue-100 border border-blue-400 text-red-700 px-4 py-2 rounded-md">
                        <i class="fa-solid fa-bullhorn"></i>

                        BẠN ĐÃ HUỶ SÂN THÀNH CÔNG !!

                        </div>
                    <label for="">{{$key->updated_at}}</label>

                    @endif
                    

                </div>
            @endforeach
        </div>
</body>
<footer class="bg-gray-800 text-white py-4 mt-9">
    <div class="container mx-auto text-center">
        <p>&copy; 2023 Nama Perusahaan. All Rights Reserved.</p>
        <p>Contact: info@perusahaan.com</p>
    </div>
</footer>

</html>
