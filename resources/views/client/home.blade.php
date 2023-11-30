

<!doctype html>
<html lang="en">

<head>
    <title>HOME</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Link ảnh -->
    <link rel="stylesheet" href="./img">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Link css -->
    <link rel="stylesheet" href="./home.css">

    <!-- Link fontanware -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- đưa về top -->
    <div id="top"></div>
    <!-- menu -->
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top">
        <div class="mr-10">
            <img src="/img/logo.jpg" alt="">

        </div>
        <div class="collapse navbar-collapse " id="collapsibleNavId">
            <div class="nav-middle ml-auto mr-auto">
                <a href="{{ route('client.home') }}" >
                    <i class="fa-solid fa-house" style="color: black"></i>
                </a>
                <a href="{{ route('client.quanly') }}" >
                    <i class="fa-solid fa-list"></i>
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
    <!-- end menu -->

    <!-- banner -->
    <div class="banner"></div>
    <!-- end banner -->

    <!-- content -->
    <div class="container pt-5">
        @php
            $i = 0;
        @endphp
        @foreach ($data as $key)
            @if ($i % 2 == 0)
                <hr class="pb-5">
                <div class="row">
                    <div class="col-sm-7 order-md-2">
                        <h2 class="fs-1 featurette-heading mt-5 pt-4 ">{{ $key->tensan }}</h2>
                        <h4>{{ $key->diachi }}</h2>
                            <p>{{ $key->sdt }}</p>
                            <a href="{{ route('client.datsan', ['id' => $key->id, 'day' => date('d-m-Y')]) }}" name="id"><div class="btn btn-success">Đặt ngay</div></a>
                            
                    </div>
                    <div class="col-sm-5">
                        @if (!empty($key->img))
                        <img src="{{$key->img}}" alt="" width="100%">
                            
                        @endif
                    </div>
                </div>
                <hr>
                @php
                    $i++;
                @endphp
            @else
                <hr class="pb-5">
                <div class="row">
                    <div class="col-sm-7 ">
                        <h2 class="fs-1 featurette-heading mt-5 pt-4 ">{{ $key->tensan }}</h2>
                        <h4>{{ $key->diachi }}</h2>
                            <p>{{ $key->sdt }}</p>
                            <a href="{{ route('client.datsan', ['id' => $key->id, 'day' => date('d-m-Y')]) }}" name="id"><div class="btn btn-success">Đặt ngay</div></a>
                    </div>
                    <div class="col-sm-5">
                        <img src="https://placehold.jp/500.png" alt="" width="100%">
                    </div>
                </div>
                <hr>
                @php
                    $i++;
                @endphp
            @endif
        @endforeach



        <div class="text-right mb-5">
            <a href="#top" class="top text-right">Back to top</a>
        </div>
    </div>

    <!-- end content -->
    <!-- Footer -->
    <footer>
        <div class="contact">
            <h2>Thông tin liên hệ</h2>
            <p>Địa chỉ: 236 Bùi Huy Bích, Nại Hiên Đông, Sơn Trà, Đà Nẵng </p>
            <p>Điện thoại: 0368037472 </p>
            <p>Email: ngochungnguyen2000dhktyddn@gmail.com</p>
        </div>
    </footer>
    <a href="https://www.facebook.com/profile.php?id=100009018094598">
        <i class="fa-brands fa-facebook"></i>
    </a>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>