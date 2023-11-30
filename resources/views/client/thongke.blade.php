<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>THỐNG KÊ</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- link css  -->
    {{-- <link rel="stylesheet" href="/home.css"> --}}
    <link rel="stylesheet" href="/chart.css">
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


    <!-- Link js -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
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
                <a href="{{ route('client.thongbao') }}">
                    <i class="fa-solid fa-bell"></i>
                </a>
                <a href="{{ route('client.thongke') }}" >
                    <i class="fa-solid fa-chart-simple" style="color: black"></i>
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

    {{-- page-load --}}

    <?php
        $dayNow = date('d-m-Y');
        $ngay = explode('-', $dayNow);
        $labelThang =[];
        $dtThang = [];
        switch ($thang) {
            case '1':
            case '3':
            case '5':
            case '7':
            case '8':
            case '10':
            case '12':
            for ($i=1; $i <=31 ; $i++) { 
                array_push($labelThang,$i);
                $kt=0;
                foreach ($dataNgay as $key => $value) {
                    if ($key->ngay == $i)
                    {
                        array_push($dtThang,(int)$key->doanhso);
                        $kt=1;
                        break;
                    }
                }
                if ($kt==0)
                    array_push($dtThang,0);
            }
                break;
            case '4':
            case '6':
            case '9':
            case '11':
            for ($i=1; $i <=30 ; $i++) { 
                array_push($labelThang,$i);
                $kt=0;
                foreach ($dataNgay as $key) {
                    if ($key->ngay == $i)
                    {
                        array_push($dtThang,$key->doanhso);
                        $kt=1;
                        break;
                    }
                }
                if ($kt==0)
                    array_push($dtThang,(int)0);
            }
            break;
            default:
                for ($i=1; $i <=28 ; $i++) { 
                    array_push($labelThang,$i);
                    $kt=0;
                    foreach ($dataNgay as $key => $value) {
                        if ($key->ngay == $i)
                        {
                            array_push($dtThang,$key->doanhso);
                            $kt=1;
                            break;
                        }
                    }
                    if ($kt==0)
                        array_push($dtThang,(int)0);
                }
                break;
        }

        $labelNam =[];
        $dtNam = [];
        for ($i = 1; $i <= 12; $i++)
        {

            $kt = 0;
            array_push($labelNam,$i);
            foreach ($dataThang as $key)
                if ($key->thang == $i)
                {
                    array_push($dtNam,$key->doanhso);
                    $kt = 1;
                    break;
                }
            if ($kt == 0)
            array_push($dtNam,0);
        }

    ?>
    <div class="container">
        <div class="title">BIỂU ĐỒ THỐNG KÊ DOANH THU</div>
        <canvas id="canvas-1"></canvas> 
        <div class="thongkeThang">
            <h3>Doanh thu tháng</h3>      
            <form action="" method="POST">
                @csrf
                <select class="inputThang" name="thang" onchange="this.form.submit()">
                    @for ($i = 1; $i <= $ngay[1]; $i++)
                        <option value="{{ $i }}" {{ $thang == $i ? 'selected' : '' }}>Tháng {{ $i }}
                        </option>
                    @endfor
                </select>
                <input type="hidden" name="nam" value="{{$nam}}">
                <label for=""> Năm {{ $ngay[2] }}</label>
            </form>
            </div>
        <hr>
        <canvas id="canvas-2"></canvas>
        <div class="thongkeNam">
            <h3>Doanh thu năm</h3>   
            <form action="" method="POST">
                @csrf
                <select class="inputNam" name="nam" onchange="this.form.submit()">
                    @for ($i = 2010; $i <= $ngay[2]; $i++)
                        <option value="{{ $i }}" {{ $nam == $i ? 'selected' : '' }}>Năm {{ $i }}
                        </option>
                    @endfor
                </select>
                <input type="hidden" name="thang" value="{{$thang}}">
    
            </form>
            </div>   
    </div>

    <script >
        var labels = <?php echo json_encode($labelThang); ?>;
        var data = <?php echo json_encode($dtThang); ?>;
        const dataThang={
            labels:labels,
            datasets:[
                {
                    label: "Tổng Tiền",
                    backgroundColor: "green",
                    borderColor:"green",
                    data: data,
                }
                
            ]
        }

        var labelsN = <?php echo json_encode($labelNam); ?>;
        var dataN = <?php echo json_encode($dtNam); ?>;
        const dataNam={
            labels:labelsN,
            datasets:[
                {
                    label: "Tổng Tiền",
                    backgroundColor: "green",
                    borderColor:"green",
                    // fill: false,
                    data: dataN,
                }   
            ]
        }

        const config1 ={
            type: "bar",
            data:dataThang,
        }
        const config2={
            type: "line",
            data:dataNam,
        }
        const canvas1=document.getElementById("canvas-1");
        const canvas2=document.getElementById("canvas-2");
        const chart1=new Chart(canvas1,config1)
        const chart2=new Chart(canvas2,config2)
    </script>
</body>


</html>