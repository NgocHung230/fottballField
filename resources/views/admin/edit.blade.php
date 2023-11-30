

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Link ảnh -->
    <link rel="stylesheet" href="/img">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Link css -->
    <link rel="stylesheet" href="/home.css">

    <!-- Link fontanware -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    {{-- nav --}}
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top">
        <div class="mr-10">
            <img src="/img/logo.jpg" alt="">

        </div>
        <div class="collapse navbar-collapse " id="collapsibleNavId">
            <div class="nav-middle ml-auto mr-auto">
                <a href="{{route('admin.home')}}" >
                    <i class="fa-solid fa-house"></i>
                </a>
                <a href="{{route('admin.quanly')}}" >
                    <i class="fa-solid fa-list" style="color: black"></i>
                </a>
                
                <a href="{{route('admin.profile')}}">
                    <i class="fa-solid fa-user-pen"></i>
                </a>
            </div>
            {{-- <ul class="navbar-nav ml-auto mr-auto mt-2 mt-lg-0 text-justify">
                <li class="nav-item active ">
                    <a class="nav-link" href="{{route('admin.home')}}">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('admin.quanly')}}">Quản lý</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Thông tin</a>
                </li>
            </ul> --}}
        </div>
        @if (Auth::guard('users')->check())
            <div class="dangnhap">
                <p>Xin chào {{ Auth::guard('users')->user()->hoten }}</p>
                <a href="{{route('logout')}}">
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
    <p>Xin chào {{Auth::guard('users')->user()->hoten}}</p>

    <div class=" mt-5 ">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="flex items-center justify-center ">
                <div class="w-full ">
                    <div class="form-sua-thong-tin w-8/12  mx-auto  "> 
                        <form action="{{route('admin.update')}}" id="myform" method="POST" class="border-2 rounded-xl mx-auto border-black w-8/12" >
                            <h3 class="text-lg text-center border-2 bg-green-300 rounded-xl font-bold mb-4">Sửa thông tin người dùng</h3>
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="">
                                <div class=" ">
                                    <div class="mb-4 flex ">
                                        <label for="hoten" class="block text-gray-700 text-sm font-bold mb-2 text-center w-3/12">Họ tên:</label>
                                        <input type="text" name="hoten" id="hoten" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" value="{{$data->hoten}}">
                                        @error('hoten')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4 flex ">
                                        <label for="role" class="block text-gray-700 text-sm font-bold mb-2 text-center w-3/12">Chức vụ:</label>
                                        <select name="role" id="role" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                                            <option value="admin" {{$data->role == "admin" ? "selected" :''}}>Admin</option>
                                            <option value="client" {{$data->role == "client" ? "selected" :''}}>Client</option>
                                            <option value="user" {{$data->role == "user" ? "selected" :''}}>User</option>
                                        </select>
                                    </div>
                                    <div class="mb-4 flex ">
                                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 text-center w-3/12">Email:</label>
                                        <input type="text" name="email" id="email" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" value="{{$data->email}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div id="errorMessages"></div>
                            <div class="text-center"> 
                                <button type="button" onclick="update()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">CẬP NHẬT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    <!-- Footer -->
    <script>
        function update() {
            var hoten = document.getElementById("hoten").value;
            

            var errorMessages = [];

            if (hoten.trim() === '') {
                errorMessages.push("Vui lòng nhập họ tên");
            }

            if (errorMessages.length > 0) {
                displayErrors(errorMessages);
            } else {
                document.getElementById("myform").submit();
            }
        }
        function displayErrors(errors) {
            var errorMessageDiv = document.getElementById("errorMessages");
            errorMessageDiv.innerHTML = "";
            var ul = document.createElement("ul");

            errors.forEach(function(error) {
                var li = document.createElement("li");
                li.appendChild(document.createTextNode(error));
                ul.appendChild(li);
            });

            errorMessageDiv.appendChild(ul);
        }
    </script>
</body>
</html>