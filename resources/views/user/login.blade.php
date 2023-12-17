@extends('user.layout.main')
@section('content')
    <script
    type="module"
    src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="loginjs.js"></script>
    <style>
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        *{
            margin: 0;
            padding: 0;
        }

        body {
            /* background-color: black; */
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial;
        }
        img {
            position: absolute;
            width: 1500px;
        }
        .containerLogin {
            backdrop-filter: blur(20px);
            width: 440px;
            height: 480px;
            display: none;
        }

        .card__content {
            border-radius: 20px;
            border: 5px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
            transition: transform 1.5s;
            transform-style: preserve-3d;
        }

        .containerLogin .sign-in {
            height: 80%;
            width: 100%;
            padding: 40px;
        }

        .sign-in h1{
            text-align: center;
            color: black;
            margin-bottom: 40px;
        }

        .input-box{
            position: relative;
            width: 100%;
            height: 40px;
            border-bottom: 2px solid black;
            margin-bottom: 35px;
        }

        .input-box label {
            position: absolute;
            top: 55%;
            left: 1%;
            transform: translateY(-25%);
            font-size: 16px;
            color: black;
            font-weight: 600;
            pointer-events: none;
            transition: 0.5s;
        }

        .input-box input:focus~label,
        .input-box input:valid~label {
            top: -2px;
        }
        .input-box input {
            padding-left: 5px;
            width: 90%;
            height: 120%;
            background: transparent;
            border: none;
            outline: none;
            font-size: 16px;
            font-weight: 200;
        }

        .input-box .icon {
            position: absolute;
            top: -5px;
            right: 10px;
            font-size: 20px;
            line-height: 65px;
            height: 0;
        }

        a {
            text-decoration: none;
            color: black;
        }

        a:hover {
            text-decoration: underline;
        }

        .submit-button {
            display: flex;
            justify-content: center;
        }

        .submit-button input {
            width: 100%;
            height: 44px;
            border: none;
            border-radius: 8px;
            margin-bottom: 40px;
            background-color: black;
            color: white;
            font-weight: bold;
            font-size: 20px;
        }

        .submit-button input:hover {
            background-color: white;
            border: 2px solid black;
            color: black;
            transition: 0.2s;
        }

        .register {
            text-align: center;
            width: 100%;
        }

        .sign-up {
            width: 70%;
            height: 80%;
        }

        .sign-up h1 {
            text-align: center;
            margin-bottom: 40px;
        }

        .sign-up .submit-button {
            margin-top: 40px;
            margin-bottom: -10px;
        }

        :root {
        --level-one: translateZ(3rem);
        --level-two: translateZ(6rem);
        --level-three: translateZ(9rem);
        
        --fw-normal: 400;
        --fw-bold: 700;
        
        --clr: #b7c9e5;
        }

        *, *::before, *::after {
        box-sizing: border-box;
        margin: 0;
        }

        .card__front {
            position: absolute;
            backface-visibility: hidden;
            transform-style: preserve-3d;
            align-content: center;
        }
        .card__back {
            position: absolute;
            backface-visibility: hidden;
            transform-style: preserve-3d;
            align-content: center;
            transform: rotateY(.5turn);
        }

        .pisang_container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .pisang {
            -webkit-user-drag: none;
            scale: 0.15;
            transition: 0.5s;
        }
        .pisang:hover {
            cursor: hand;
            scale: 0.18;
        }

        .pisang:not(:hover) {
            scale: 0.15;
        }

        .pisang:active {
            scale: 0.1;
            transition: 0.3s;
        }

        .slide-in-bck-center {
            animation: slide-in-bck-center 0.7s;
        }

        @keyframes slide-in-bck-center {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

    </style>

    <form action="{{route('user.cekLogin')}}" method="POST">
        @csrf  
        <div class="pisang_container">
            <img class="pisang" src="{{asset('storage/uploads/assets/cool-banana.png')}}" alt="" />
          </div>
      
          <div class="containerLogin" id="container">
            <div class="card__content">
              <div class="sign-in card__front">
                <h1>Sign in</h1>
                <form action="#">
                  <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="email" id="email" name="email" class="input-field">
                    <label>Email</label>
                  </div>
                  <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="password" name="password" name="input-field">
                    <label>Password</label>
                  </div>
                  <div class="submit-button">
                    <input type="submit" value="Login" />
                  </div>
                  <div class="register">
                    <p>
                      Dont have an account?
                      <a href="#" class="link-register" id="register1">Register!</a>
                    </p>
                  </div>
                </form>
              </div>
      
              <div class="sign-up card__back">
                <div class="contents">
                  <h1>Registration</h1>
                  <form action="{{route('user.store')}}" method="POST">
                    @csrf
                    <div class="input-box">
                      <span class="icon"><ion-icon name="person"></ion-icon></span>
                      <input class="input-field" type="text" required name="name"/>
                      <label>Username</label>
                    </div>
                    <div class="input-box">
                      <span class="icon"
                        ><i class="fa-regular fa-envelope lock-closed"></i></span>
                      <input class="input-field" type="email" required name="email"/>
                      <label>Email</label>
                    </div>
                    <div class="input-box">
                      <span class="icon"
                        ><ion-icon name="lock-closed"></ion-icon
                      ></span>
                      <input class="input-field" type="password" required name="password"/>
                      <label>Password</label>
                    </div>
                    <div class="submit-button">
                      <input type="submit" value="Submit" />
                    </div>
                    <div class="register">
                      <p>
                        Already have an account?
                        <a href="#" class="link-register" id="login1">Login</a>
                      </p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>

        {{-- <div style="position: relative;">
            <label for="email">Email: </label>
            <br>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
            @enderror
        </div>   --}}
        {{-- <br><br>
        <div style="position: relative">
            <label for="email">Password: </label>
            <br>
            <input type="password" id="password" name="password" value="{{old('password')}}">
            @error('password')
                <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
            @enderror
        </div>
        <br><br>
        <input type="submit"> --}}

        @if ($errors->any())
            <script>
                 Swal.fire({
                    icon: 'error',
                    title: '{{ $errors->first() }}',
                    text: 'Bisa memasukan ulang email dan password anda!',
                })
            </script>  
        @endif

    </form>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("register1").addEventListener("click", function () {
        document.querySelector(".card__content").style.transform =
        "rotateY(180deg)";
    });

    document.getElementById("login1").addEventListener("click", function () {
        document.querySelector(".card__content").style.transform = "rotateY(0deg)";
    });
    });

    document.addEventListener("DOMContentLoaded", function () {
    const pisang = document.querySelector(".pisang");
    const container = document.getElementById("container");

    pisang.addEventListener("click", function () {
        container.style.display = "block";
        pisang.style.display = "none";
        container.classList.add("slide-in-bck-center");
    });
    });

</script>