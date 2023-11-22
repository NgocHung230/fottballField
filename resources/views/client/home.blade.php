@if (Auth::guard('users')->check())
<p>Xin chào {{Auth::guard('users')->user()->hoten}}</p>
@endif

<p>Đây là Client HomePage</p>


<a href="{{route('client.quanly')}}">Quản lý sân bóng</a>