@extends('user.layout.main')
@section('style')
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
    background: url('{{ asset("storage/" . $film->path_image) }}') center/cover fixed;
    filter: blur(80px);
    z-index: -1;
    opacity: 0.8;

  }

  .navbar {
    background-color: black;
    z-index: 1;
  }

  body {
    font-family: sans-serif;
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
    background-color: rgba(0, 0, 0, 0.6);
    z-index: -1;
  }

  .rating {
    color: white;
    background-color: black;
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 2;
    overflow: auto;
  }

  #containerFilm {
    color: white;
    margin-top: 100px;
  }

  #title {
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
    max-height: 77px;
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




  .square-button:before {
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
    color: white;
    background-color: rgba(255, 255, 255, 0.2);
    margin-top: 10px;
    margin-right: -10px;
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }


  .card-content {
    padding: 5px;
    font: content;
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

  /* Variables */
  :root {
    --heart-size: 150px;
  }


  /* Like Button */
  .like {
    position: relative;
  }

  .like__label {
    display: block;
    width: var(--heart-size);
    height: var(--heart-size);
    position: relative;
    cursor: pointer;
    margin: 0;
  }

  .like__input {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
  }

  .like__heart {
    width: var(--heart-size);
    height: var(--heart-size);
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    background: url(https://cssanimation.rocks/images/posts/steps/heart.png) no-repeat;
    background-position: 0 0;
    background-size: 4350px var(--heart-size);
    cursor: pointer;
  }

  .like__input:checked~.like__heart {
    animation: heart-explosion 1s steps(28);
    transition: background 1s steps(28);
    background-position: -4200px 0;
  }

  /* ToolTips */
  .like__heart::after {
    display: block;
    content: attr(data-label-default);
    width: auto;
    position: absolute;
    z-index: -1;
    bottom: 80%;
    left: 50%;
    padding: 0.25rem 0.5rem;
    font-size: 1rem;
    white-space: nowrap;
    color: #fff;
    background-color: #2b2b2b;
    border-radius: .5rem;
    opacity: 0;
    transform: translate(-50%, 0);
    transition: all 0.2s ease;
    pointer-events: none;
  }

  .like__heart:hover::after {
    display: block;
    opacity: 1;
    z-index: 10;
    transform: translate(-50%, -0.25rem);
  }

  .like__input:checked~.like__heart::after {
    content: attr(data-label-active);
  }

  /* Animation */
  @keyframes heart-explosion {
    0% {
      background-position: 0 0;
    }

    100% {
      background-position: -4200px 0;
    }
  }

  .tweet {
    display: flex;
    width: 300px;
    height: 300px;
    justify-content: center;
    align-items: center;
    border-radius: 8px;
    background-color: #FFF;
    box-shadow: 0 0 36px rgba(0, 0, 0, 0.15);
  }

  .attribution {
    text-align: center;
    font-style: italic;
    margin-top: 4rem;
    color: darken(salmon, 50%);
  }

  .card-header img {
    object-fit: cover;
    object-position: center;
    border-radius: 50%;
    width: 50px;
    height: 50px;
  }

  .modal-header {
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    margin: 0;
    text-transform: uppercase;
    font-family: fantasy;
    height: 10vh;
    letter-spacing: 2px;
    font-size: xx-large;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    background: url('https://i.pinimg.com/originals/b7/35/0f/b7350f632e65cf0cbfbd475d7bac1678.png');
    background-size: cover;
    background-repeat: no-repeat;
  }

  #komen {
    max-width: 100%;
    overflow-y: auto;
  }

  #submit {
    background: rgb(255, 151, 0);
    border: none;
    z-index: 1;
    position: relative;
    padding: 9px 18px;
    border-radius: 25px;
  }

  #submit:after {
    position: absolute;
    content: "";
    width: 100%;
    height: 0;
    top: 0;
    left: 0;
    z-index: -1;
    border-radius: 25px;
    /* Keep the same border-radius as the button */
    background-color: #eaf818;
    background-image: linear-gradient(315deg, #eaf818 0%, #f6fc9c 74%);
    box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, 0.5),
      7px 7px 20px 0px rgba(0, 0, 0, 0.1),
      4px 4px 5px 0px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
  }

  #submit:hover {
    color: #000;
  }

  #submit:hover:after {
    top: auto;
    bottom: 0;
    height: 100%;
  }

  #submit:active {
    top: 2px;
  }
