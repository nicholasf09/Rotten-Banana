@extends('admin.layout.main')
@section('content')
    <form action="{{route('admin.createFilm')}}" method="POST" enctype="multipart/form-data">
        @csrf  
        <label for="judul">Judul: </label>
        <input type="text" id="judul" name="judul">
        <br><br>
        <label for="sinopsis">Sinopsis: </label>
        <input type="text" id="sinopsis" name="sinopsis">
        <br><br>
        <label for="trailer">Trailer: </label>
        <input type="text" id="trailer" name="trailer">
        <br><br>
        <label for="tahun_rilis">Tanggal Rilis: </label>
        <input type="date" id="tahun_rilis" name="tahun_rilis">
        <br><br>
        <label for="durasi">Durasi: </label>
        <input type="text" id="durasi" name="durasi">
        <br><br>
        <label for="genre">Genre: </label>
        <input type="text" id="genre" name="genre">
        <br><br>
        <label for="image">Image: </label>
        <input type="file" id="image" name="image" accept="image/*">

        <br><br>

        <input type="submit">

    </form>
@endsection