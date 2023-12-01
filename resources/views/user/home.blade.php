@include('user.partials.navbar')
@extends('user.layout.main')
@section('style')
<style>
    * {
        font-family: 'poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #121212;
    }

    .swiper-wrapper::-webkit-scrollbar {
        display: none;
    }

    .form {
        position: relative;
    }

    .search {
        position: absolute;
        z-index: 1;
        top: 10px;
        left: 17px;
        color: #9ca3af;
    }

    .form-input {
        padding-left: 45px;
    }

    .form-input:focus {
        box-shadow: none;
    }

    ::placeholder {
        color: gray !important;
    }

    .bg-navbar-dark {
        background-color: #121212;
    }

    .title {
        color: white;
        transition: 0.5s ease-in-out;
    }

    .title:hover {
        color: #CF0102;
    }

    @media (min-width: 768px) {
        .swiper {
            width: 100%;
            height: 45vh;
        }
    }
    @media (max-width: 767px) {
        .swiper {
            width: 100%;
            height: 30vh;
        }
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #121212;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 15px;
        overflow: hidden;
    }

    .swiper-slide img {
        display: block;
        overflow: hidden;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 15px;
        transition: transform 0.3s ease;
    }

    .swiper-slide img:hover {
        transform: scale(1.2);
    }

    .swiper-wrapper {
        display: flex;
        overflow-x: scroll;
        -webkit-overflow-scrolling: touch;
        scroll-snap-type: x mandatory;
    }

    .text-justify {
        text-align: justify;
    }

    .ranks {
        width: 15vh;
        overflow: hidden;
    }

    .ranks img {
        object-fit: cover;
    }
</style>
@endsection
@section('content')
@csrf
<div class="d-flex m-md-5 mx-auto my-5 bg-dark bg-opacity-25 rounded-3 align-items-center flex-column flex-md-row"
    style="width: 80vw;">
    <div class="w-100">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://rare-gallery.com/thumbs/894320-Satoru-Gojo-Jujutsu-Kaisen-anime.jpg"
                        class="d-block w-100 rounded-start-3" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://studio.mrngroup.co/storage/app/media/Prambors/Editorial%202/tanjiro-20230208155752.webp?tr=w-600"
                        class="d-block w-100 rounded-start-3" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://m.media-amazon.com/images/M/MV5BMjkzZGMzNDktMzc3ZS00OTBlLThmYWEtM2M2NDZmMTZmYzZmXkEyXkFqcGdeQXVyODMyNTM0MjM@._V1_.jpg"
                        class="d-block w-100 rounded-start-3" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="ms-md-5 p-3">
        <h1 class="fw-bold lh-md title" style="font-size: 5vw;">What's happening now!</h1>
    </div>
</div>
{{-- drakor --}}
<div class="mx-5 mb-3 mt-5">
    <div class="d-flex justify-content-between align-items-end mb-2">
        <h1 class="fw-bold text-white lh-md mb-2">K-Dramas</h1>
        <p class="text-white mb-0 me-5  ">Scroll to view</p>
    </div>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img
                    src="https://m.media-amazon.com/images/M/MV5BODM5NDhkYzctZjQ5NS00YTFkLWJiODUtMGMwOTZhYzgyYWI1XkEyXkFqcGdeQXVyNjI4NDY5ODM@._V1_.jpg"
                    alt=""></div>
            <div class="swiper-slide"><img
                    src="https://m.media-amazon.com/images/M/MV5BNjMzYThmZjUtYmZlZC00ZDQzLWExMGItNmI2ODNhM2U4OTYzXkEyXkFqcGdeQXVyNjI4NDY5ODM@._V1_FMjpg_UX1000_.jpg"
                    alt=""></div>
            <div class="swiper-slide"><img
                    src="https://m.media-amazon.com/images/M/MV5BMTIyZTE1ZTAtZmFlMS00NjYzLWIwMWQtZjkwYzBkNDgxMWJmXkEyXkFqcGdeQXVyMTA2NTg2Njg2._V1_.jpg"
                    alt=""></div>
            <div class="swiper-slide"><img
                    src="https://m.media-amazon.com/images/M/MV5BNDU1YWJkMDAtYmY1NS00OTNlLWI5OWItYjNjNzFkODQzOWYzXkEyXkFqcGdeQXVyNjEwNTM2Mzc@._V1_FMjpg_UX1000_.jpg"
                    alt=""></div>
            <div class="swiper-slide"><img
                    src="https://m.media-amazon.com/images/M/MV5BYTA1OTQzYTYtNDAwOC00OTk0LTkxZDktMmVlNTc1OWExMzA5XkEyXkFqcGdeQXVyMTMxMTgyMzU4._V1_FMjpg_UX1000_.jpg"
                    alt=""></div>
            <div class="swiper-slide"><img
                    src="https://m.media-amazon.com/images/M/MV5BODRmOGI0NWYtZmY4Mi00ZDNlLTljZjYtMzRiMTExMjZkNmIwXkEyXkFqcGdeQXVyNDY5MjMyNTg@._V1_.jpg"
                    alt=""></div>
            <div class="swiper-slide"><img
                    src="https://m.media-amazon.com/images/M/MV5BODNmNzhlYzItYjJjMC00YTUyLWJhMTQtZWRmY2JhM2RiNTljXkEyXkFqcGdeQXVyMTAwMzM3NDI3._V1_FMjpg_UX1000_.jpg"
                    alt=""></div>
            <div class="swiper-slide"><img
                    src="https://m.media-amazon.com/images/M/MV5BMTJlYzg0NGEtNzBkNi00MTE0LWJmOWYtYmM0MzdkMDI0ZDUwXkEyXkFqcGdeQXVyNjI4NDY5ODM@._V1_.jpg"
                    alt=""></div>
            <div class="swiper-slide"><img
                    src="https://m.media-amazon.com/images/M/MV5BYzgzNDg5OGUtMGY5NS00ZjlkLTljM2MtYjdkODRhNDFlZmI5XkEyXkFqcGdeQXVyMTEzMTI1Mjk3._V1_FMjpg_UX1000_.jpg"
                    alt=""></div>
        </div>
    </div>
