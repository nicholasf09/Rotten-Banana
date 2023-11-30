@extends('user.layout.main')
@section('style');
<style>
  @import url("https://fonts.googleapis.com/css2?family=Orbit&display=swap");

  h1 {
    color: aliceblue;
  }

  .titleRating {
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 1px;
  }

  .titleRatingSecondary {
    font-size: 140%;
    color: aliceblue;
  }

  .movieDescription {
    color: aliceblue;
  }

  .movie-display::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('https://m.media-amazon.com/images/M/MV5BYzZjY2MzYTAtMmQxMi00MWVjLTlkZGQtYjJmNWVhODY3YjdjXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_FMjpg_UX1000_.jpg') center/cover fixed;
    filter: blur(20px);
    z-index: -1;
    opacity: 0.8;
  }

  .navbar {
    background-color: black;
    z-index: 1;
  }

  body {
    position: relative;
    z-index: 1;
    overflow: auto;
  }

  body::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.85);
    z-index: -1;
  }

  .rating {
    color: white;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
    background-color: black;
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 2;
  }

  #containerFilm {
    color: white;
    margin-top: 8vh;
  }

  #title {
    font-family: Helvetica;
    letter-spacing: 2px;
  }

  #titleDescription {
    color: rgba(255, 255, 255, 0.304);
  }

  .genre {
    background-color: transparent;
    cursor: pointer;
    border: 1px solid aliceblue;
    padding: 8px 0;
    border-radius: 20px;
    font-size: 11px;
    letter-spacing: 1px;
    transition: 0.3s;
    color: aliceblue;
    padding: 5px 10px;
    width: auto;
    font-weight: bold;
  }

  .genre:hover {
    background-color: rgba(146, 146, 146, 0.4);
  }

  hr {
    border: 1px solid aliceblue;

  }

  .truncate {
    max-height: 78px;
  }

  .readmore-btn {
    color: #008ea7;
    font-size: 13px;
    margin-top: 4px;
    cursor: pointer;
  }

  .square-button {
    position: relative;
    cursor: pointer;
    align-items: center;
    background-color: rgba(255, 255, 255, 0.1);
    color: white;
    text-align: center;
    transition: background-color 0.3s;
    margin: 2px;
    width: 100%;
    height: 100%
  }

  .square-button:hover {
    background-color: rgb(255, 255, 255, 0.2);
  }

  .readmore {
    overflow-y: hidden;
  }

  #container-rating {
    padding: 10px;
  }

  .card {
    background-color: #F7CA05;
    color: white;
    margin-right: -10px;
    margin-bottom: 10px;
    padding: none;
  }

  .card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .left-content {
    display: flex;
    align-items: center;
  }

  .right-content {
    display: flex;
    align-items: center;
  }

  .nama {
    font-size: 20px
  }

  .date {
    opacity: 0.5;
  }


  @media screen and (min-width: 986px) {
    .hide-on-large {
      display: none;
    }

    .square-button {
      height: 100%;
      width: 100%;
    }
  }

  @media screen and (max-width: 986px) and (min-width:762px) {
    .hide-on-medium {
      display: none;
    }

    .square-button {
      height: 40px;
      width: 100%;
    }
  }

  @media screen and (max-width: 762px) {
    .hide-on-small {
      display: none;
    }

    .square-button {
      height: 40px;
      width: 100%;
    }
  }


  h1 {
    margin: 0;
    padding: 0;
    font-weight: normal;
  }

  #starRating {
    list-style-type: none;
    display: flex;
    padding: 0;
  }

  .star {
    font-size: 300%;
    position: relative;
    transition: 0.2s ease-in all;
  }

  .star:not(.off) {
    animation: spin 0.5s;
  }

  .star.off {
    opacity: 0.25;
  }

  .star.off:after {
    animation: fade-down 1s forwards;
  }

  .star:before {
    content: "⭐";
  }

  .star:after {
    content: "⭐";
    position: absolute;
    top: 0;
    left: 0;
  }

  .star:hover {
    opacity: 0.7;
    cursor: pointer;
    transform: scale(1.05) rotate(5deg);
  }

  .star span {
    position: absolute;
    top: 0;
    left: 0;
    font-size: 10%;
    opacity: 0;
    animation: pew 1s forwards;
    animation-delay: var(--d, 0ms);
  }


  @keyframes pew {
    from {
      left: 50%;
      top: 50%;
      opacity: 0;
      font-size: 10%;
    }

    10% {
      opacity: 1;
    }

    50% {
      opacity: 0.7;
    }

    80% {
      opacity: 0;
    }

    99% {
      left: var(--l, 150%);
      top: var(--t, 150%);
      opacity: 0;
      font-size: 50%;
    }

    to {
      opacity: 0;
      font-size: 100%;
    }
  }

  @keyframes fade-down {
    to {
      transform: translateY(100px) scale(1.5) rotate(90deg);
      opacity: 0;
    }
  }

  @keyframes spin {
    from {
      transform: rotateY(0deg);
    }

    to {
      transform: rotateY(360deg);
    }
  }
</style>
@endsection
@section('content')
@csrf
@include('user.partials.navbar')
@foreach($data as $item)

