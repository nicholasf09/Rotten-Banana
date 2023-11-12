@extends('user.layout.main')
@section('content')
        @csrf
        <style>
            body {
                background-color: #0F0F0F;
            }
            .form{
                position: relative;
            }
            .form .bi-search{
                position: absolute;
                top: 6px;
                left: 17px;
                color: #9ca3af;
            }
            .form-input{
                padding-left: 45px;
            }
            .form-input:focus{
                box-shadow: none;
            }
            ::placeholder {
            color: gray !important;
            }
            .bg-navbar-dark{
                background-color: #121212;
            }
        </style>
        <nav class="navbar navbar-expand-lg bg-navbar-dark sticky-top navbar-light p-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand text-white" href="#"><img width="36"  src="https://img.icons8.com/cotton/64/banana.png" alt="banana"/><i class="fa-solid fa-shop me-2"></i> <strong>ROTTEN BANANA</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
                <div class="input-group">
                    <span class="border-warning input-group-text bg-warning text-dark"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" class="form-control border-success" style="color: #FFFFFF; background-color: #000000;">
                    <button class="btn btn-warning text-white">Search</button>
                </div>
                </div>
                <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <div class="ms-auto d-none d-sm-block">
                <div class="form">
                  <i class="bi bi-search text-dark"></i>
                  <input type="text" class="form-control rounded-5 form-input border-light color-dark" placeholder="Search...">
                </div>
            </div>
            <ul class="navbar-nav ms-auto ">
                <!-- <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase active text-white" aria-current="page" href="#">HOME</a>
                </li> -->
                <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase text-white" href="#">REVIEW</a>
                </li>
                <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase text-white" href="#">RANKING</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase text-white" href="#">CONTACT US</a>
                </li> -->
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase text-white" href="#"><i class="fa-solid fa-circle-user me-1 "></i> Account</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
        <div class="d-flex m-5 bg-dark bg-opacity-25 align-items-center" style="width: 80vw;">
            <div class="w-100">
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="https://rare-gallery.com/thumbs/894320-Satoru-Gojo-Jujutsu-Kaisen-anime.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="https://rare-gallery.com/thumbs/894320-Satoru-Gojo-Jujutsu-Kaisen-anime.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="https://rare-gallery.com/thumbs/894320-Satoru-Gojo-Jujutsu-Kaisen-anime.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>  
            </div> 
            <div class="m-5 px-5">
                <h1 class="fw-bold text-white">What happening now?</h1>
            </div>
        </div>
@endsection