</div>
{{-- anime --}}
<div class="mx-5 mb-3 mt-5">
    <div class="d-flex justify-content-between align-items-end mb-2">
        <h1 class="fw-bold text-white lh-md mb-2">Anime Series</h1>
        <p class="text-white mb-0 me-5  ">Scroll to view</p>
    </div>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img
                    src="https://m.media-amazon.com/images/M/MV5BODM0NmVjMzUtOTJhNi00N2ZhLWFkYmMtYmZmNjRiY2M1YWY4XkEyXkFqcGdeQXVyOTgxOTA5MDg@._V1_.jpg"
                    alt=""></div>
            <div class="swiper-slide"><img src="https://image.tmdb.org/t/p/original/3yFHMtdhriig4sm1w8oMQfA2gFN.jpg"
                    alt=""></div>
            <div class="swiper-slide"><img
                    src="https://m.media-amazon.com/images/M/MV5BMTMwMDM4N2EtOTJiYy00OTQ0LThlZDYtYWUwOWFlY2IxZGVjXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_.jpg"
                    alt=""></div>
            <div class="swiper-slide"><img src="https://m.media-amazon.com/images/I/81ywJT+vlVL.jpg" alt=""></div>
            <div class="swiper-slide"><img
                    src="https://m.media-amazon.com/images/M/MV5BN2EwNTUwYWItZTY4ZC00N2Q1LWFhZWQtNjMwMDBkZDVmYThjXkEyXkFqcGdeQXVyOTA2OTk0MDg@._V1_.jpg"
                    alt=""></div>
            <div class="swiper-slide"><img
                    src="https://m.media-amazon.com/images/M/MV5BOTM5ZjA2YWMtYjY3Ny00ZDU1LTk1NjYtMzhjMGY5ZmZkMzgwL2ltYWdlL2ltYWdlXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_.jpg"
                    alt=""></div>
            <div class="swiper-slide"><img
                    src="https://m.media-amazon.com/images/M/MV5BNDVlOWQ3NDEtYWM4My00YzJlLWIxMzctODNjZDU4Njg1NzEwXkEyXkFqcGdeQXVyMzgxODM4NjM@._V1_FMjpg_UX1000_.jpg"
                    alt=""></div>
            <div class="swiper-slide"><img
                    src="https://m.media-amazon.com/images/M/MV5BMjlmZmI5MDctNDE2YS00YWE0LWE5ZWItZDBhYWQ0NTcxNWRhXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_FMjpg_UX1000_.jpg"
                    alt=""></div>
            <div class="swiper-slide"><img
                    src="https://m.media-amazon.com/images/M/MV5BOGExNDhhNmUtMmRmZC00ZmQ1LThjNDctZmJkMTFlOTEwZmUwXkEyXkFqcGdeQXVyNzgzODMxMzA@._V1_.jpg"
                    alt=""></div>
        </div>
    </div>
