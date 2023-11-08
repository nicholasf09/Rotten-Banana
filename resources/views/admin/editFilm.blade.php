@extends('admin.layout.main')
@section('content')
    <form action="{{route('admin.updateFilm')}}" method="POST" enctype="multipart/form-data">
        @csrf  
        <label for="judul">Judul: </label>
        <input type="text" id="judul" name="judul" value="{{$film['judul']}}">
        <br><br>
        <label for="sinopsis">Sinopsis: </label>
        <input type="text" id="sinopsis" name="sinopsis" value="{{$film['sinopsis']}}">
        <br><br>
        <label for="trailer">Trailer: </label>
        <input type="text" id="trailer" name="trailer" value="{{$film['trailer']}}">
        <br><br>
        <label for="tahun_rilis">Tanggal Rilis: </label>
        <input type="date" id="tahun_rilis" name="tahun_rilis" value="{{$film['tahun_rilis']}}">
        <br><br>
        <label for="durasi">Durasi: </label>
        <input type="text" id="durasi" name="durasi" value="{{$film['durasi']}}">
        <br><br>
        <label for="genre">Genre: </label>
        <input type="text" id="genre" name="genre" value="{{$film['genre']}}">
        <br><br>
        <label for="image">Image: </label>
        <input type="file" id="image" name="image" accept="image/*">
        <input type="hidden" name="id" value="{{$film['id']}}">
        <input type="hidden" name="path_image" value="{{$film['path_image']}}">
        <br><br>

        <input type="submit">

    </form>
@endsection