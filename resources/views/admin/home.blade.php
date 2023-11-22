<p>đây là home admin</p>
@if (Auth::guard('users')->check())
<p>Xin chào {{Auth::guard('users')->user()->hoten}}</p>
@endif

<a href="{{route('admin.quanly')}}">Tới trang quản lý</a>