</div>
{{-- ranking --}}
<div class="row m-5" id="ranking">
    {{-- ranking 1 --}}
    <div class="col-md-6 p-0 pe-md-3 col-sm-12">
        <h1 class="fw-bold text-white lh-md mb-2">Best Rating</h1>
        <div
            class="bg-dark py-md-1 ps-md-1 bg-opacity-25 rounded-1 mb-3 d-flex flex-row align-items-center justify-content-between">
            <div class="ranks rounded-1 m-2 ratio ratio-1x1"><img
                    src="https://m.media-amazon.com/images/M/MV5BOGExNDhhNmUtMmRmZC00ZmQ1LThjNDctZmJkMTFlOTEwZmUwXkEyXkFqcGdeQXVyNzgzODMxMzA@._V1_.jpg"
                    alt=""></div>
            <h1 class="fw-light text-white lh-md mb-2 ms-2">Sword Art Online</h1>
            <h1 class="fw-light text-white lh-md me-3">9/10</h1>
        </div>
        <div
            class="bg-dark py-md-1 ps-md-1 bg-opacity-25 rounded-1 mb-3 d-flex flex-row align-items-center justify-content-between">
            <div class="ranks rounded-1 m-2 ratio ratio-1x1"><img
                    src="https://m.media-amazon.com/images/M/MV5BOGExNDhhNmUtMmRmZC00ZmQ1LThjNDctZmJkMTFlOTEwZmUwXkEyXkFqcGdeQXVyNzgzODMxMzA@._V1_.jpg"
                    alt=""></div>
            <h1 class="fw-light text-white lh-md mb-2 ms-2">Sword Art Online</h1>
            <h1 class="fw-light text-white lh-md me-3">9/10</h1>
        </div>
        <div
            class="bg-dark py-md-1 ps-md-1 bg-opacity-25 rounded-1 mb-3 d-flex flex-row align-items-center justify-content-between">
            <div class="ranks rounded-1 m-2 ratio ratio-1x1"><img
                    src="https://m.media-amazon.com/images/M/MV5BOGExNDhhNmUtMmRmZC00ZmQ1LThjNDctZmJkMTFlOTEwZmUwXkEyXkFqcGdeQXVyNzgzODMxMzA@._V1_.jpg"
                    alt=""></div>
            <h1 class="fw-light text-white lh-md mb-2 ms-2">Sword Art Online</h1>
            <h1 class="fw-light text-white lh-md me-3">9/10</h1>
        </div>
        <div
            class="bg-dark py-md-1 ps-md-1 bg-opacity-25 rounded-1 mb-3 d-flex flex-row align-items-center justify-content-between">
            <div class="ranks rounded-1 m-2 ratio ratio-1x1"><img
                    src="https://m.media-amazon.com/images/M/MV5BOGExNDhhNmUtMmRmZC00ZmQ1LThjNDctZmJkMTFlOTEwZmUwXkEyXkFqcGdeQXVyNzgzODMxMzA@._V1_.jpg"
                    alt=""></div>
            <h1 class="fw-light text-white lh-md mb-2 ms-2">Sword Art Online</h1>
            <h1 class="fw-light text-white lh-md me-3">9/10</h1>
        </div>
        <div
            class="bg-dark py-md-1 ps-md-1 bg-opacity-25 rounded-1 mb-3 d-flex flex-row align-items-center justify-content-between">
            <div class="ranks rounded-1 m-2 ratio ratio-1x1"><img
                    src="https://m.media-amazon.com/images/M/MV5BOGExNDhhNmUtMmRmZC00ZmQ1LThjNDctZmJkMTFlOTEwZmUwXkEyXkFqcGdeQXVyNzgzODMxMzA@._V1_.jpg"
                    alt=""></div>
            <h1 class="fw-light text-white lh-md mb-2 ms-2">Sword Art Online</h1>
            <h1 class="fw-light text-white lh-md me-3">9/10</h1>
        </div>
    </div>
    {{-- ranking 2 --}}
    <div class="col-md-6 p-0 ps-md-3 col-sm-12">
        <h1 class="fw-bold text-white lh-md mb-2">Most Popular</h1>
        <div
            class="bg-dark py-md-1 ps-md-1 bg-opacity-25 rounded-1 mb-3 d-flex flex-row align-items-center justify-content-between">
            <div class="ranks rounded-1 m-2 ratio ratio-1x1"><img
                    src="https://m.media-amazon.com/images/M/MV5BOGExNDhhNmUtMmRmZC00ZmQ1LThjNDctZmJkMTFlOTEwZmUwXkEyXkFqcGdeQXVyNzgzODMxMzA@._V1_.jpg"
                    alt=""></div>
            <h1 class="fw-light text-white lh-md mb-2 ms-2">Sword Art Online</h1>
            <h1 class="fw-light text-white lh-md me-3">9/10</h1>
        </div>
        <div
            class="bg-dark py-md-1 ps-md-1 bg-opacity-25 rounded-1 mb-3 d-flex flex-row align-items-center justify-content-between">
            <div class="ranks rounded-1 m-2 ratio ratio-1x1"><img
                    src="https://m.media-amazon.com/images/M/MV5BOGExNDhhNmUtMmRmZC00ZmQ1LThjNDctZmJkMTFlOTEwZmUwXkEyXkFqcGdeQXVyNzgzODMxMzA@._V1_.jpg"
                    alt=""></div>
            <h1 class="fw-light text-white lh-md mb-2 ms-2">Sword Art Online</h1>
            <h1 class="fw-light text-white lh-md me-3">9/10</h1>
        </div>
        <div
            class="bg-dark py-md-1 ps-md-1 bg-opacity-25 rounded-1 mb-3 d-flex flex-row align-items-center justify-content-between">
            <div class="ranks rounded-1 m-2 ratio ratio-1x1"><img
                    src="https://m.media-amazon.com/images/M/MV5BOGExNDhhNmUtMmRmZC00ZmQ1LThjNDctZmJkMTFlOTEwZmUwXkEyXkFqcGdeQXVyNzgzODMxMzA@._V1_.jpg"
                    alt=""></div>
            <h1 class="fw-light text-white lh-md mb-2 ms-2">Sword Art Online</h1>
            <h1 class="fw-light text-white lh-md me-3">9/10</h1>
        </div>
        <div
            class="bg-dark py-md-1 ps-md-1 bg-opacity-25 rounded-1 mb-3 d-flex flex-row align-items-center justify-content-between">
            <div class="ranks rounded-1 m-2 ratio ratio-1x1"><img
                    src="https://m.media-amazon.com/images/M/MV5BOGExNDhhNmUtMmRmZC00ZmQ1LThjNDctZmJkMTFlOTEwZmUwXkEyXkFqcGdeQXVyNzgzODMxMzA@._V1_.jpg"
                    alt=""></div>
            <h1 class="fw-light text-white lh-md mb-2 ms-2">Sword Art Online</h1>
            <h1 class="fw-light text-white lh-md me-3">9/10</h1>
        </div>
        <div
            class="bg-dark py-md-1 ps-md-1 bg-opacity-25 rounded-1 mb-3 d-flex flex-row align-items-center justify-content-between">
            <div class="ranks rounded-1 m-2 ratio ratio-1x1"><img
                    src="https://m.media-amazon.com/images/M/MV5BOGExNDhhNmUtMmRmZC00ZmQ1LThjNDctZmJkMTFlOTEwZmUwXkEyXkFqcGdeQXVyNzgzODMxMzA@._V1_.jpg"
                    alt=""></div>
            <h1 class="fw-light text-white lh-md mb-2 ms-2">Sword Art Online</h1>
            <h1 class="fw-light text-white lh-md me-3">9/10</h1>
        </div>
    </div>
