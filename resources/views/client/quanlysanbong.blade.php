<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/img">
    
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
                    <i class="fa-solid fa-list" style="color: black"> </i>
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
    
    
     
    

    <!-- slide -->
    <div id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($img as $key => $item)
                <li data-target="#carouselId" data-slide-to="{{$key}}" {{$loop->first ? 'class="active"' : ''}}></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($img as $key)
                <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10" style="height: 700px;">
                            <img src="{{$key->duongdan}}" width="100%" height="100%">
                            <div class="carousel-caption d-none d-md-block text-right">
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
            <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
    <!-- end slide -->
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>




    <!-- {{-- form chinh sua thong tin  --}} -->
    <div class="form-thong-tin ml-5 flex justify-center items-center h-144 mb-5">
        <div class="w-6/12">
            <div class="text-center font-bold  text-xl bg-green-300 border-2 rounded-xl"> THÔNG TIN SÂN BÓNG <i
                    class="fa-solid fa-futbol"></i> </div>
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4 flex text-center">
                    <label class=" w-full text-base text-gray-700  font-bold mb-2  text-3xl text-center">Tên sân: {{ $data->tensan }}</label>  
                </div>
                <div class="mb-4 flex pt-4">
                    <label class=" w-full text-base text-gray-700  font-bold mb-2 text-3xl text-center ">Địa chỉ: {{ $data->diachi }}</label>  
                </div>
                <div class="mb-4 flex pt-4">
                    <label class=" w-full text-base text-gray-700  font-bold mb-2 text-3xl text-center ">SDT: {{ $data->sdt }}</label>  
                </div>
                <form action="{{ route('client.editpost') }}" method="POST" class="mx-auto max-w-md">
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-auto block">
                        CHỈNH SỬA
                    </button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <!-- form chinh ngay va thong tin  -->
    <div class="border-2 w-8/12 mx-auto rounded-xl mb-10">

        <p>
            <!-- {{-- form chinh ngay  --}} -->
        <div class="flex items-center justify-center space-x-4 mb-4 ">
            <form action="{{ route('client.quanlywithdb') }}" method="POST">
                <input type="hidden" name="day" value="{{ date('d-m-Y', strtotime($day . ' -1 day')) }}">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fa-solid fa-caret-left"></i>

                </button>
                @csrf
            </form>

            <span class="text-xl">{{ $day }}</span>

            <form action="{{ route('client.quanlywithdb') }}" method="POST">
                <input type="hidden" name="day" value="{{ date('d-m-Y', strtotime($day . ' +1 day')) }}">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fa-solid fa-caret-right"></i>
                </button>
            @csrf
            </form>

        </div>
        </p>
        <!-- {{-- form san 5  --}} -->
        <div class="border-2 rounded-xl w-full mx-auto ">
            <p class="text-center bg-green-300 border-2 rounded-xl font-bold h-18 text-4xl">SÂN 5</p>
            <div class="w-full mx-auto rounded overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-300">
                            <th class="border-2 border-black py-2 px-4 text-center">Time</th>
                            @foreach ($datasan5 as $key)
                                <th class="border-2 border-black py-2 px-4 text-center">{{ $key->tensan }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banggia5 as $key)
                            <tr class="bg-gray-200">
                                <th class="border-2 border-black py-2 px-4 text-center">
                                    {{ $key->khunggio . 'h - ' . ($key->khunggio + 1) . 'h' }}</th>
                                @foreach ($datasan5 as $keysan)
                                    @php
                                        $kt = 0;
                                    @endphp
                                    @foreach ($datsan as $ds)
                                        @if ($ds->khunggio == $key->khunggio && $ds->idsanbong == $keysan->id)
                                            <td class="border-2 border-black py-2 px-4 text-center bg-red-500">
                                                {{ $key->giatien }}
                                                (Đã Đặt)
                                                <?php
                                                $kt = 1;
                                                ?>
                                            @break
                                    @endif
                                @endforeach
                                @if ($kt == 0)
                                    <td class="border-2 border-black py-2 px-4 text-center bg-green-300">
                                        {{ $key->giatien }}

                                        (Chưa Đặt)
                                @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <!-- form san 7  -->
    <div class="border-2 rounded-xl w-full mx-auto mt-16 ">
        <p class="text-center bg-green-300 border-2 rounded-xl font-bold h-18 text-4xl">SÂN 7</p>

        <div class="w-full mx-auto rounded overflow-x-auto">
            <table class=" w-full">
                <thead>
                    <tr class="bg-gray-300">
                        <th class="border-2 border-black py-2 px-4">Time</th>
                        @foreach ($datasan7 as $key)
                            <th class="border-2 border-black py-2 px-4 text-center">{{ $key->tensan }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banggia7 as $key)
                        <tr class="bg-gray-200">
                            <th class=" border-2 border-black py-2 px-4 rounded-xl text-center">
                                {{ $key->khunggio . 'h - ' . $key->khunggio + 1 . 'h' }}</th>
                            @foreach ($datasan7 as $keysan)
                                @php
                                    $kt = 0;
                                @endphp
                                @foreach ($datsan as $ds)
                                    @if ($ds->khunggio == $key->khunggio && $ds->idsanbong == $keysan->id)
                                        <td class=" border-2 border-black py-2 px-4  bg-red-500 text-center">
                                            {{ $key->giatien }}

                                            (Đã đặt)
                                            <?php
                                            $kt = 1;
                                            ?>
                                        @break
                                @endif
                            @endforeach
                            @if ($kt == 0)
                                <td class=" border-2 border-black py-2 px-4 bg-green-300  text-center">
                                    {{ $key->giatien }}

                                    (Chưa đặt)
                            @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>

</body>


</html>
