<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if (Auth::guard('users')->check())
        <p>Xin chào {{ Auth::guard('users')->user()->hoten }}</p>
    @endif

    <p>Đây là trang Client chỉnh sửa sân bóng</p>
    @if (session()->has('data'))
        <?php $data = session('data'); ?>
        <form action="{{ route('client.update') }}" method="POST">
            <div>
                <label for="">Tên sân: </label>
                <input type="text" name="tensan" placeholder="Nhập tên sân" value="{{ $data->tensan }}">
            </div>
            <div>
                <label for="">Địa chỉ: </label>
                <input type="text" name="diachi" placeholder="Nhập địa chỉ sân" value="{{ $data->diachi }}">
            </div>
            <div>
                <label for="">SĐT: </label>
                <input type="text" name="sdt" placeholder="Nhập số điện thoại sân" value="{{ $data->sdt }}">
            </div>
            <button type="submit">Cập nhật</button>
            @csrf
        </form>
    @endif


    <p>HÌNH ẢNH</p>
    <form action="{{ route('hinhanh.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" id="img">
        <input type="hidden" name="idsan" value="{{ $data->id }}">
        <button type="submit" id="btnupload">Upload</button>
    </form>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session()->has('img'))
        @foreach (session('img') as $key)
            <div>
                <img src="{{ asset($key->duongdan) }}" style="width:3%">
                <form action="{{ route('client.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="idimg" value="{{ $key->id }}">
                    <input type="hidden" name="idsan" value="{{ $data->id }}">
                    <button type="submit" class="btn btn-danger">Xoá</button>
                </form>
            </div>
        @endforeach

    @endif


    <p>SÂN 5</p>

    {{-- Sân --}}
    <table border="1">
        @if (session()->has('san5'))
            <?php $san5 = session('san5'); ?>
            <tr>
                <th>STT</th>
                <th>Tên sân</th>
                <th>Loại sân</th>
                <th>Thao tác</th>
            </tr>
            </@php
                $i = 1;
            @endphp 
            @foreach ($san5 as $key)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $key->tensan }}</td>
                <td>{{ $key->loaisan }}</td>

                <td>

                    <form action="{{ route('sanbong.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $key->id }}">
                        <button type="submit" class="btn btn-danger">Xoá</button>
                    </form>
                </td>
            </tr>
        @endforeach

        @endif

    </table>

    {{-- Bảng giá --}}
    <p>Bảng giá sân 5</p>
    <table border="">

        @if (session()->has('banggia5'))
            <?php $banggia5 = session('banggia5'); ?>
            <tr>
                <th>Khung giờ</th>
                @foreach ($banggia5 as $key)
                @php
                    $i = $key->khunggio;
                @endphp
                
                <td>{{ $i . 'h - ' . $i + 1 . 'h' }}</td>
            @endforeach
            </tr>
            <tr>
                <th>Giá tiền</th>
                @foreach ($banggia5 as $key)
                <td>{{$key->giatien}}</td>
            @endforeach
            </tr>
            <tr>
                <th>Thao tác</th>
                @foreach ($banggia5 as $key)
                    <td>
                        <form action="{{route('banggia.destroy')}}" method="POST">
                            @method('DELETE')
                            <input type="hidden" name='id' value="{{$key->id}}">
                            <button type="submit">XOÁ</button>
                            @csrf
                        </form>
                    </td>
                @endforeach
            </tr>
        @endif
    </table>

    <p>Thêm bảng giá sân 5</p>
    <form action="{{ route('banggia.create5') }}" method="POST">
        <label for="">Khung giờ</label>
        <select name="khunggio" id="" class="form-select">
            
            @for ($i = 5; $i <= 22; $i++)
                @php
                    $kt=0;
                @endphp
                @if (session()->has('banggia5'))
                    @php
                        $banggiasan5= session('banggia5');
                    @endphp
                    @foreach ($banggiasan5 as $key)
                        @if ($key->khunggio == $i)
                            {{$kt=1;}}
                            @break
                        @endif
                    @endforeach
                @endif
                @if ($kt==1)
                    @continue
                @endif
                <option value="{{ $i }}">{{ $i . 'h - ' . $i + 1 . 'h' }}</option>
            @endfor

        </select>
        <label for="">Giá tiền</label>
        <select name="giatien" id="" class="form-select">
            @for ($i = 1; $i <= 80; $i++)
                <option value="{{ $i * 5 + 100 }}">{{ $i * 5 + 100 }}</option>
            @endfor

        </select>
        <input type="hidden" name="idsancha" value="{{ $data->id }}">
        <button type="submit">Thêm</button>
        @csrf
    </form>


    <p>SÂN 7</p>
    <table border="1">
        @if (session()->has('san7'))
            <?php $san7 = session('san7'); ?>
            <tr>
                <th>STT</th>
                <th>Tên sân</th>
                <th>Loại sân</th>
                <th>Thao tác</th>
            </tr>
            </@php
                $i = 1;
            @endphp @foreach ($san7 as $key)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $key->tensan }}</td>
                <td>{{ $key->loaisan }}</td>

                <td>

                    <form action="{{ route('sanbong.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $key->id }}">
                        <button type="submit" class="btn btn-danger">Xoá</button>
                    </form>
                </td>
            </tr>
        @endforeach

        @endif

    </table>

    {{-- Bảng giá --}}
    <p>Bảng giá sân 7</p>
    <table border="">

        @if (session()->has('banggia7'))
            <?php $banggia7 = session('banggia7'); ?>
            <tr>
                <th>Khung giờ</th>
                @foreach ($banggia7 as $key)
                @php
                    $i = $key->khunggio;
                @endphp
                
                <td>{{ $i . 'h - ' . $i + 1 . 'h' }}</td>
            @endforeach
            </tr>
            <tr>
                <th>Giá tiền</th>
                @foreach ($banggia7 as $key)
                <td>{{$key->giatien}}</td>
            @endforeach
            </tr>
            <tr>
                <th>Thao tác</th>
                @foreach ($banggia7 as $key)
                    <td>
                        <form action="{{route('banggia.destroy')}}" method="POST">
                            @method('DELETE')
                            <input type="hidden" name='id' value="{{$key->id}}">
                            <button type="submit">XOÁ</button>
                            @csrf
                        </form>
                    </td>
                @endforeach
            </tr>
        @endif
    </table>

    <p>Thêm bảng giá sân 7</p>
    <form action="{{ route('banggia.create7') }}" method="POST">
        <label for="">Khung giờ</label>
        <select name="khunggio" id="" class="form-select">
            
            @for ($i = 5; $i <= 22; $i++)
                @php
                    $kt=0;
                @endphp
                @if (session()->has('banggia7'))
                    @php
                        $banggiasan5= session('banggia7');
                    @endphp
                    @foreach ($banggiasan5 as $key)
                        @if ($key->khunggio == $i)
                            {{$kt=1;}}
                            @break
                        @endif
                    @endforeach
                @endif
                @if ($kt==1)
                    @continue
                @endif
                <option value="{{ $i }}">{{ $i . 'h - ' . $i + 1 . 'h' }}</option>
            @endfor

        </select>
        <label for="">Giá tiền</label>
        <select name="giatien" id="" class="form-select">
            @for ($i = 1; $i <= 80; $i++)
                <option value="{{ $i * 5 + 100 }}">{{ $i * 5 + 100 }}</option>
            @endfor

        </select>
        <input type="hidden" name="idsancha" value="{{ $data->id }}">
        <button type="submit">Thêm</button>
        @csrf
    </form>


    <p>Thêm mới sân</p>
    <p>
    <form action="{{ route('sanbong.create') }}" method="POST">
        <label for="">Tên sân: </label>
        <input name="tensan" type="text" placeholder="Nhập tên sân">
        <label for="">Loại sân: </label>
        <select name="loaisan" id="" class="form-select">

            <option value="Sân 5">Sân 5</option>
            <option value="Sân 7">Sân 7</option>
        </select>
        <input type="hidden" name="idsancha" value="{{ $data->id }}">
        <button type="submit" class="btn btn-infor">Thêm mới</button>
        @csrf
    </form>
    </p>





</body>

</html>
