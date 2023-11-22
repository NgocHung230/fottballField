<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Register</title>

</head>
<link rel="stylesheet" href="/auth.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('register') }}" method="POST">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>

                <span>or use your email for registration</span>
                <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" />
                @error('name')
                    <span style="color:red">{{ $message }}</span>
                @enderror
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
                @error('email')
                    <span style="color:red">{{ $message }}</span>
                @enderror
                <input type="password" name="psw" placeholder="Password" />
                @error('psw')
                    <span style="color:red">{{ $message }}</span>
                @enderror
                <input type="password" name="repsw" placeholder="Retype Password" />
                @error('repsw')
                    <span style="color:red">{{ $message }}</span>
                @enderror
                <button type="submit" id="registerbtn">Sign Up</button>
                @csrf
            </form>
            
        </div>
        
        <div class="form-container sign-in-container">
            <form action="{{ route('login') }}" method="POST">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" name="emaillogin" placeholder="Email" value ="{{ old('emaillogin') }} " />
                @error('emaillogin')
                    <span style="color:red">{{ $message }}</span>
                @enderror

                <input type="password" name="password" placeholder="Password" />
                @error('password')
                    <span style="color:red">{{ $message }}</span>
                @enderror
                @error('err')
                    <span style="color:red">{{ $message }}</span>
                @enderror
                @if(session('SC'))
                <span style="color:green">{{ session('SC') }}</span>
                @endif
                <a href="#">Forgot your password?</a>
                <button type="submit">Sign In</button>
                @csrf
            </form>

        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const registerBtn = document.getElementById('registerbtn');
    const container = document.getElementById('container');
    signUpButton.addEventListener('click', () => {
        container.classList.add('right-panel-active');
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove('right-panel-active');
    });

    
</script>
