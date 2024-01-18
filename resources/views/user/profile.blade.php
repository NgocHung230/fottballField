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

    <style>
        /* CSS để ẩn form ban đầu */
        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Màu nền đen semi-transparent */
        }

        #formContainer {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
        }
    </style>
</head>

<body>
    {{-- nav --}}
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top">
        <div class="mr-10">
            <img src="/img/logo.jpg" alt="">

        </div>
        <div class="collapse navbar-collapse " id="collapsibleNavId">
            <div class="nav-middle ml-auto mr-auto">
                <a href="{{ route('user.home') }}" >
                    <i class="fa-solid fa-house" ></i>
                </a>
                
                <a href="{{ route('user.thongbao') }}">
                    <i class="fa-solid fa-bell"></i>
                </a>
                
                <a href="{{ route('user.profile') }}" > 
                    <i class="fa-solid fa-user-pen" style="color: black"></i>
                </a>
                
            </div>
        </div>
        @if (Auth::guard('users')->check())
        <div class="flex-col ">
            <div class="dangnhap h-8">
                <p>Xin chào {{ Auth::guard('users')->user()->hoten }}</p>
                <a href="{{route('logout')}}">
                    <i class="fa-sharp fa-solid fa-right-from-bracket"></i>
                </a>
            </div>
            <div class="text-center text-white text-xl ">
                <p>{{ Auth::guard('users')->user()->acount }}$</p>

            </div>
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
    <p>Xin chào {{ Auth::guard('users')->user()->hoten }}</p>
    <?php
    $data = Auth::guard('users')->user();
    ?>
    <div class=" mt-5 ">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="flex items-center justify-center ">
                <div class="w-full ">
                    <div class="form-sua-thong-tin w-8/12  mx-auto  ">
                        <form action="{{route('user.profile_edit')}}" id="myform" method="POST"
                            class="border-2 rounded-xl mx-auto border-black w-8/12">
                            <h3 class="text-lg text-center border-2 bg-green-300 rounded-xl font-bold mb-4">Thông tin
                            </h3>
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="">
                                <div class=" ">
                                    <div class="mb-4 flex ">
                                        <label for="hoten"
                                            class="block text-gray-700 text-sm font-bold mb-2 text-center w-3/12">Họ
                                            tên:</label>
                                        <input type="text" name="hoten" id="hoten"
                                            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                                            value="{{ $data->hoten }}">

                                    </div>
                                    <div class="mb-4 flex ">
                                        <label for="email"
                                            class="block text-gray-700 text-sm font-bold mb-2 text-center w-3/12">Email:</label>
                                        <input type="text" name="email" id="email"
                                            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                                            value="{{ $data->email }}" readonly>
                                    </div>

                                    <div class="mb-4 flex ">
                                        <label for="hoten"
                                            class="block text-gray-700 text-sm font-bold mb-2 text-center w-3/12">Acount:</label>
                                        <input type="text" name="" id=""
                                            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                                            value="{{ $data->acount }} $" readonly>

                                    </div>

                                </div>
                            </div>
                            
                            <div id="errorMessages"></div>
                            <div>
                                @if (session()->has('ms'))
                                    <label for="">{{session('ms')}}</label>
                                    {{session()->forget('ms')}}
                                @endif
                            </div>
                            
                        </form>
                        <div class="text-center">
                            <button type="button" onclick="update()"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">CẬP
                                NHẬT</button>
                            <button id="showFormButton" onclick="pass_edit()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Đổi mật khẩu</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        
    </div>

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

    

    <div id="overlay">
        <div id="formContainer">
            <form action="{{route('user.password_update')}}" method="POST" id="passForm">
                @csrf
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" readonly value="{{$data->email}}"><br><br>
                <label for="oldpw">Mật khẩu cũ:</label>
                <input type="password" id="pw" name="pw"><br><br>
                <label for="newpw">Mật khẩu mới:</label>
                <input type="password" id="npw" name="npw"><br><br>
                <label for="renewpw">Nhập lại mật khẩu:</label>
                <input type="password" id="renpw" name="renpw"><br><br>
                <div id="errorMessages2"></div>

                <button type="button" id="updatepass" onclick="check_pass()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Cập nhật</button>
                <input type="hidden" name="id">
            </form>
        </div>
    </div>

    <script>
        // Lắng nghe sự kiện click vào nút "Hiện Form"
        function pass_edit()
        {
            var overlay = document.getElementById('overlay');

            // Hiển thị overlay (form sẽ hiển thị do CSS)
            overlay.style.display = 'block';
        }
        
        window.addEventListener('click', function(event) {
            if (event.target === overlay) {
                // Nếu người dùng nhấp chuột vào overlay (bên ngoài form), form sẽ bị ẩn đi
                overlay.style.display = 'none';
            }
        });

        // Ngăn chặn sự kiện click từ formContainer khi người dùng nhấp vào form
        formContainer.addEventListener('click', function(event) {
            event.stopPropagation();
        });
        function check_pass() {
            var pw = document.getElementById("pw").value;
            var npw = document.getElementById("npw").value;
            var renpw = document.getElementById("renpw").value;
            

            var errorMessages = [];
            

            var pass = '<?php echo $data->password; ?>';

            if (pw.trim() === '') {
                errorMessages.push("Vui lòng nhập mật khẩu cũ");
            } else
            if (npw.trim() === '') {
                errorMessages.push("Vui lòng nhập mật khẩu mới");
            } else
            if (renpw.trim() === '') {
                errorMessages.push("Vui lòng nhập nhập lại mật khẩu mới");
            } else
            if (renpw.trim() != npw.trim()) {
                errorMessages.push("Mật khẩu mới không trùng khớp");
            }
            


            if (errorMessages.length > 0) {
                displayErrors(errorMessages);
            } else {
                document.getElementById("passForm").submit();
            }
        }
        function displayErrors(errors) {
            var errorMessageDiv = document.getElementById("errorMessages2");
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
