

<p>Xin chào {{Auth::guard('users')->user()->hoten}}</p>

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Sửa thông tin người dùng</h3>
                </div>
                <div class="col-6">
                    <a href="{{route('admin.quanly')}}">Danh sách người dùng</a>
                </div>

            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.update')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <input type="hidden" name="id" value="{{$data->id}}" >

                    <div class="form-group">
                        <strong>Họ tên</strong>
                        <input type="text" name="hoten" class="form-control" value="{{$data->hoten}}">
                        @error('hoten')
                            <span style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong>Chức vụ</strong>
                        <select name="role" id="" class="form-select">
                            
                            <option value="admin" {{$data->role == "admin" ? "selected" :''}}>Admin</option>
                            <option value="client" {{$data->role == "client" ? "selected" :''}}>Client</option>
                            <option value="user" {{$data->role == "user" ? "selected" :''}}>User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Email</strong>
                        <input type="text" name="email" class="form-control" value="{{$data->email}}" readonly>
                    </div>

                </div>
            </div>
            <button type="submit" class="btn btn-success">CẬP NHẬT</button>
            </form>
        </div>
    </div>
</div>