<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- link tailwindcss   -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- link icon  -->
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


    <!-- Link fontanware -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- nav  -->
    <div class="">
        
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
        <!-- thanh chao ban  -->

        <div class="bg-gray-200 ">
            @if (Auth::guard('users')->check())
                <p class="mt-5 text-right font-bold ">Xin chào {{ Auth::guard('users')->user()->hoten }}</p>
            @endif
           
        </div>
        {{-- <div class="w-full bg-green-400 flex justify-center items-center flex-col">
            <div class="text-center font-bold text-3xl"> Wellcome !!  </div>
            <p class="text-center font-bold text-3xl "> {{ $data->tensan }}</p>
            <p class="text-center font-bold text-3xl "> {{ $data->diachi }}</p>
            <p class="text-center font-bold text-3xl "> {{ $data->sdt }}</p>
        </div> --}}
        <div class="w-full bg-green-300 overflow-hidden">
            <div class="w-full text-center py-2">
              <div class="marquee flex items-center space-x-4">
                <span class="inline-block py-1 uppercase">!! WELLCOME!! CHÀO MỪNG BẠN VỚI TRANG ĐẶT {{$data->tensan}} !! WELLCOME!!</span>
                {{-- <span class="inline-block py-1">Another scrolling message. </span> --}}
                <!-- Thêm các span khác nếu bạn muốn có nhiều thông báo hơn -->
              </div>
              <style>
                @keyframes marquee {
                  0% {
                    transform: translateX(100%);
                  }
                  100% {
                    transform: translateX(-100%);
                  }
                }
              
                .marquee {
                  display: inline-block;
                  white-space: nowrap;
                  animation: marquee 5s linear infinite;
                }
              </style>
              
            </div>
          </div>
          
    <!-- slide anh -->
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
    <!-- anh san  -->
    {{-- <div class="slideshow-container">
        @foreach ($img as $key)
        <div class="mySlides fade">
            <div class="w-4/12 mx-auto">
                <img src="{{ asset($key->duongdan) }}" style="width:100%">
            </div>
        </div>
        @endforeach

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div> --}}

    <!-- thong tin san  -->

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
                {{-- <form action="{{ route('client.editpost') }}" method="POST" class="mx-auto max-w-md">
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-auto block">
                        CHỈNH SỬA
                    </button>
                    @csrf
                </form> --}}
            </div>
        </div>
    </div>
    <!-- form chinh ngay va dat san  -->
    <div class="mx-auto w-8/12 mt-5 mb-5  ">
        <!-- form chinh ngày  -->
        <div class="flex items-center space-x-4 mx-auto justify-center mb-6">
            <form action="{{ route('client.datsanPost') }}" method="POST">
                <input type="hidden" name="day" value="{{ date('d-m-Y', strtotime($day . ' -1 day')) }}">
                <input type="hidden" name="id" value="{{ $data->id }}">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md"> <i
                        class="fa-solid fa-arrow-left"></i> </button>
                @csrf
            </form>

            <label class="text-xl">{{ $day }}</label>

            <form action="{{ route('client.datsanPost') }}" method="POST">
                <input type="hidden" name="day" value="{{ date('d-m-Y', strtotime($day . ' +1 day')) }}">
                <input type="hidden" name="id" value="{{ $data->id }}">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md"> <i
                        class="fa-solid fa-arrow-right"></i> </button>
                @csrf
            </form>
        </div>
        <!-- form san 5  -->
        <div class="form-san5 border-2 rounded-xl ">
            <p class="text-center bg-green-300 border-2 rounded-xl font-bold h-18 text-4xl">SÂN 5</p>

            <div class="overflow-x-auto">
                <table class="min-w-full border-2 border-black">
                    <thead>
                        <tr class="text-center bg-gray-300">
                            <th class="border-2 border-black p-2"> Time </th>
                            @foreach ($datasan5 as $key)
                                <th class="border p-2">{{ $key->tensan }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banggia5 as $key)
                            <tr class="text-center bg-gray-200">
                                <th class="border-2 border-black p-2">
                                    {{ $key->khunggio . 'h - ' . ($key->khunggio + 1) . 'h' }}
                                </th>
                                @foreach ($datasan5 as $keysan)
                                    @php
                                        $kt = 0;
                                    @endphp
                                    @foreach ($datsan as $ds)
                                        @if ($ds->khunggio == $key->khunggio && $ds->idsanbong == $keysan->id)
                                            <td class="border-2 border-black p-2 text-center bg-red-500">
                                                <div class="text-white mx-auto"> {{ $key->giatien }} $</div>
                                                <div class="text-center  w-full h-full font-bold text-white">
                                                    Đã Đặt
                                                </div>
                                                <?php
                                                $kt = 1;
                                                ?>
                                            @break
                                    @endif
                                @endforeach
                                @if ($kt == 0)
                                @if ($key->giatien > Auth::guard('users')->user()->acount)
                                <td
                                    class="border-2 border-black p-2 text-center bg-green-200 ">
                                    <div class="text-black mx-auto"> {{ $key->giatien }} $
                                    </div>
                                    <button type="submit"
                                        class="bg-blue-200 text-white p-2 rounded pointer-events-none select-none">Đặt
                                        sân</button>
                                    <div style="color: red">
                                        Bạn không đủ tiền!!
                                    </div>
                                @else
                                <td class="border-2 border-black p-2 text-center bg-green-200">
                                    <form action="{{ route('datsan.create') }}"
                                        method="POST">
                                        <div class="text-black mx-auto"> {{ $key->giatien }} $
                                        </div>

                                        <input type="hidden" name="idsancon"
                                            value="{{ $keysan->id }}">
                                        <input type="hidden" name="iduser"
                                            value="{{ Auth::guard('users')->user()->id }}">
                                        <input type="hidden" name="khunggio"
                                            value="{{ $key->khunggio }}">
                                        <input type="hidden" name="ngay"
                                            value="{{ $day }}">
                                        <input type="hidden" name="giatien"
                                            value="{{ $key->giatien }}">
                                        <input type="hidden" name="idsancha"
                                            value="{{ $data->id }}">
                                        <button type="submit"
                                            class="bg-blue-500 text-white p-2 rounded">Đặt
                                            sân</button>
                                        @csrf
                                    </form>
                            @endif
                                @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- form san 7  -->
        <div class="form-san7 border-2 rounded-xl  mt-4">
            <p class="text-center bg-green-300 border-2 rounded-xl font-bold h-18 text-4xl">SÂN 7</p>
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300">
                    <thead>
                        <tr class="text-center bg-gray-300">
                            <th class="border-2 border-black p-2"> Time </th>
                            @foreach ($datasan7 as $key)
                                <th class=" p-2 border-2 border-black ">{{ $key->tensan }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banggia7 as $key)
                            <tr class="text-center bg-gray-200 border-2 border-black">
                                <th class="border-2 border-black p-2 ">
                                    {{ $key->khunggio . 'h - ' . ($key->khunggio + 1) . 'h' }}
                                </th>
                                @foreach ($datasan7 as $keysan)
                                    {{-- {{ $key->giatien }} --}}
                                    @php
                                        $kt = 0;
                                    @endphp
                                    @foreach ($datsan as $ds)
                                        @if ($ds->khunggio == $key->khunggio && $ds->idsanbong == $keysan->id)
                                            <td class="border-2 border-black p-2 text-center bg-red-500">
                                                <div class="text-white mx-auto"> {{ $key->giatien }} $</div>
    
                                                <div class="text-center  w-full h-full font-bold text-white">
                                                    Đã Đặt
                                                </div>
                                                <?php
                                                $kt = 1;
                                                ?>
                                            @break
                                    @endif
                                @endforeach
                                @if ($kt == 0)
                                @if ($key->giatien > Auth::guard('users')->user()->acount)
                                <td
                                    class="border-2 border-black p-2 text-center bg-green-200 ">
                                    <div class="text-black mx-auto"> {{ $key->giatien }} $
                                    </div>
                                    <button type="submit"
                                        class="bg-blue-200 text-white p-2 rounded pointer-events-none select-none">Đặt
                                        sân</button>
                                    <div style="color: red">
                                        Bạn không đủ tiền!!
                                    </div>
                                @else
                                <td class="border-2 border-black p-2 text-center bg-green-200">
                                    <form action="{{ route('datsan.create') }}"
                                        method="POST">
                                        <div class="text-black mx-auto"> {{ $key->giatien }} $
                                        </div>

                                        <input type="hidden" name="idsancon"
                                            value="{{ $keysan->id }}">
                                        <input type="hidden" name="iduser"
                                            value="{{ Auth::guard('users')->user()->id }}">
                                        <input type="hidden" name="khunggio"
                                            value="{{ $key->khunggio }}">
                                        <input type="hidden" name="ngay"
                                            value="{{ $day }}">
                                        <input type="hidden" name="giatien"
                                            value="{{ $key->giatien }}">
                                        <input type="hidden" name="idsancha"
                                            value="{{ $data->id }}">
                                        <button type="submit"
                                            class="bg-blue-500 text-white p-2 rounded">Đặt
                                            sân</button>
                                        @csrf
                                    </form>
                            @endif
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

</div>

</body>

</html>
