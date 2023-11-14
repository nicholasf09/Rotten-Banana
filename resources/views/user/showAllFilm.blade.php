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
    .form{
        position: relative;
    }
    .search {
        position: absolute;
        z-index: 1;
        top: 10px;
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
    .title {
        color: white;
        transition: 0.5s ease-in-out;
    }
    .title:hover{
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

    #searchBar{
        width: 30%;
        margin-right: auto;
        margin-left: auto;
        border-radius: 3px;
        border: #fff solid 4px;
    }


</style>
@endsection

@section('content')

<div style="display: flex; justify-content: center; margin-top: 10px">
    <input type="text" id="searchBar" placeholder="Search Anything...">
</div>

<div style="display: flex; justify-content: center; margin-top: 10px">
    <div style="display: flex; justify-content: space-between; width: 30%">
        <input type="radio" class="btn-check" name="genreFilm" id="horror" autocomplete="off">
        <label class="btn btn-secondary" for="horror">Horror</label>

        <input type="radio" class="btn-check" name="genreFilm" id="action" autocomplete="off">
        <label class="btn btn-secondary" for="action">Action</label>

        <input type="radio" class="btn-check" name="genreFilm" id="anime" autocomplete="off">
        <label class="btn btn-secondary" for="anime">Anime</label>

        <input type="radio" class="btn-check" name="genreFilm" id="romance" autocomplete="off">
        <label class="btn btn-secondary" for="romance">Romance</label>

        <input type="radio" class="btn-check" name="genreFilm" id="comedy" autocomplete="off">
        <label class="btn btn-secondary" for="comedy">Comedy</label>

    </div>
</div>

@foreach ($films as $film)
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <a href="{{env('LINK_WEBSITE')}}user/film/{{$film->id}}">
                    <img src="https://m.media-amazon.com/images/M/MV5BODM5NDhkYzctZjQ5NS00YTFkLWJiODUtMGMwOTZhYzgyYWI1XkEyXkFqcGdeQXVyNjI4NDY5ODM@._V1_.jpg" class="rounded float-start" alt="{{$film->judul}}" style="width: 100%"></a>
            </div>
        </div>
    </div>
@endforeach


<script>
$(document).ready(function(){
    var genre ='';
    var search ='';
    var previousValue = '';

    $('input[type=radio][name=genreFilm]').click(function() {
        console.log(previousValue);
        if (previousValue == $(this).val()) {
            $(this).prop('checked', false);
            $(this).data('previousValue', null);
            genre = '';
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
                    $('ul').empty();
                    console.log(data);
                    $.each(data['data'], function (index, value) {
                        $('ul').append("<li><a href='{{env('LINK_WEBSITE')}}/user/film/" + value['id'] + "'>" + value['judul'] + "</a></li>");
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
                    $('ul').empty();
                    console.log(data);
                    $.each(data['data'], function (index, value) {
                        $('ul').append("<li><a href='{{env('LINK_WEBSITE')}}/user/film/" + value['id'] + "'>" + value['judul'] + "</a></li>");
                    });
                }
            });
        }
        previousValue = $(this).val();
    });

    $("#searchBar").on("input", function() {
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
            $('ul').empty();
            console.log(data);
            $.each(data['data'], function (index, value) {
                $('ul').append("<li><a href='{{env('LINK_WEBSITE')}}/user/film/'"+value['id']+">"+value['judul']+"</a></li>");
            });
        }
    });
    });

    
});

</script>


@endsection
