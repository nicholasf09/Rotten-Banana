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

    .swiper {
        width: 100%;
        height: 43vh;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 15px;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 15px;
    }

    .swiper-wrapper {
        display: flex;
        overflow-x: scroll;
        -webkit-overflow-scrolling: touch;
        scroll-snap-type: x mandatory;
    }

    #searchBar {
        width: 30%;
        margin-right: auto;
        margin-left: auto;
        border-radius: 3px;
        border: #fff solid 4px;
    }

    #posterFilm {
        text-decoration: none;
        color: #fff;
    }

    #logoPisang {
        width: 30px;
        height: 30px;
        object-fit: cover;
        display: inline
    }
</style>
@endsection

@section('content')

<div style="display: flex; justify-content: center; margin-top: 100px">
    <input class="w-50" type="text" id="searchBar" placeholder="Search Anything...">
</div>

<div class="mx-5">
    <div class="my-5 gap-2" style="display: flex; flex-wrap: wrap; justify-content: center;">
        <input type="radio" class="btn-check" name="genreFilm" id="horror" autocomplete="off" value="horror">
        <label class="btn btn-secondary" for="horror">Horror</label>

        <input type="radio" class="btn-check" name="genreFilm" id="action" autocomplete="off" value="Action">
        <label class="btn btn-secondary" for="action">Action</label>

        <input type="radio" class="btn-check" name="genreFilm" id="anime" autocomplete="off" value="Anime">
        <label class="btn btn-secondary" for="anime">Anime</label>

        <input type="radio" class="btn-check" name="genreFilm" id="romance" autocomplete="off" value="Romance">
        <label class="btn btn-secondary" for="romance">Romance</label>

        <input type="radio" class="btn-check" name="genreFilm" id="comedy" autocomplete="off" value="Comedy">
        <label class="btn btn-secondary" for="comedy">Comedy</label>

        <input type="radio" class="btn-check" name="genreFilm" id="kdrama" autocomplete="off" value="Kdrama">
        <label class="btn btn-secondary" for="kdrama">K-Drama</label>

    </div>
</div>

<div class="container-fluid w-100">
    <div class="row w-100" id="posterContainer">
        @foreach ($films as $film)
        <div class="col-6 col-md-4 col-lg-2 py-5">
            <a href="{{env('LINK_WEBSITE')}}user/filmMain/{{$film->id}}" id="posterFilm">
                <div>
                    <img src="{{asset('storage/')}}/{{$film->path_image}}" class="rounded float-start"
                        alt="{{$film->judul}}" style="width: 100%; height: 320px; object-fit: cover;">
                    <h5 style="text-align: center;">{{$film->judul}}</h5>
                    <div style="display: flex; justify-content: space-between">
                        <div style="display: flex; justify-content: space-evenly; width: 50%">
                            <img id="logoPisang" src="{{ asset('storage/uploads/assets/pisang_kuning.png') }}" alt="">
                            <p>{{$film->avgRating}}</p>
                        </div>
                        <div style="display: flex; justify-content: space-evenly; width: 50%">
                            <img id="logoPisang" src="{{ asset('storage/uploads/assets/like.png')}}" alt="">
                            <p>{{$film->like}}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2 py-5">
            <a href="{{env('LINK_WEBSITE')}}user/filmMain/{{$film->id}}" id="posterFilm">
                <div>
                    <img src="{{asset('storage/')}}/{{$film->path_image}}" class="rounded float-start"
                        alt="{{$film->judul}}" style="width: 100%; height: 320px; object-fit: cover;">
                    <h5 style="text-align: center;">{{$film->judul}}</h5>
                    <div style="display: flex; justify-content: space-between">
                        <div style="display: flex; justify-content: space-evenly; width: 50%">
                            <img id="logoPisang" src="{{ asset('storage/uploads/assets/pisang_kuning.png') }}" alt="">
                            <p>{{$film->avgRating}}</p>
                        </div>
                        <div style="display: flex; justify-content: space-evenly; width: 50%">
                            <img id="logoPisang" src="{{ asset('storage/uploads/assets/like.png')}}" alt="">
                            <p>{{$film->like}}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2 py-5">
            <a href="{{env('LINK_WEBSITE')}}user/filmMain/{{$film->id}}" id="posterFilm">
                <div>
                    <img src="{{asset('storage/')}}/{{$film->path_image}}" class="rounded float-start"
                        alt="{{$film->judul}}" style="width: 100%; height: 320px; object-fit: cover;">
                    <h5 style="text-align: center;">{{$film->judul}}</h5>
                    <div style="display: flex; justify-content: space-between">
                        <div style="display: flex; justify-content: space-evenly; width: 50%">
                            <img id="logoPisang" src="{{ asset('storage/uploads/assets/pisang_kuning.png') }}" alt="">
                            <p>{{$film->avgRating}}</p>
                        </div>
                        <div style="display: flex; justify-content: space-evenly; width: 50%">
                            <img id="logoPisang" src="{{ asset('storage/uploads/assets/like.png')}}" alt="">
                            <p>{{$film->like}}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2 py-5">
            <a href="{{env('LINK_WEBSITE')}}user/filmMain/{{$film->id}}" id="posterFilm">
                <div>
                    <img src="{{asset('storage/')}}/{{$film->path_image}}" class="rounded float-start"
                        alt="{{$film->judul}}" style="width: 100%; height: 320px; object-fit: cover;">
                    <h5 style="text-align: center;">{{$film->judul}}</h5>
                    <div style="display: flex; justify-content: space-between">
                        <div style="display: flex; justify-content: space-evenly; width: 50%">
                            <img id="logoPisang" src="{{ asset('storage/uploads/assets/pisang_kuning.png') }}" alt="">
                            <p>{{$film->avgRating}}</p>
                        </div>
                        <div style="display: flex; justify-content: space-evenly; width: 50%">
                            <img id="logoPisang" src="{{ asset('storage/uploads/assets/like.png')}}" alt="">
                            <p>{{$film->like}}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>


