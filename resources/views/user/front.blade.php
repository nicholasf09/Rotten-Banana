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
        clip-path: circle(20vh);
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
        font-size: 12vw;
        white-space: nowrap;
        overflow: hidden;
        line-height: 400px;
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
            clip-path: circle(120vh);
        }
    }
</style>
@endsection
@section('content')
@csrf
<div class="monument" onmousemove="moveTorch(event)" onclick="lightUp()">
    <div class="torch">
        <div class='box'>
            <h3>Banana🍌</h3>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function moveTorch(event) {
        var torch = document.getElementsByClassName("torch")[0];
        torch.style.clipPath = `circle(20vh at ${event.clientX}px ${event.clientY}px)`;
    }

    function lightUp() {
        var monument = document.querySelector(".monument");
        var torch = document.querySelector(".torch");
        torch.style.clipPath = `circle(120vh at ${event.clientX}px ${event.clientY}px)`;
        monument.classList.add("light");
        torch.style.animation = "lightUpAnimation 0.5s ease";
        setTimeout(() => {
            monument.classList.remove("light");
            torch.style.animation = "none";
        }, 500);
    }
</script>
@endsection