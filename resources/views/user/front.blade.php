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
        z-index: 1;
    }


    body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.1);
        z-index: 0;
    }

    .box {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
    }

    h3 {
        position: relative;
        /* Add this line to make z-index work */
        font-size: 12vw;
        white-space: nowrap;
        overflow: hidden;
        line-height: 220px;
        color: #F7CA05;
        text-shadow: 0 10px 7px rgba(0, 0, 0, 0.4), 0 -10px 1px #fff;
        letter-spacing: -3px;
        z-index: 2;
    }





    h3:hover {
        animation: glitch .3s linear infinite;
        cursor: pointer;
    }


    .back {
        background-color: red;
        height: 150px;
        width: 150px;
        position: absolute;
        z-index: 1;
        border-radius: 40%;
        background-image: linear-gradient(45.34deg, #EA52F8 5.66%, #0066FF 94.35%);
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
</style>
@endsection
@section('content')
@csrf
<div class="back" id='YDiv'>
</div>
<div class='box'>
    <h3>Banana🍌</h3>
</div>

@endsection
@section('script')
<script>
    var cursorImage = document.getElementById("YDiv");
    // Listen for mousemove events on the document
    document.addEventListener("mousemove", function (event) {
        // Calculate the position of the image based on mouse coordinates
        var mouseX = event.clientX;
        var mouseY = event.clientY;

        // Update the position of the image, considering its dimensions
        cursorImage.style.left = mouseX - cursorImage.clientWidth / 2 + "px";
        cursorImage.style.top = mouseY - cursorImage.clientHeight / 2 + "px";
    });
</script>
@endsection