<script>
    $(document).ready(function () {
        var genre = '';
        var search = '';
        var previousValue = '';

        $('input[type=radio][name=genreFilm]').click(function () {
            if (previousValue == $(this).val()) {
                $(this).prop('checked', false);
                genre = '';
                previousValue = '';
                $.ajax({
                    url: "{{ route('user.getAllFilm') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        genre: genre,
                        search: search
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $('#posterContainer').empty();
                        console.log(data);
                        $.each(data['data'], function (index, value) {
                            $('#posterContainer').append("<div class='col-2'>" +
                                "<a href='{{env('LINK_WEBSITE')}}user/filmMain/" + value['id'] + "' id='posterFilm'>" +
                                "<div>" +
                                "<img src='{{asset('storage/')}}/" + value['path_image'] + "' class='rounded float-start' alt='{{$film->judul}}' style='width: 100%; height: 320px; object-fit: cover;'>" +
                                "<h5 style='text-align: center;'>" + value['judul'] + "</h5>" +
                                "<div style='display: flex; justify-content: space-between'>" +
                                "<div style='display: flex; justify-content: space-evenly; width: 50%''>" +
                                "<img id='logoPisang' src='{{ asset('storage/uploads/assets/pisang_kuning.png') }}' alt=''>" +
                                "<p>" + value['avgRating'] + "</p>" +
                                "</div>" +
                                "<div style='display: flex; justify-content: space-evenly; width: 50%'>" +
                                "<img id='logoPisang' src='{{ asset('storage/uploads/assets/like.png')}}' alt=''>" +
                                "<p>" + value['like'] + "</p>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</a>" +
                                "</div>");
                        });
                    }
                });
            } else {
                genre = $(this).val();
                $.ajax({
                    url: "{{ route('user.getAllFilm') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        genre: genre,
                        search: search
                    },
                    dataType: 'json',
                    success: function (data) {
                        $('#posterContainer').empty();
                        console.log(data);
                        $.each(data['data'], function (index, value) {
                            $('#posterContainer').append("<div class='col-2'>" +
                                "<a href='{{env('LINK_WEBSITE')}}user/filmMain/" + value['id'] + "' id='posterFilm'>" +
                                "<div>" +
                                "<img src='{{asset('storage/')}}/" + value['path_image'] + "' class='rounded float-start' alt='{{$film->judul}}' style='width: 100%; height: 320px; object-fit: cover;'>" +
                                "<h5 style='text-align: center;'>" + value['judul'] + "</h5>" +
                                "<div style='display: flex; justify-content: space-between'>" +
                                "<div style='display: flex; justify-content: space-evenly; width: 50%''>" +
                                "<img id='logoPisang' src='{{ asset('storage/uploads/assets/pisang_kuning.png')}}' alt=''>" +
                                "<p>" + value['avgRating'] + "</p>" +
                                "</div>" +
                                "<div style='display: flex; justify-content: space-evenly; width: 50%'>" +
                                "<img id='logoPisang' src='{{ asset('storage/uploads/assets/like.png')}}' alt=''>" +
                                "<p>" + value['like'] + "</p>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</a>" +
                                "</div>");
                        });
                    }
                });
                previousValue = genre;
            }
        });

        $("#searchBar").on("input", function () {
            search = $(this).val().toLowerCase();

            $.ajax({
                url: "{{route('user.getAllFilm')}}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    search: search,
                    genre: genre
                },
                dataType: 'json',
                success: function (data) {
                    $('#posterContainer').empty();
                    console.log(data);
                    $.each(data['data'], function (index, value) {
                        $('#posterContainer').append("<div class='col-2'>" +
                            "<a href='{{env('LINK_WEBSITE')}}user/filmMain/" + value['id'] + "' id='posterFilm'>" +
                            "<div>" +
                            "<img src='{{asset('storage/')}}/" + value['path_image'] + "' class='rounded float-start' alt='{{$film->judul}}' style='width: 100%; height: 320px; object-fit: cover;'>" +
                            "<h5 style='text-align: center;'>" + value['judul'] + "</h5>" +
                            "<div style='display: flex; justify-content: space-between'>" +
                            "<div style='display: flex; justify-content: space-evenly; width: 50%''>" +
                            "<img id='logoPisang' src='{{ asset('storage/uploads/assets/pisang_kuning.png') }}' alt=''>" +
                            "<p>" + value['avgRating'] + "</p>" +
                            "</div>" +
                            "<div style='display: flex; justify-content: space-evenly; width: 50%'>" +
                            "<img id='logoPisang' src='{{ asset('storage/uploads/assets/like.png')}}' alt=''>" +
                            "<p>" + value['like'] + "</p>" +
                            "</div>" +
                            "</div>" +
                            "</div>" +
                            "</a>" +
                            "</div>");
                    });
                }
            });
        });

        $('#posterFilm').click(function () {
            $("#searchBar").val('');
            $('input[type=radio][name=genreFilm]').prop('checked', false);
        });
        document.getElementById('{{ $button }}').click();
    });
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
                slidesPerView: 1,
                spaceBetween: 10,
            },
        },
    });
</script>


@endsection