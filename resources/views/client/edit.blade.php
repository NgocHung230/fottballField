<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản Lý Sân</title>
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
    <style>
        /* CSS để hiển thị danh sách ngang */
        ul.horizontal-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }
    </style>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="/slick_slide.js"></script>
    <!-- Link slick-slide -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <!-- Link css -->
    <link rel="stylesheet" href="/slick_slide.css">

    <!-- Link icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body class="">
    {{-- nav --}}
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top">
        <div class="mr-10">
            <img src="/img/logo.jpg" alt="">

        </div>
        <div class="collapse navbar-collapse " id="collapsibleNavId">
            <div class="nav-middle ml-auto mr-auto">
                <a href="{{ route('client.home') }}">
                    <i class="fa-solid fa-house"></i>
                </a>
                <a href="{{ route('client.quanly') }}">
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
    <h1 class="h-36">em yêu</h1>

    <!-- thong tin san   -->
    <div class="form-anh">
        {{-- them anh  --}}
        <div class="form-thong-tin flex justify-center items-center h-full  w-full ">
            <div class="w-full max-w-screen-lg">
                <div class=" w-full  ">
                    <div class="w-8/12 mx-auto border-4 rounded-xl bg-gray-200">
                        @if (session()->has('data'))
                            <?php $data = session('data'); ?>
                            <div class="border-2 rounded-xl bg-gray-100 w-full mx-auto ">
                                <div class="form-thong-tin ml-5 flex justify-center items-center h-full mb-12">
                                    <div class="w-full">
                                        <form action="{{ route('client.update') }}" method="POST"
                                            class="max-w-md mx-auto mt-8 items-center justify-center flex-col w-full ">
                                            <div class="mb-4 flex items-center">
                                                <label for="tensan"
                                                    class="text-gray-700 text-sm font-bold mr-2  text-xl w-3/12">Tên
                                                    sân:</label>
                                                <input type="text" name="tensan" id="tensan"
                                                    placeholder="Nhập tên sân" value="{{ $data->tensan }}"
                                                    class="w-full p-2  rounded ">
                                            </div>
                                            <div class="mb-4 flex items-center">
                                                <label for="diachi"
                                                    class="text-gray-700 text-sm font-bold mr-2 text-xl   w-3/12">Địa
                                                    chỉ:</label>
                                                <input type="text" name="diachi" id="diachi"
                                                    placeholder="Nhập địa chỉ sân" value="{{ $data->diachi }}"
                                                    class="w-full p-2  rounded  ">
                                            </div>

                                            <div class="mb-4 flex items-center">
                                                <label for="sdt"
                                                    class="text-gray-700 text-sm font-bold mr-2 text-xl  w-3/12">SĐT:</label>
                                                <input type="text" name="sdt" id="sdt"
                                                    placeholder="Nhập số điện thoại sân" value="{{ $data->sdt }}"
                                                    class="w-full p-2 rounded ">
                                            </div>

                                            <div class="justify-center items-center flex">
                                                <button type="submit"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue mx-auto ">
                                                    Cập nhật
                                                </button>

                                            </div>

                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                {{-- them hinh anh  --}}
                <div class=" w-6/12 mx-auto h-24 mt-2 mb-2">
                    <div class="w-full ">
                        <div class="border-2 mx-auto rounded-xl border-gray-500 ">
                            <p class="mx-auto text-center font-bold bg-green-300 border-2 rounded-xl">
                                HÌNH
                                ẢNH</p>
                            <form action="{{ route('hinhanh.upload') }}" method="POST"
                                enctype="multipart/form-data" class="text-center">
                                @csrf
                                <input type="file" name="image" id="img">
                                <input type="hidden" name="idsan" value="{{ $data->id }}">
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2"
                                    type="submit" id="btnupload">Upload</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- show anh  --}}
        <div class="image-slider">
            @if (session()->has('img'))
                <?php
                $img = session()->get('img');
                ?>
                @foreach ($img as $key)
                    <div class="image-item">
                        <div class="image">
                            <img src="{{ $key->duongdan }}" alt="">
                        </div>
                        <form action="{{ route('client.destroy') }}" method="POST" id="deleteForm">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="idimg" value="{{ $key->id }}">

                            <button
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-xl mb-2 mt-2"
                                type="button" onclick="confirmDelete()"><i class=" fa-solid fa-trash"></i></button>


                        </form>
                        <script>
                            function confirmDelete() {
                                if (confirm('Bạn có chắc chắn muốn xoá?')) {
                                    event.preventDefault();
                                    document.getElementById('deleteForm').submit();
                                }
                            }
                        </script>
                        


                        <!-- end thong tin san  -->

                    </div>
                @endforeach
            @endif

        </div>

        


        <!-- them san moi  -->
        <div class="border-2 rounded-xl mx-auto w-5/12 mb-8 mt-8">
            <p class="text-center border-2 font-bold bg-green-300 rounded-xl">Thêm mới sân</p>
            <p>
            <div class="justify-center items-center flex">
                <form action="{{ route('sanbong.create') }}" method="POST">
                    <label class="font-bold" for="">Tên sân: </label>
                    <input class="border-2" name="tensan" type="text" placeholder="Nhập tên sân">
                    <label class="font-bold" for="">Loại sân: </label>
                    <select class="border-2" name="loaisan" id="" class="form-select">

                        <option value="Sân 5">Sân 5</option>
                        <option value="Sân 7">Sân 7</option>
                    </select>
                    <input type="hidden" name="idsancha" value="{{ $data->id }}">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        type="submit" class="btn btn-infor">Thêm mới</button>
                    @csrf
                </form>
            </div>
            </p>
        </div>

        <!-- form dat san  -->

        <div class="form-thong-tin ml-5 flex justify-center items-center h-full mb-12 ">
            <div class="w-full max-w-screen-lg">
                <div class="grid grid-cols-2 gap-4 bg-b">
                    <!-- Phần 1 chiếm 1/2 san 5-->
                    <div class="col-span-1 w-full h-96 ">
                        <div class="border-2 rounded-xl ">
                            <!-- loai san 5  -->
                            <div class="w-full mx-auto rounded-xl overflow-auto">
                                <p
                                    class="mx-auto justify-center items-center flex bg-green-300 border-2 font-bold rounded-xl">
                                    SÂN 5</p>
                                <table class="w-full">
                                    @if (session()->has('san5'))
                                        <?php $san5 = session('san5'); ?>
                                        <thead>
                                            <tr>
                                                <th class="border-2">STT</th>
                                                <th class="border-2">Tên sân</th>
                                                <th class="border-2">Loại sân</th>
                                                <th class="border-2">Thao tác</th>
                                            </tr>
                                        </thead>
                                        @php $i=1; @endphp
                                        <tbody>
                                            @foreach ($san5 as $key)
                                                <tr class="text-center">
                                                    <td class="border-2">{{ $i++ }}</td>
                                                    <td class="border-2">{{ $key->tensan }}</td>
                                                    <td class="border-2">{{ $key->loaisan }}</td>
                                                    <td class="border-2 mb-4">
                                                        <form action="{{ route('sanbong.destroy') }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id"
                                                                value="{{ $key->id }}">
                                                            <button type="submit"
                                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                                <i class="fa-solid fa-xmark"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @endif
                                </table>
                            </div>

                        </div>
                    </div>
                    <!-- Phần 2 chiếm 1/2 san 7-->
                    <div class="col-span-1 w-full h-96 rounded-xl">
                        <div class="border-2 container flex flex-col rounded-xl overflow-auto">
                            <!-- San 7 -->
                            <div class="w-full mx-auto rounded-xl">
                                <p class="text-center bg-green-300 border-2 font-bold  rounded-xl">SÂN 7</p>
                                <table class="rounded-xl w-full">
                                    <thead class="-2">
                                        @if (session()->has('san7'))
                                            <?php $san7 = session('san7'); ?>
                                            <tr class="border-2 ">
                                                <th class="border-2">STT</th>
                                                <th class="border-2">Tên sân</th>
                                                <th class="border-2">Loại sân</th>
                                                <th class="border-2">Thao tác</th>
                                            </tr>
                                    </thead>
                                    <tbody class="border-2 text-center">
                                        @php $i=1; @endphp
                                        @foreach ($san7 as $key)
                                            <tr class="border-2 ">
                                                <td class="border-2">{{ $i++ }}</td>
                                                <td class="border-2">{{ $key->tensan }}</td>
                                                <td class="border-2">{{ $key->loaisan }}</td>
                                                <td class="justify-center items-center flex">
                                                    <form action="{{ route('sanbong.destroy') }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id"
                                                            value="{{ $key->id }}">
                                                        <button
                                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-center"
                                                            type="submit"><i class="fa-solid fa-xmark"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bang gia va them bang gia san 5  -->
    <div class="border-2 rounded-xl mx-auto w-8/12 ">
        <!-- {{-- Bảng giá san 5 --}} -->
        <div class="border-2 w-full mx-auto rounded-xl border-gray-400 overflow-auto ">
            <p class="mx-auto justify-center items-center flex bg-green-300 font-bold  border-2 rounded-xl">Bảng giá
                sân 5</p>
            <table class="border-2 w-full">
                @if (session()->has('banggia5'))
                    <?php $banggia5 = session('banggia5'); ?>
                    <tr class="border-2 ">
                        <th class="border-2 ">Khung giờ</th>
                        @foreach ($banggia5 as $key)
                            @php
                                $i = $key->khunggio;
                            @endphp

                            <td class="border-2 text-center">{{ $i . 'h - ' . $i + 1 . 'h' }}</td>
                        @endforeach
                    </tr>
                    <tr class="border-2">
                        <th class="border-2 ">Giá tiền</th>
                        @foreach ($banggia5 as $key)
                            <td class="border-2 text-center">{{ $key->giatien }}</td>
                        @endforeach
                    </tr>
                    <tr class="border-2 ">
                        <th class="border-2 "> Thao tác</th>
                        @foreach ($banggia5 as $key)
                            <td class="border-2 text-center">
                                <form action="{{ route('banggia.destroy') }}" method="POST">
                                    @method('DELETE')
                                    <input type="hidden" name='id' value="{{ $key->id }}">
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded "
                                        type="submit">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                    @csrf
                                </form>
                            </td>
                        @endforeach
                    </tr class="border-2">
                @endif
            </table>
        </div>
        <!-- them bang gia san 5  -->
        <div class=" w-full mx-auto rounded-xl border-2 justify-center items-center flex  ">
            <form class=" " action="{{ route('banggia.create5') }}" method="POST">
                <div class="justify-center items-center flex bg-green-300 border-2 rounded-xl">
                    <p class="font-bold ">Thêm bảng giá sân 5</p>
                </div>
                <label class="font-bold " for="">Khung giờ : </label>
                <select name="khunggio" id="" class="form-select border-2">
                    @for ($i = 5; $i <= 22; $i++)
                        @php $kt=0; @endphp @if (session()->has('banggia5'))
                            @php
                                $banggiasan5 = session('banggia5');
                            @endphp
                            @foreach ($banggiasan5 as $key)
                                @if ($key->khunggio == $i)
                                    {{ $kt = 1 }}
                                @break
                            @endif
                        @endforeach
                    @endif
                    @if ($kt == 1)
                        @continue
                    @endif
                    <option value="{{ $i }}">{{ $i . 'h - ' . $i + 1 . 'h' }}</option>
                @endfor

            </select>
            <label for="" class="font-bold ">Giá tiền : </label>
            <select name="giatien" id="" class="form-select border-2">
                @for ($i = 1; $i <= 80; $i++)
                    <option value="{{ $i * 5 + 100 }}">{{ $i * 5 + 100 }}
                    </option>
                @endfor

            </select>
            <input type="hidden" name="idsancha" value="{{ $data->id }}">
            <div class="justify-center items-center flex mt-6">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    type="submit">Thêm</button>
            </div>
            @csrf
        </form>
    </div>
