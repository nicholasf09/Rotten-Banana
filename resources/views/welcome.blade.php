@extends('user.layout.main')
@section('style')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Wendy+One&display=swap');

    body {
        font-family: 'Wendy One', sans-serif;
        background: #F7CA05;
        display: flex;
        align-content: center;
        justify-content: center;
        overflow: hidden;
    }

    .monument {
        width: 100vw;
        height: 100vh;
        position: absolute;
        top: 0;
        left: 0;
        transform: translate(0, 0);
        background: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9));
        background-size: cover;
        transition: background 0.3s ease;
        /* Add transition for smooth effect */
    }

    .monument.dark {
        background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0));
    }

    .monument .torch {
        width: 100vw;
        height: 100vh;
        background-color: #F7CA05;
        background-size: cover;
        clip-path: circle(15vh);
    }

    .monument.light {
        background-color: #F7CA05;
    }

    .box {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    h3 {
        font-size: 8vw;
        white-space: nowrap;
        overflow: hidden;
        line-height: 200px;
        color: #F7CA05;
        text-shadow: 0 10px 7px rgba(0, 0, 0, 0.4), 0 -10px 1px #fff;
        letter-spacing: -3px;
    }

    h3:hover {
        animation: glitch .3s linear infinite;
        cursor: pointer;
    }

    @keyframes glitch {
        0% {
            transform: translate(0);
        }

        20% {
            transform: translate(-2px, 2px);
        }

        40% {
            transform: translate(-2px, -2px);
        }

        60% {
            transform: translate(2px, 2px);
        }

        80% {
            transform: translate(2px, -2px);
        }

        100% {
            transform: translate(0);
        }
    }

    @keyframes lightUpAnimation {
        0% {
            clip-path: circle(20vh);
        }

        100% {
            clip-path: circle(200vh);
        }
    }
</style>
@endsection
@section('content')
@csrf


<div class="monument" onmousemove="moveTorch(event)" onclick="lightUp()">
<div class="torch">
    <div class='box text-center align-items-center justify-content-center'>
        <h3 class="mb-0">Rotten</h3>
        <h3 class="mt-0">Banana🍌</h3>
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-5 p-4 bg-warning mx-2 "><a href="{{route('admin.login')}}" class="text-white fs-3"
                        style="text-decoration:none;">Admin</a></div>
                <div class="col-5 p-4 bg-warning mx-2 "><a href="{{route('user.login')}}" class="text-white fs-3"
                        style="text-decoration:none;">User</a></div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script>
    function moveTorch(event) {
        var torch = document.getElementsByClassName("torch")[0];
        torch.style.clipPath = `circle(15vh at ${event.clientX}px ${event.clientY}px)`;
    }
    function lightUp() {
        var monument = document.querySelector(".monument");
        var torch = document.querySelector(".torch");
        torch.style.clipPath = `circle(200vh at ${event.clientX}px ${event.clientY}px)`;
        monument.classList.add("light");
        torch.style.animation = "lightUpAnimation 0.9s ease";
        setTimeout(() => {
            monument.classList.remove("light");
            torch.style.animation = "none";
        }, 500);
    }
</script>
@endsection