<section class="movie-display py-0">
  <div id="containerFilm" class="container-fluid">
    <div class="row px-5 justify-content-between">
      <h1> {{ $item->judul}}</h1>
      <div class="col-lg-6 col-md-12 col-xs-12">
        <p>Original Title : {{ $item->judul}}</p>
        <p> {{ $item->tahun_rilis}} PG-13 {{ $item->durasi}}</p>
      </div>
      <div class="col-lg-6 col-md-12 col-xs-12 row text-center" style="color: rgba(255, 255, 255, 0.5);">
        <div class="col-lg-6 hide-on-medium hide-on-small hide p-0">
          <p class="titleRating text-right">rotten banana rating</p>
          <span class="titleRatingSecondary text-right"><i class="fa-solid fa-star"
              style="color: #f4f665;"></i><strong>9.5</strong></span><span>/10</span>
        </div>
        <div class="col-lg-6 hide-on-medium hide-on-small p-0">
          <p class="titleRating">your rating </p>
          <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalRating">
            <span><i class="titleRatingSecondary fa-regular fa-star" style="color: #65bef6;"></i><span
                style="color:#65bef6 ;">Rate!</span></span>
          </a>
        </div>
      </div>
    </div>
    <div class="row px-5">
      <div class="item col-sm-12 col-md-4 col-lg-3 p-1 hide-on-small"><img
          src="{{asset('storage/')}}/{{$item->path_image}}" alt="" width="100%" height="100%"></div>
      <div class="item embed-responsive col-sm-12 col-md-8 col-lg-7 p-1 "><iframe width="100%" height="100%"
          src="{{ $item->trailer}}" title="YouTube video player" frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
      </div>
      <div class="item sub-container row col-sm-12 col-md-12 col-lg-2 mx-0 px-1">
        <div class="col-sm-6 col-md-6 col-lg-12 p-0 my-1">
          <button class="btn square-button"><i class="bi bi-heart"></i></button>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-12 p-0 my-1">
          <button class="btn square-button"><i class="bi bi-star"></i></button>
        </div>
      </div>
    </div>
    <div class="movieDescription row px-5">
      <span class="py-2 genreSpan">
      </span>
      <div class="readmore truncate">
        <!-- sinopsis -->
        <p class="history-text">{{ $item->sinopsis}}
        </p>

      </div>
      <div class="readmore-btn">Read More</div>
    </div>
    <div class="row px-5 py-2">
      <div class="col-5 hide-on-medium hide-on-large"><img src="{{asset('storage/')}}/{{$item->path_image}}" alt=""
          width="100%" height="auto">
      </div>
      <div class="col-7">
        <p><strong>Release Date:</strong> {{$item ->tahun_rilis}}</p>
        <p><strong>Original Language:</strong> {{$item ->tahun_rilis}}</p>
        <p><strong>Director:</strong> John Director</p>
        <p><strong>Producer:</strong> John Director</p>
        <p><strong>Distributor:</strong> John Director</p>
      </div>
    </div>
  </div>
</section>
<section class="rating ">
  <div id="container-rating" class="container-fluid justify-content-center align-item-center px-2">
    <div class="row justify-content-between px-5">
      <h3>Rating!</h3>
      <!-- review -->
      <div class=" card col-xs-12 col-md-6 col-lg-4 ">
        <div class="card-header">
          <div class="left-content">
            <span>
              <strong class="nama">Adi</strong>
              <span class="date">12-04-2020</span>
            </span>
          </div>
          <div class="right-content">
            <span>
              <i class="fa-solid fa-star" style="color: #f4f665;"></i>
              <strong>9.5</strong>
            </span>
            <span>/10</span>
          </div>
        </div>
        comment Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos maiores assumenda minus accusantium.
        Suscipit enim nam laborum delectus, tenetur harum perferendis tempore temporibus consequuntur earum ratione
        nesciunt ipsum neque esse.
      </div>

    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalRating" tabindex="-1" aria-labelledby="modalRating" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered d-flex align-items-center">
    <div class="modal-content text-center">
      <h1 style="color: black;">RATE THIS FILM :D</h1>
      <ul id="modalStar" data-score="1" class="list-unstyled d-flex justify-content-center">
        <li class="star off"></li>
        <li class="star off"></li>
        <li class="star off"></li>
        <li class="star off"></li>
        <li class="star off"></li>
      </ul>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    $(".readmore-btn").on("click", function () {
      $(".readmore").toggleClass("truncate");
    });

    var myArray = "{{ $item->genre}}";
    var split = myArray.split(" ");
    split.forEach(function (word) {
      var button = $('<button/>', {
        text: word,
        class: 'genre',
        'data-href': 'https://example.com/' + word.toLowerCase(),
        click: function () {
          var href = $(this).data('href');
          window.location.href = href;
        }
      });
      $('.genreSpan').append(button);
    });

    function rand(min, max) {
      // min and max included
      return Math.floor(Math.random() * (max - min + 1) + min);
    }

    function score() {
      let currentScore = $("#modalStar").data('score');
      $('.star').each(function (i, e) {
        if (i < currentScore) {
          setTimeout(() => {
            e.classList.remove('off');
            spark(e, 5 * i, i * 50, i * 20);
          }, i * 50);
        } else {
          e.classList.add('off');
        }
      });
    }

    function setScore(s) {
      let currentScore = $("#modalStar").data('score');
      if (currentScore == s) {
        $("#modalStar").data('score', 0);
      } else {
        $("#modalStar").data('score', s);
      }
      console.log(s);
      score();
    }

    $(".star").on("click", function () {
      setScore($(this).index() + 1);
    });

    function spark(e, nbStars, amp = 50, delay = 200) {
      const possibleStars = ["✨", "⭐", "🌟", "💫"];

      for (let i = 0; i < nbStars; i++) {
        let s = document.createElement('span');
        s.textContent = possibleStars[rand(0, possibleStars.length - 1)];
        s.style.setProperty('--t', rand(-amp, amp) + "%");
        s.style.setProperty('--l', rand(-amp, amp) + "%");
        s.style.setProperty('--d', rand(0, delay) + "ms");
        e.append(s);
        setTimeout(() => { s.remove(); }, 3000);
      }
    }

    score();
  });
</script>


@endforeach
@endsection