@extends('admin.layout.main')
@section('content')

<style>
    .error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }
</style>

<form action="{{route('admin.updateFilm')}}" method="POST" enctype="multipart/form-data">
    @csrf  
 
    <div style="position: relative;">
        <label for="judul">Judul: </label>
        <br>
        <input type="text" id="judul" name="judul" value="{{$film->judul}}">
        @error('judul')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>  
    <br><br>

    <div style="position: relative;">
        <label for="sinopsis">Sinopsis: </label>
        <br>
        <textarea type="text" id="sinopsis" name="sinopsis" cols="100" rows="10">{{$film->sinopsis}}</textarea>
        @error('tahun_rilis')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>  
    <br><br>

    <div style="position: relative;">
        <label for="trailer">Trailer: </label>
        <br>
        <input type="text" id="trailer" name="trailer" value="{{$film->trailer}}">
        @error('trailer')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>  
    <br><br>

    <div style="position: relative;">
        <label for="tahun_rilis">Tanggal Rilis: </label>
        <br>
        <input type="date" id="tahun_rilis" name="tahun_rilis" value="{{$film->tahun_rilis}}">
        @error('tahun_rilis')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>  
    <br><br>

    <div style="position: relative;">
        <label for="durasi">Durasi: </label>
        <br>
        <input type="text" id="durasi" name="durasi" value="{{$film->durasi}}">
        @error('durasi')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>  
    <br><br>

    <div style="position: relative;">
        <label for="genre">Genre: </label>
        <br>
        <input type="text" id="genre" name="genre" value="{{$film->genre}}">
        @error('genre')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>  
    <br><br>

    <div style="position: relative;">
        <label for="pg">PG: </label>
        <br>
        <input type="text" id="pg" name="pg" value="{{$film->pg}}">
        @error('pg')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>  
    <br><br>

    <div style="position: relative;">
        <label for="director">Director: </label>
        <br>
        <input type="text" id="director" name="director" value="{{$film->director}}">
        @error('director')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>  
    <br><br>

    <div style="position: relative;">
        <label for="producer">Producer: </label>
        <br>
        <input type="text" id="producer" name="producer" value="{{$film->producer}}">
        @error('producer')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>  
    <br><br>

    <div style="position: relative;">
        <label for="distributor">Distributor: </label>
        <br>
        <input type="text" id="distributor" name="distributor" value="{{$film->distributor}}">
        @error('distributor')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>  
    <br><br>

    <div style="position: relative;">
        <label for="original_language">Original Language: </label>
        <br>
        <input type="text" id="original_language" name="original_language" value="{{$film->original_language}}">
        @error('director')
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

    <input type="hidden" name="id" value="{{$film->id}}">
    
    <input type="submit">

</form>
@endsection