</div>
{{-- footer --}}
<div class="m-5 bg-dark bg-opacity-25 rounded-3">
    <footer class="text-center text-lg-start text-white">
        <div class="container p-4 pb-0">
            <section class="">
                <div class=" justify-content-between d-flex row">
                    <div class="col-md-3 col-lg-3 col-xl-3 mt-3 ms-md-4">
                        <h6 class="text-uppercase mb-4 font-weight-bold">
                            Rotten Banana
                        </h6>
                        <p class="text-justify">
                            Rotten Banana is the world’s most trusted recommendation resources for quality
                            entertainment. We also serve movie and TV fans with original editorial content on our site
                            and through social channels, produce fun and informative video series.
                        </p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mt-3 me-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold d-flex justify-content-end">Contact</h6>
                        <p class="d-flex justify-content-end align-items-center">Siwalankerto, SW 60012, INA<i
                                class="bi bi-house ms-3"></i></p>
                        <p class="d-flex justify-content-end align-items-center">rottenbanana@gmail.com<i
                                class="bi bi-envelope ms-3"></i></p>
                        <p class="d-flex justify-content-end align-items-center">+ 62 234 567 88 <i
                                class="bi bi-phone ms-3"></i></p>
                        <p class="d-flex justify-content-end align-items-center">+ 62 234 567 89<i
                                class="bi bi-printer ms-3"></i></p>
                    </div>
                </div>
                <hr class="my-3">
                <section class="p-3 pt-0">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-7 col-lg-8 text-center text-md-start">
                            <div class="p-3">© 2023 Copyright:<a class="text-white" href="#">rottenbanana.com</a></div>
                        </div>
                        <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                            <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i
                                    class="bi bi-facebook"></i></a>
                            <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i
                                    class="bi bi-twitter"></i></a>
                            <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i
                                    class="bi bi-google"></i></a>
                            <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i
                                    class="bi bi-instagram"></i></a>
                        </div>
                    </div>
        </div>
    </footer>
</div>
@endsection
@section('script')
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            "@0.00": {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            "@0.75": {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            "@1.00": {
                slidesPerView: 5,
                spaceBetween: 40,
            },
            "@1.50": {
                slidesPerView: 6,
                spaceBetween: 30,
            },
        },
    });
</script>
@endsection