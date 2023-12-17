@extends('user.layout.main')
@section('style')
<style>
    * {
        font-family: 'poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    ::-webkit-scrollbar {
        width: 9px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: yellow;
        border-radius: 6px;
    }

    ::-webkit-scrollbar-track {
        background-color: #121212;
        border-radius: 6px;
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
        max-width: 15vh;
        min-width: 15vh;
        overflow: hidden;
    }

    .ranks img {
        object-fit: cover;
        object-position: center;
    }

    @media (min-width: 768px) {
        .carouselWidth {
            width: 45vw;
        }

        .title {
            font-size: 45px;
            text-align: justify;
        }

        .landing {
            margin-top: 20vh;
        }
    }

    @media (max-width: 767px) {
        .carouselWidth {
            width: 90vw;
        }

        .title {
            font-size: 20px;
            margin-top: 20px;
            text-align: center;
        }

        .landing {
            margin-top: 15vh;
        }
    }
</style>
@endsection
@section('content')
@include('user.partials.navbar')
<div class="row mx-5 justify-content-center align-items-center landing">
    <div class="col-lg-8 col-12 rounded carouselWidth">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                    aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner rounded">
                <div class="carousel-item active">
                    <img src="https://r4.wallpaperflare.com/wallpaper/446/754/407/anime-anime-girls-anime-screenshot-lycoris-recoil-nishikigi-chisato-hd-wallpaper-5900582da17a1d5b2677184ff091667d.jpg"
                        class="d-block w-100 rounded-start-3" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://studio.mrngroup.co/storage/app/media/Prambors/Editorial%202/tanjiro-20230208155752.webp?tr=w-600"
                        class="d-block w-100 rounded-start-3" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://r4.wallpaperflare.com/wallpaper/496/291/661/zom-100-bucket-list-of-the-dead-akira-tendou-zombies-happy-blood-hd-wallpaper-f950d81d517aed8b26b7386f500176bd.jpg"
                        class="d-block w-100 rounded-start-3" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://image.tmdb.org/t/p/w780/wl88YET5Amol1UlXNjO0uE8dY33.jpg"
                        class="d-block w-100 rounded-start-3" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://m.media-amazon.com/images/M/MV5BMjkzZGMzNDktMzc3ZS00OTBlLThmYWEtM2M2NDZmMTZmYzZmXkEyXkFqcGdeQXVyODMyNTM0MjM@._V1_.jpg"
                        class="d-block w-100 rounded-start-3" alt="...">
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
    <h1 class="fw-bold title text-light col-lg-4 col-12 text-start">Rotten Banana helps you to select the perfect next show or
        movie to watch!</h1>
</div>
{{-- drakor --}}
<div class="mx-5 mb-3 mt-5">
    <div class="d-flex justify-content-between align-items-end mb-2">
        <h1 class="fw-bold text-white lh-md mb-2">K-Dramas</h1>
        <p class="text-white mb-0 me-5  ">Scroll to view</p>
    </div>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($kdramas as $kdrama)
            <div class="swiper-slide">
                <a href="{{route('user.filmMain',[$kdrama->id])}}">
                    <img src="{{ asset('storage/' . $kdrama->path_image) }}" alt="">
                </a>
            </div>
            @endforeach
            {{-- <div class="swiper-slide"><img
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
                    alt=""></div> --}}
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
            @foreach ($animes as $anime)
            <div class="swiper-slide">
                <a href="{{route('user.filmMain',[$anime->id])}}">
                    <img src="{{ asset('storage/' . $anime->path_image) }}" alt="">
                </a>
            </div>
            @endforeach
            {{-- <div class="swiper-slide"><img
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
                    alt=""></div> --}}
        </div>
    </div>
</div>
{{-- ranking --}}
<div class="row m-5" id="ranking">
    {{-- ranking 1 --}}
    <div class="col-md-6 p-0 pe-md-3 col-sm-12">
        <h1 class="fw-bold text-white lh-md mb-2">Best Rating</h1>
        @foreach ($rating as $r)
        <a href="{{route('user.filmMain',[$r->id])}}" style="text-decoration: none">
            <div
                class="bg-dark py-md-1 ps-md-1 bg-opacity-25 rounded-1 mb-3 d-flex flex-row align-items-center justify-content-between text-center">
                <div class="ranks rounded-1 m-2 ratio ratio-1x1"><img src="{{ asset('storage/' . $r->path_image) }}"
                        alt=""></div>
                <h3 class="fw-light text-white lh-md mb-2 ms-2" style="max-width:30%">{{$r->judul}}</h3>
                <h1 class="fw-light text-white lh-md me-3">{{round($r->avgRating,1)}}
                    <img id="logoPisang" style="width: 50px;"
                        src="{{ $r->avgRating <= 2 ? asset('storage/uploads/assets/pisang_busuk.png') : ($r->avgRating <= 4 ? asset('storage/uploads/assets/pisang_hijau.png') : asset('storage/uploads/assets/pisang_kuning.png')) }}"
                        alt="">
                </h1>
            </div>
        </a>
        @endforeach
        {{-- <div
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
        </div> --}}
        {{-- <div
            class="bg-dark py-md-1 ps-md-1 bg-opacity-25 rounded-1 mb-3 d-flex flex-row align-items-center justify-content-between">
            <div class="ranks rounded-1 m-2 ratio ratio-1x1"><img
                    src="https://m.media-amazon.com/images/M/MV5BOGExNDhhNmUtMmRmZC00ZmQ1LThjNDctZmJkMTFlOTEwZmUwXkEyXkFqcGdeQXVyNzgzODMxMzA@._V1_.jpg"
                    alt=""></div>
            <h1 class="fw-light text-white lh-md mb-2 ms-2">Sword Art Online</h1>
            <h1 class="fw-light text-white lh-md me-3">9/10</h1>
        </div> --}}
    </div>


    {{-- ranking 2 --}}
    <div class="col-md-6 p-0 ps-md-3 col-sm-12">
        <h1 class="fw-bold text-white lh-md mb-2">Most Popular</h1>
        @foreach ($popular as $p)
        <a href="{{route('user.filmMain', [$p->id])}}" style="text-decoration: none">
            <div
                class="bg-dark py-md-1 ps-md-1 bg-opacity-25 rounded-1 mb-3 d-flex flex-row align-items-center justify-content-between text-center">
                <div class="ranks rounded-1 m-2 ratio ratio-1x1"><img src="{{ asset('storage/' . $p->path_image) }}"
                        alt=""></div>
                <h3 class="fw-light text-white lh-md mb-2 ms-2 " style="max-width:30%">{{$p->judul}}</h3>
                <h1 class="fw-light text-white lh-md me-3">{{round($p->avgRating,1)}}
                    <img id="logoPisang" style="width: 50px;"
                        src="{{ $p->avgRating <= 2 ? asset('storage/uploads/assets/pisang_busuk.png') : ($p->avgRating <= 4 ? asset('storage/uploads/assets/pisang_hijau.png') : asset('storage/uploads/assets/pisang_kuning.png')) }}"
                        alt="">
                </h1>
            </div>
        </a>
        @endforeach
        {{-- <div
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
        </div> --}}
    </div>
</div>
{{-- footer --}}
<div class="bg-dark bg-opacity-25 rounded-3">
    <footer class="text-center text-lg-start text-white">
        @include('user.partials.footer')
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