@extends('admin.layout.main')
@section('content')

<style>
    .error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }
</style>

<form action="{{route('admin.createFilm')}}" method="POST" enctype="multipart/form-data">
    @csrf  
 
    <div style="position: relative;">
        <label for="judul">Judul: </label>
        <br>
        <input type="text" id="judul" name="judul">
        @error('judul')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>  
    <br><br>

    <div style="position: relative;">
        <label for="sinopsis">Sinopsis: </label>
        <br>
        <textarea type="text" id="sinopsis" name="sinopsis" cols="100" rows="10"></textarea>
        @error('tahun_rilis')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>  
    <br><br>

    <div style="position: relative;">
        <label for="trailer">Trailer: </label>
        <br>
        <input type="text" id="trailer" name="trailer">
        @error('trailer')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>  
    <br><br>

    <div style="position: relative;">
        <label for="tahun_rilis">Tanggal Rilis: </label>
        <br>
        <input type="date" id="tahun_rilis" name="tahun_rilis">
        @error('tahun_rilis')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>  
    <br><br>

    <div style="position: relative;">
        <label for="durasi">Durasi: </label>
        <br>
        <input type="text" id="durasi" name="durasi">
        @error('durasi')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>  
    <br><br>

    <div style="position: relative;">
        <label for="genre">Genre: </label>
        <br>
        <input type="text" id="genre" name="genre">
        @error('genre')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>  
    <br><br>

    <div style="position: relative;">
        <label for="image">Image: </label>
        <br>
        <input type="file" id="image" name="image" accept="image/*">
        @error('image')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>
    <br><br>

    <input type="submit">

</form>
@endsection