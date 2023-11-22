@if (Auth::guard('users')->check())
<p>Xin chào {{Auth::guard('users')->user()->hoten}}</p>
@endif

<p>Đây là User Datsan page</p>

<div class="slideshow-container">
    @foreach ($img as $key)
        <div class="mySlides fade">
            <img src="{{ asset($key->duongdan) }}" style="width:3%">
        </div>
    @endforeach

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>


@if (Auth::guard('users')->check())
    <p>Xin chào {{ Auth::guard('users')->user()->hoten }}</p>
@endif

<p>Đây là Client quản lý sân bóng page</p>

<p>{{ $data->tensan }}</p>
<p>{{ $data->diachi }}</p>
<p>{{ $data->sdt }}</p>

<p>
    <form action="{{ route('user.datsanPost') }}" method="POST">
        <input type="hidden" name = "day" value="{{ date('d-m-Y', strtotime($day . ' -1 day')) }}">
        <input type="hidden" name = "id" value="{{ $data->id }}">
        <button type="submit"> < </button>
                @csrf
    </form>
    <label for="">{{ $day }}</label>
    <form action="{{ route('user.datsanPost') }}" method="POST">
        <input type="hidden" name = "day" value="{{ date('d-m-Y', strtotime($day . ' +1 day')) }}">
        <input type="hidden" name = "id" value="{{ $data->id }}">

        <button type="submit"> > </button>
        @csrf
    </form>
    
    </p>


<p>SÂN 5</p>
<table border="1" >

    <tr>
        <th>\</th>
        @foreach ($datasan5 as $key)
            <th>{{$key->tensan}}</th>
        @endforeach
    </tr>
    @foreach ($banggia5 as $key)
        <tr>
            <th>{{ $key->khunggio . 'h - ' . $key->khunggio + 1 . 'h' }}</th>
            @foreach ($datasan5 as $keysan)
            <td>{{ $key->giatien }}
                @php
                    $kt = 0;
                @endphp
                @foreach ($datsan as $ds)
                    @if ($ds->khunggio == $key->khunggio && $ds->idsanbong == $keysan->id)
                        (Đã đặt)
                        {{ $kt = 1 }}
                    @break
                @endif
            @endforeach
            @if ($kt == 0)
                <form action="{{route('datsan.create')}}" method="POST">
                    <input type="hidden" name="idsancon" value="{{$keysan->id}}">
                    <input type="hidden" name="iduser" value="{{Auth::guard('users')->user()->id}}">
                    <input type="hidden" name="khunggio" value="{{$key->khunggio}}">
                    <input type="hidden" name="ngay" value="{{$day}}">
                    <input type="hidden" name="giatien" value="{{$key->giatien}}">
                    <input type="hidden" name="idsancha" value="{{$data->id}}">
                    <button type="submit">Đặt sân</button>
                    @csrf
                </form>
            @endif
        </td>
            @endforeach
            
        </tr>
    @endforeach
</table>

<p>SÂN 7</p>
<table border="1">

    <tr>
        <th>\</th>
        @foreach ($datasan7 as $key)
            <th>{{$key->tensan}}</th>
        @endforeach
    </tr>
    @foreach ($banggia7 as $key)
        <tr>
            <th>{{ $key->khunggio . 'h - ' . $key->khunggio + 1 . 'h' }}</th>
            @foreach ($datasan7 as $keysan)
            <td>{{ $key->giatien }}
                @php
                    $kt = 0;
                @endphp
                @foreach ($datsan as $ds)
                    @if ($ds->khunggio == $key->khunggio && $ds->idsanbong == $keysan->id)
                        (Đã đặt)
                        @php
                            $kt=1;
                        @endphp
                    @break
                @endif
            @endforeach
            @if ($kt == 0)
                (Chưa đặt)
            @endif
        </td>
            @endforeach
            
        </tr>
    @endforeach
</table>
