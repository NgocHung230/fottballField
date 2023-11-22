<p>Xin chào {{Auth::guard('users')->user()->hoten}}</p>


@if (Session::has('thongbao'))
        <div class="alert alert-success">
            {{Session::get('thongbao')}}
        </div>
    @endif
<table border="1">
    
    <tr>
      <th>STT</th>
      <th>Họ tên</th>
      <th>Chức vụ</th>
      <th>Email</th>
      <th>Thao Tác</th>
    </tr>
    </@php
        $i=1
    @endphp

    @foreach ($data as $key)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$key->hoten}}</td>
        <td>{{$key->role}}</td>
        <td>{{$key->email}}</td>
        <td>
            <form action="{{route('admin.edit')}}" method="POST">
                <input type="hidden" name="id" value="{{ $key->id }}">
                <button type="submit">sửa</button>
                
                @csrf
            </form>
            <form action="{{route('admin.destroy',$key->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $key->id }}">
                <button type="submit" class="btn btn-danger">Xoá</button>
            </form>
        </td>
    </tr>
    @endforeach
    
  </table>