</style>

@endsection
@section('content')
@csrf
@include('user.partials.navbar')


<section class="movie-display py-5">
  <div id="containerFilm" class="container-fluid px-2">
    <div class="row px-5 justify-content-between">
      <h1 id="judulFilm"> {{$film->judul}}</h1>
      <div class="col-lg-6 col-md-12 col-xs-12">
        <p id="orginalTitle">Original Language : {{ $film->original_language}}</p>
        <p id="tahunRilis&filmDurasi"> {{ $film->tahun_rilis}} PG-{{ $film->pg}} {{ $film->durasi}}</p>
      </div>
      <div class="col-lg-6 col-md-12 col-xs-12 row text-center" style="color: rgba(255, 255, 255, 0.5);">
        <div class="col-lg-6 hide-on-medium hide-on-small hide p-0">
          <p class="titleRating text-right">rotten banana <br> rating</p>
          <span class="titleRatingSecondary text-right"><i class="fa-solid fa-star" style="color: #f4f665;"></i><strong
              id="totalRating">{{ $jumlahReview == 0 ? 0 : $totalRating / $jumlahReview
              }}</strong></span><span>/5</span>
        </div>
        <div class="col-lg-6 hide-on-medium hide-on-small hide p-0">
          <p class="titleRating text-right">rotten banana <br> like</p>
          <span class="titleRatingSecondary text-right"><i class="fa-solid fa-heart" style="color: #ff0000;"></i><strong
              id="totalLike">{{$film->like}}</strong></span>
        </div>
      </div>
    </div>
    <div class="row px-5">
      <div class="item col-sm-12 col-md-4 col-lg-3 p-1 hide-on-small"><img id="posterFilm"
          src="{{asset('storage/')}}/{{$film->path_image}}" alt="" width="100%" height="100%"></div>
      <div class="item embed-responsive col-sm-12 col-md-8 col-lg-7 p-1 "><iframe id="trailerFilm" width="100%"
          height="100%" src="{{ $film->trailer}}" title="YouTube video player" frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
      </div>
      <div class="item sub-container row col-sm-12 col-md-12 col-lg-2 mx-0 px-1">
        <div class="col-sm-6 col-md-6 col-lg-12 p-0 my-1">
          <button id="buttonRating" class="btn square-button" data-bs-toggle="modal" data-bs-target="#modalRating">
            <i class="bi bi-star"></i>
          </button>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-12 p-0 my-1">
          <button id="buttonLike" class="btn square-button" data-bs-toggle="modal" data-bs-target="#modalLike"><i
              class="bi bi-heart"></i></button>
        </div>
      </div>
    </div>
    <div class="movieDescription row px-5">
      <span class="py-2 genreSpan">
      </span>
      <div class="readmore truncate">
        <!-- sinopsis -->
        <p id="sinopsis">{{ $film->sinopsis}}
        </p>

      </div>
      <div class="readmore-btn">Read More</div>
    </div>
    <div class="row px-5 py-2">
      <div class="col-5 hide-on-medium hide-on-large"><img src="{{asset('storage/')}}/{{$film->path_image}}" alt=""
          width="100%" height="auto">
      </div>
      <div class="col-7">
        <p id="tahunRilis"><strong>Release Date:</strong> {{$film ->tahun_rilis}}</p>
        <p id="originalLanguage"><strong>Original Language:</strong> {{$film ->tahun_rilis}}</p>
        <p id="direktor"><strong>Director: </strong>{{$film ->director}} </p>
        <p id="producer"><strong>Producer:</strong> {{$film ->producer}}</p>
        <p id="distributor"><strong>Distributor:</strong> {{$film ->distributor}}</p>
      </div>
    </div>
  </div>
