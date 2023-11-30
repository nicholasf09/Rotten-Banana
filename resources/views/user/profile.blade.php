@include('user.partials.navbar')
@extends('user.layout.main')
@section('content')


<style>
  nav {
      background-color: #121212;
  }
  body {
    margin: 0;
    padding: 0;
      background-color: #121212;
  }
  .swiper-wrapper::-webkit-scrollbar {
        display: none;
    }
  .card {
      box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
  }
  .card {
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-clip: border-box;
      border-radius: .25rem;
  }
  .card-body {
      flex: 1 1 auto;
      min-height: 1px;
      padding: 1rem;
  }
  .mb-3, .my-3 {
      margin-bottom: 1rem!important;
  }
  .h-100 {
      height: 100%!important;
  }
  .shadow-none {
      box-shadow: none!important;
  }
  .mt-10 {
      margin-top: 12vh;
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
        height: 100%;
        width: auto;
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
</style>

<div class="container mt-10 justify-content-center">
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="card  bg-dark bg-opacity-25">
        <div class="card-body">
          <div class="d-flex flex-md-row flex-column justify-content-center py-5 align-items-center text-center">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="300px">
            <div class="mt-3 ms-md-3 text-md-start text-center">
              <h1 class="text-white" style="font-size: 5vh;">{{ auth()-> user()->name }}</h1>
              <p class="text-white opacity-75 fs-5 fw-light">{{ auth()-> user()->email }}</p>
            </div>
          </div>
        </div>
      </div>      
    </div>
    <div class="col-md-6">
      <div class="bg-dark bg-opacity-25 mb-3 pb-3">
        <h1 class="text-white text-center py-5">Recent Favorites</h1>
        <div class="mx-5 mb-3">
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
      </div>
    </div>
      <div class="col-sm-12 col-md-6">
        <div class="bg-dark bg-opacity-25 pb-3">
          <h1 class="text-white text-center py-5">Recent Review</h1>
          <div class="mx-5 mb-3">
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
        </div>
      </div>
      <div class="col-sm-12">
        <div class="bg-dark bg-opacity-25">
          <h1 class="text-white text-center py-5">Your Review</h1>
        </div>
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
                      <h6 class="text-uppercase mb-4 font-weight-bold d-flex justify-content-center">Contact</h6>
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
              </section>
      </div>
  </footer>
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
                slidesPerView: 1,
                spaceBetween: 20,
            },
            "@1.00": {
                slidesPerView: 1,
                spaceBetween: 40,
            },
            "@1.50": {
                slidesPerView: 3,
                spaceBetween: 10,
            },
        },
    });
</script>
@endsection