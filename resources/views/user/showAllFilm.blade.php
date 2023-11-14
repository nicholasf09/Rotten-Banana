@extends('user.layout.main')
@section('content')

<input type="text" id="searchBar">

<input type="radio" value="Horror" name="genreFilm" id="horror">
<label>Horror</label>
<input type="radio" value="Romance" name="genreFilm" id="romance"> 
<label>Romance</label>
<input type="radio" value="Action" name="genreFilm" id="action">
<label>Action</label>
<ul>
    @foreach ($films as $film)
        <li><a href="http://127.0.0.1:8000/user/film/{{$film->id}}">{{$film->judul}}</a></li>
    @endforeach
</ul>


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
                        $('ul').append("<li><a href='http://127.0.0.1:8000/user/film/" + value['id'] + "'>" + value['judul'] + "</a></li>");
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
                        $('ul').append("<li><a href='http://127.0.0.1:8000/user/film/" + value['id'] + "'>" + value['judul'] + "</a></li>");
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
                $('ul').append("<li><a href='http://127.0.0.1:8000/user/film/'"+value['id']+">"+value['judul']+"</a></li>");
            });
        }
    });
    });

    
});

</script>


@endsection