</div>
<!-- bang gia va them gia san 7  -->
<div class="border-2 rounded-xl mx-auto w-8/12 ">
    <!-- bang gia san 7  -->
    <div class="border-2 w-full mx-auto rounded-xl border-gray-400 overflow-auto ">
        <p class="mx-auto justify-center items-center font-bold  flex bg-green-300 border-2 rounded-xl">Bảng giá
            sân 7</p>
        <table class="border-2 w-full">
            @if (session()->has('banggia7'))
                <?php $banggia7 = session('banggia7'); ?>
                <tr class="border-2">
                    <th class="border-2">Khung giờ</th>
                    @foreach ($banggia7 as $key)
                        @php
                            $i = $key->khunggio;
                        @endphp

                        <td class="border-2 text-center">{{ $i . 'h - ' . $i + 1 . 'h' }}</td>
                    @endforeach
                </tr>
                <tr class="border-2">
                    <th class="border-2">Giá tiền</th>
                    @foreach ($banggia7 as $key)
                        <td class="border-2 text-center">{{ $key->giatien }}</td>
                    @endforeach
                </tr>
                <tr class="border-2 ">
                    <th class="border-2"> Thao tác</th>
                    @foreach ($banggia7 as $key)
                        <td class="border-2 text-center">
                            <form action="{{ route('banggia.destroy') }}" method="POST">
                                @method('DELETE')
                                <input type="hidden" name='id' value="{{ $key->id }}">
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded "
                                    type="submit">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                                @csrf
                            </form>
                        </td>
                    @endforeach
                </tr class="border-2">
            @endif
        </table>
    </div>
    <!-- them bang gia san 7  -->
    <div class="w-full mx-auto rounded-xl border-2 justify-center items-center flex">
        <form class=" rounded-xl" action="{{ route('banggia.create7') }}" method="POST">
            <div class="justify-center items-center flex bg-green-300 border-2 rounded-xl">

                <p class="font-bold ">Thêm bảng giá sân 7</p>
            </div>
            <label class="font-bold " for="">Khung giờ : </label>
            <select name="khunggio" id="" class="form-select border-2">
                @for ($i = 5; $i <= 22; $i++)
                    @php $kt=0; @endphp @if (session()->has('banggia7'))
                        @php
                            $banggiasan7 = session('banggia7');
                        @endphp
                        @foreach ($banggiasan7 as $key)
                            @if ($key->khunggio == $i)
                                {{ $kt = 1 }}
                            @break
                        @endif
                    @endforeach
                @endif
                @if ($kt == 1)
                    @continue
                @endif
                <option value="{{ $i }}">{{ $i . 'h - ' . $i + 1 . 'h' }}</option>
            @endfor

        </select>
        <label class="font-bold " for="">Giá tiền : </label>
        <select name="giatien" id="" class="form-select border-2">
            @for ($i = 1; $i <= 80; $i++)
                <option value="{{ $i * 5 + 100 }}">{{ $i * 5 + 100 }}
                </option>
            @endfor

        </select>
        <input type="hidden" name="idsancha" value="{{ $data->id }}">
        <div class="justify-center items-center flex mt-6 ">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                type="submit">Thêm</button>
        </div>

        @csrf
    </form>
</div>
<!-- <p>Thêm bảng giá sân 7</p> -->
</div>

</body>

</html>