</section>
<section class="rating py-4">
  <div id="container-rating" class="container-fluid justify-content-center align-item-center px-2">
    <h3 id="titleRating"><i class="fa-solid fa-chart-line ps-5" style="color: #E3CF57;"></i>User Rating</h3>
    <div id="usercard" class="row justify-content-between px-5">

      <div id="cardContainerUser" class="card col-xs-12 col-md-6 col-lg-4">
        <!-- User review content -->
        @if (!empty($review))
        <div class="card-header">
          <div class="left-content">
            <a href="{{route('user.profile', auth()->user()->id)}}" style="text-decoration: none; color: white">
              <span>
                <img src="https://www.murrayglass.com/wp-content/uploads/2020/10/avatar-2048x2048.jpeg"
                  alt="Profile Picture">
                <strong class="namaUser">{{$review['name']}}</strong>
                <input type='hidden' id='idUser' value="{{auth()->user()->id}}">
              </span>
            </a>
          </div>
          <div class="right-content">
            <span>
              <img id="logoPisang"
                src="{{ $review['rating'] <= 2 ? asset('storage/uploads/assets/pisang_busuk.png') : ($review['rating'] <= 4 ? asset('storage/uploads/assets/pisang_hijau.png') : asset('storage/uploads/assets/pisang_kuning.png')) }}"
                alt="">
              <strong id="ratingUser">{{$review['rating']}}</strong>
            </span>
            <span>/5</span>
          </div>
        </div>
        <div class="card-content">
          <p id="komenUser">{{$review['komen']}}</p>
          <div style="display: flex; justify-content: space-between">
            <p class="card-text"><small id="createdUser">{{$review['created']}}</small></p>
            <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
            <input type="hidden" value="{{$review['id']}}" id="idReview">
          </div>
        </div>
        @endif
      </div>

      <!-- Iterate over all reviews -->
      @foreach ($allReview as $r)
        @if (!empty($review))
          @if ($r['id'] != $review['id'])
          <div id="cardContainerUser" class="card col-xs-12 col-md-6 col-lg-4">
            <!-- Other reviews content -->
            <div class="card-header">
              <div class="left-content">
                <a href="{{route('user.profile', $r['akunId'])}}" style="text-decoration: none; color: white">
                  <span>
                    <img src="https://www.murrayglass.com/wp-content/uploads/2020/10/avatar-2048x2048.jpeg"
                      alt="Profile Picture">
                    <strong class="namaUser">{{$r['name']}}</strong>
                    <input type='hidden' id='idUser' value="{{$r['akunId']}}">
                  </span>
                </a>
              </div>
              <div class="right-content">
                <span>
                  <img id="logoPisang"
                    src="{{ $r['rating'] <= 2 ? asset('storage/uploads/assets/pisang_busuk.png') : ($r['rating'] <= 4 ? asset('storage/uploads/assets/pisang_hijau.png') : asset('storage/uploads/assets/pisang_kuning.png')) }}"
                    alt="">
                  <strong id="ratingUser">{{$r['rating']}}</strong>
                </span>
                <span>/5</span>
              </div>
            </div>
            <div class="card-content">
              <p id="komenUser">{{$r['komen']}}</p>
              @if (session('role') == "admin")
              <div style="display: flex; justify-content: space-between">
                <p class="card-text"><small id="createdUser">{{$r['created']}}</small></p>
                <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
                <input type="hidden" value="{{$r['id']}}" id="idReview">
              </div>
              @else
              <p class="card-text"><small id="createdUser">{{$r['created']}}</small></p>
              @endif
            </div>
          </div>
          @endif
        @else
        <div id="cardContainerUser" class="card col-xs-12 col-md-6 col-lg-4">
          <!-- Other reviews content -->
          <div class="card-header">
            <div class="left-content">
              <a href="{{route('user.profile', $r['akunId'])}}" style="text-decoration: none; color: white">
                <span>
                  <img src="https://www.murrayglass.com/wp-content/uploads/2020/10/avatar-2048x2048.jpeg"
                    alt="Profile Picture">
                  <strong class="namaUser">{{$r['name']}}</strong>
                  <input type='hidden' id='idUser' value=" + data['akunId'] +">
                </span>
              </a>
            </div>
            <div class="right-content">
              <span>
                <img id="logoPisang"
                  src="{{ $r['rating'] <= 2 ? asset('storage/uploads/assets/pisang_busuk.png') : ($r['rating'] <= 4 ? asset('storage/uploads/assets/pisang_hijau.png') : asset('storage/uploads/assets/pisang_kuning.png')) }}"
                  alt="">
                <strong id="ratingUser">{{$r['rating']}}</strong>
              </span>
              <span>/5</span>
            </div>
          </div>
          <div class="card-content">
            <p id="komenUser">{{$r['komen']}}</p>
            @if (session('role') == "admin")
            <div style="display: flex; justify-content: space-between">
              <p class="card-text"><small id="createdUser">{{$r['created']}}</small></p>
              <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
              <input type="hidden" value="{{$r['id']}}" id="idReview">
            </div>
            @else
            <p class="card-text"><small id="createdUser">{{$r['created']}}</small></p>
            @endif
          </div>
        </div>
        @endif  
        @endforeach
    </div>
  </div>

  @include('user.partials.footer')
