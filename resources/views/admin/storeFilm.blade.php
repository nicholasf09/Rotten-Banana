@extends('admin.layout.main')
@section('content')

<style>
    .error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }

    .container {
        font-family: 'Times New Roman', Times, serif;
        color: white;
        background: #352437;
        background: linear-gradient(135deg, #352437, #F57E30);
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 0px;
    }

    .col {
        margin: 5vh 4vh;
    }

    input[type="text"],
    input[type="date"],
    textarea,
    input[type="file"] {
        color: white;
        border-radius: 20px;
        background-color: rgba(255, 255, 255, 0.2);
        width: 100%;
        border-top: 1px solid #ccc;
        border-left: 1px solid #ccc;
        border-right: 1px solid #eee;
        border-bottom: 1px solid #eee;
    }

    ::-webkit-scrollbar {
        display: none;
    }

    .heading {
        color: black;
        background-color: white;
        width: 100%;
        height: 4vh;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    label {
        font-family: 'Georgia', serif;
        font-weight: bold;
        font-size: 15px;
        text-transform: uppercase;
    }

    #submit {
        background: rgb(255, 151, 0);
        border: none;
        z-index: 1;
        position: relative;
        padding: 9px 18px;
        border-radius: 10px;
        width: 100px;
        margin-bottom: 20px
    }

    #submit:after {
        position: absolute;
        content: "";
        width: 100%;
        height: 0;
        top: 0;
        left: 0;
        z-index: -1;
        border-radius: 10px;
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
<div class="container">
    <div class="heading py-1 ps-2">
        <h5 style="font-weight:bold">STORE <span style="color:orange">Film</span></h5>
    </div>
    <div class="col-8">
        <form action="{{route('admin.createFilm')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="position: relative;">
                <label for="judul">Judul: </label>
                <br>
                <input type="text" id="judul" name="judul" value="{{old('judul')}}">
                @error('judul')
                <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
                @enderror
            </div>
            <br><br>

            <div style="position: relative;">
                <label for="sinopsis">Sinopsis: </label>
                <br>
                <textarea type="text" id="sinopsis" name="sinopsis" cols="100" rows="10">{{old('sinopsis')}}</textarea>
                @error('sinopsis')
                <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
                @enderror
            </div>
            <br><br>

            <div style="position: relative;">
                <label for="trailer">Trailer: </label>
                <br>
                <input type="text" id="trailer" name="trailer" value="{{old('trailer')}}">
                @error('trailer')
                <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
                @enderror
            </div>
            <br><br>

            <div style="position: relative;">
                <label for="tahun_rilis">Tanggal Rilis: </label>
                <br>
                <input type="date" id="tahun_rilis" name="tahun_rilis" value="{{old('tahun_rilis')}}">
                @error('tahun_rilis')
                <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
                @enderror
            </div>
            <br><br>

            <div style="position: relative;">
                <label for="durasi">Durasi: </label>
                <br>
                <input type="text" id="durasi" name="durasi" value="{{old('durasi')}}">
                @error('durasi')
                <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
                @enderror
            </div>
            <br><br>

            <div style="position: relative;">
                <label for="genre">Genre: </label>
                <br>
                <input type="text" id="genre" name="genre" value="{{old('genre')}}">
                @error('genre')
                <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
                @enderror
            </div>
            <br><br>

            <div style="position: relative;">
                <label for="pg">PG: </label>
                <br>
                <input type="text" id="pg" name="pg" value="{{old('pg')}}">
                @error('pg')
                <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
                @enderror
            </div>
            <br><br>

            <div style="position: relative;">
                <label for="director">Director: </label>
                <br>
                <input type="text" id="director" name="director" value="{{old('director')}}">
                @error('director')
                <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
                @enderror
            </div>
            <br><br>

            <div style="position: relative;">
                <label for="producer">Producer: </label>
                <br>
                <input type="text" id="producer" name="producer" value="{{old('producer')}}">
                @error('producer')
                <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
                @enderror
            </div>
            <br><br>

            <div style="position: relative;">
                <label for="distributor">Distributor: </label>
                <br>
                <input type="text" id="distributor" name="distributor" value="{{old('distributor')}}">
                @error('distributor')
                <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
                @enderror
            </div>
            <br><br>

            <div style="position: relative;">
                <label for="original_language">Original Language: </label>
                <br>
                <input type="text" id="original_language" name="original_language" value="{{old('origina_language')}}">
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

            <input type="submit">

        </form>
    </div>
</div>
@endsection