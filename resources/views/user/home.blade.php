@if (Auth::guard('users')->check())
<p>Xin chào {{Auth::guard('users')->user()->hoten}}</p>
@endif

<p>Đây là User HomePage</p>

@foreach ($data as $key)
    <p>
        <a href="{{route('user.datsan', ['id'=>$key->id,'day'=>date('d-m-Y')])}}" name="id">{{$key->tensan}}</a>
    </p>
@endforeach