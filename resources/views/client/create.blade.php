@if (Auth::guard('users')->check())
    <p>Xin chào {{ Auth::guard('users')->user()->hoten }}</p>
@endif

<p>Đây là trang Client thêm mới sân bóng</p>

<form action="{{ route('client.update') }}" method="POST">
    <div>
        <label for="">Tên sân: </label>
        <input type="text" name="tensan" placeholder="Nhập tên sân" >
    </div>
    <div>
        <label for="">Địa chỉ: </label>
        <input type="text" name="diachi" placeholder="Nhập địa chỉ sân" >
    </div>
    <div>
        <label for="">SĐT: </label>
        <input type="text" name="sdt" placeholder="Nhập số điện thoại sân" >
    </div>
    <button type="submit">TẠO MỚI</button>
    @csrf
</form>