</section>

<!-- Modal -->
<div class="modal fade" id="modalRating" tabindex="-1" aria-labelledby="modalRating" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered d-flex align-items-center">
    <div class="modal-content text-center">
      <div class="modal-header">
        <p class="p-0 m-0">Rate This Film</p>
      </div>
      <div class="modal-body">
        <h1 style="color: black;">Rate</h1>
        <ul id="modalStar" data-score="1" class="list-unstyled d-flex justify-content-center">
          <li class="star off"></li>
          <li class="star off"></li>
          <li class="star off"></li>
          <li class="star off"></li>
          <li class="star off"></li>
        </ul>
        <label for="komen">Comment: </label>
        <br>
        <textarea name="komen" id="komen" cols="100" rows="10"></textarea>
      </div>
      <div class="modal-footer"><button id="submit">Submit</button></div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalLike" tabindex="-1" aria-labelledby="modalLike" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="d-flex align-items-center justify-content-center">
        <div class="like">
          <label for="tweet-123-like" class="like__label" aria-label="like this tweet">
            @if ($like)
            <input class="like__input" type="checkbox" name="like" id="tweet-123-like" value="1" checked>
            @else
            <input class="like__input" type="checkbox" name="like" id="tweet-123-like" value="1">
            @endif
            <div class="like__heart" data-label-default="Like This Film" data-label-active="Undo Like"></div>
          </label>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<script>


  $(document).ready(function () {
    var rating = 0;
    var komen = '';
    var filmId = '{{$film->id}}';
    var userId = '{{Auth::user()->id}}';
    var create = "{{!empty($review)}}";
    var newElement = "{{!empty($review)}}";
    var ratingUser = 0;
    if ($("#ratingUser").text() != "") {
      ratingUser = parseInt($("#ratingUser").text());
    }
    var totalRating = parseInt("{{$totalRating}}");
    var jumlahReview = parseInt("{{$jumlahReview}}");
    var rata2 = totalRating / jumlahReview;
    if (jumlahReview == 0) {
      rata2 = 0;
    }
    var likeAtoGak = "{{$like}}";

    $(document).on('change', '.like__input', function () {
      if ($(this).prop('checked')) {
        $.ajax({
          url: "{{env('LINK_WEBSITE')}}user/like/{{$film->id}}",
          type: 'POST',
          data: {
            _token: "{{ csrf_token() }}",
            id: "{{$film->id}}",
          },
          dataType: 'json',
          success: function (data) {
            likeAtoGak = true;
            $("#totalLike").text(data['like']);
          }
        });
      } else {
        $.ajax({
          url: "{{env('LINK_WEBSITE')}}user/unlike/{{$film->id}}",
          type: 'POST',
          data: {
            _token: "{{ csrf_token() }}",
            id: "{{$film->id}}",
          },
          dataType: 'json',
          success: function (data) {
            likeAtoGak = false;
            $("#totalLike").text(data['like']);
          }
        });
      }
    });


    $(document).on('click', "#deleteButton", function () {
      var button = $(this);
      Swal.fire({
        title: 'Apakah yakin mau mendelete komen ini?',
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "{{route('user.deleteReview')}}",
            type: 'POST',
            data: {
              _token: "{{ csrf_token() }}",
              id: $(this).siblings('#idReview').val(),
            },
            dataType: 'json',
            success: function (data) {
              newElement = null;
              totalRating = parseInt(totalRating) - parseInt(ratingUser);
              jumlahReview = parseInt(jumlahReview) - 1;
              rata2 = totalRating / jumlahReview;
              if (jumlahReview == 0) {
                rata2 = 0;
              }

              $("#totalRating").text(rata2);
              Swal.fire({
                icon: 'success',
                title: data['message'],
                text: 'Komen anda telah berhasil di delete!',
              })
              create = false;
              button.closest('#tambahanAjax').remove();
              $("#cardContainerUser").hide();
            }
          });
        }
        else if (result.isDenied) {
          Swal.fire('Komen anda tidak jadi di delete!', '', 'info')
        }
      })
    })

    if (!create) {
      $("#cardContainerUser").hide();
    } else {
      $("#cardContainerUser").show();
    }

    $('#submit').click(function () {
      rating = $("#modalStar").data('score');
      komen = $('#komen').val();
      if (create == true) {
        if (rating == 0 || rating == null) {
          Swal.fire({
            icon: 'error',
            title: 'Rating belum diisi',
            text: 'Mohon diisi terlebih dahulu, Terima kasih!',
          })
        }
        else {
          $.ajax({
            url: "{{route('user.updateReview')}}",
            type: 'POST',
            data: {
              _token: "{{ csrf_token() }}",
              filmId: filmId,
              userId: userId,
              rating: rating,
              komen: komen,
            },
            dataType: 'json',
            success: function (data) {
              $("input").val("");
              $("textarea").val("");
              Swal.fire({
                icon: 'success',
                title: data['message'],
                text: 'Terima kasih atas reviewnya!',
              })

              totalRating = parseInt(totalRating) - parseInt(ratingUser) + parseInt(data['rating']);
              jumlahReview = parseInt(jumlahReview);
              rata2 = totalRating / jumlahReview;
              ratingUser = parseInt(data['rating']);
              $("#totalRating").text(rata2);
              $("#ratingUser").text(data['rating']);
              if (newElement == null) {
                $("#ratingUser").text(data['rating']);
                $('#komenUser').text(data['komen']);
                if (($('#komenUser').val() == "")) {
                  $('#komenUser').html("");
                }
                $("#createdReview").html(data['created']);
                var srcImage = "";

                if (data['rating'] <= 2) {
                  srcImage = "{{asset('storage/uploads/assets/pisang_busuk.png')}}";
                }
                else if (data['rating'] <= 4) {
                  srcImage = "{{asset('storage/uploads/assets/pisang_hijau.png')}}";
                }
                else {
                  srcImage = "{{asset('storage/uploads/assets/pisang_kuning.png')}}";
                }

                $("#logoPisang").attr('src', srcImage);

              } else {


                var srcImage = "";

                if (data['rating'] <= 2) {
                  srcImage = "{{asset('storage/uploads/assets/pisang_busuk.png')}}";
                }
                else if (data['rating'] <= 4) {
                  srcImage = "{{asset('storage/uploads/assets/pisang_hijau.png')}}";
                }
                else {
                  srcImage = "{{asset('storage/uploads/assets/pisang_kuning.png')}}";

                }

                newElement = $(
                  "<div id='cardContainerUser' class='card col-xs-12 col-md-6 col-lg-4'>" +
                  "<div id='tambahanAjax'>" +
                  "<div class='card-header'>" +
                  "<div class='left-content'>" +
                  "<a href='{{env('LINK_WEBSITE')}}user/profile/"+data['akunId']+"' style='text-decoration: none; color: white'>" +
                  "<span>" +
                  "<img src='https://www.murrayglass.com/wp-content/uploads/2020/10/avatar-2048x2048.jpeg' alt='Profile Picture'>" +
                  "<strong class='namaUser'>" + data['name'] + "</strong>" +
                  "<input type='hidden' id='idUser' value='" + data['akunId'] + "'>" +
                  "</span></a>" +
                  "</div>" +
                  "<div class='right-content'>" +
                  "<span>" +
                  "<img id='logoPisang' src='" + srcImage + "' alt=''>" +
                  "<strong id='ratingUser'>" + data['rating'] + "</strong>" +
                  "</span>" +
                  "<span>/5</span>" +
                  "</div>" +
                  "</div>" +
                  "<div class='card-content'>" +
                  "<p id='komenUser'>" + (data['komen'] || "") + "</p>" +
                  "<div style='display: flex; justify-content: space-between'>" +
                  "<p class='card-text'><small id='createdUser'>" + data['created'] + "</small></p>" +
                  "<button type='button' class='btn btn-danger' id='deleteButton'>Delete</button>" +
                  "<input type='hidden' value='" + data['id'] + "' id='idReview'>" +
                  "</div>" +
                  "</div>" +
                  "</div>" +
                  "</div>");
                $("#usercard").html(newElement);

              }
            }

          });
        }
      }
      else {
        if ($("#rating").val() == 0 || $("#modalStar").data('score') == null) {
          Swal.fire({
            icon: 'error',
            title: 'Rating belum diisi',
            text: 'Mohon diisi terlebih dahulu, Terima kasih!',
          })
        }
        else {
          $.ajax({
            url: "{{route('user.storeReview')}}",
            type: 'POST',
            data: {
              _token: "{{ csrf_token() }}",
              filmId: filmId,
              userId: userId,
              rating: rating,
              komen: komen,
            },
            dataType: 'json',
            success: function (data) {
              console.log(data);
              ratingUser = parseInt(data['rating']);
              create = true;
              Swal.fire({
                icon: 'success',
                title: data['message'],
                text: 'Terima kasih atas reviewnya!',
              })
              totalRating = parseInt(totalRating) + parseInt(data['rating']);
              jumlahReview = parseInt(jumlahReview) + 1;
              rata2 = totalRating / jumlahReview;
              $("#totalRating").text(rata2);
              var srcImage = "";

              if (data['rating'] <= 2) {
                srcImage = "{{asset('storage/uploads/assets/pisang_busuk.png')}}";
              }
              else if (data['rating'] <= 4) {
                srcImage = "{{asset('storage/uploads/assets/pisang_hijau.png')}}";
              }
              else {
                srcImage = "{{asset('storage/uploads/assets/pisang_kuning.png')}}";

              }

              $("input").val("");
              $("textarea").val("");
              $("#cardContainerUser").show()
              $("#cardContainerUser").css("margin-bottom", "25px");
              newElement = $(
                "<div id='cardContainerUser' class='card col-xs-12 col-md-6 col-lg-4'>" +
                "<div id='tambahanAjax'>" +
                "<div class='card-header'>" +
                "<div class='left-content'>" +
                "<a href='{{env('LINK_WEBSITE')}}user/profile/"+data['akunId']+"' style='text-decoration: none; color: white'>" +
                "<span>" +
                "<img src='https://www.murrayglass.com/wp-content/uploads/2020/10/avatar-2048x2048.jpeg' alt='Profile Picture'>" +
                "<strong class='namaUser'>" + data['name'] + "</strong>" +
                "<input type='hidden' id='idUser' value='" + data['akunId'] + "'>" +
                "</span></a>" +
                "</div>" +
                "<div class='right-content'>" +
                "<span>" +
                "<img id='logoPisang' src='" + srcImage + "' alt=''>" +
                "<strong id='ratingUser'>" + data['rating'] + "</strong>" +
                "</span>" +
                "<span>/5</span>" +
                "</div>" +
                "</div>" +
                "<div class='card-content'>" +
                "<p id='komenUser'>" + (data['komen'] || "") + "</p>" +
                "<div style='display: flex; justify-content: space-between'>" +
                "<p class='card-text'><small id='createdUser'>" + data['created'] + "</small></p>" +
                "<button type='button' class='btn btn-danger' id='deleteButton'>Delete</button>" +
                "<input type='hidden' value='" + data['id'] + "' id='idReview'>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>");
              $("#usercard").html(newElement);

            }
          });
        }
      }
    });

    $(document).on("click", "#akun", function () {
      window.location.href = "{{env('LINK_WEBSITE')}}user/profile/" + $(this).children("#idAkun").val();
    })
    $(".readmore-btn").on("click", function () {
      $(".readmore").toggleClass("truncate");
    });

    var myArray = "{{ $film->genre}}";
    var split = myArray.split(" ");
    split.forEach(function (word) {
      var button = $('<button/>', {
        text: word,
        class: 'genre',
        'data-href': '{{env('LINK_WEBSITE')}}user/films/' + word.toLowerCase(),
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
@endsection