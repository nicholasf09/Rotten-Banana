@extends('admin.layout.main')
@section('style')
<style>
    a {
        color: white;
        cursor: pointer;
    }

    input,
    select {
        margin-left: 5px;
        color: white;
        border-radius: 5px;
        background-color: rgba(255, 255, 255, 0.2);
        border-top: 1px solid #ccc;
        border-left: 1px solid #ccc;
        border-right: 1px solid #eee;
        border-bottom: 1px solid #eee;
    }

    label {
        color: white;
    }

    ::-webkit-scrollbar {
        display: none;
    }

    #myTable {
        font-family: 'Times New Roman', Times, serif;
        color: white;
        background: #352437;
        background: linear-gradient(135deg, #352437, #F57E30);
        text-align: left;
        border-radius: 2px;
        width: 100%;
        margin: 20px 0px;
    }

    thead {


        color: black;
        background-color: white;
    }

    thead #topLeft {
        border-top-left-radius: 2px;
    }

    thead #topRight {
        border-top-right-radius: 2px;
    }

    .card {
        width: 100%;
        color: white;
        background: linear-gradient(135deg, #352437, #F57E30);
        border-radius: 15px;
        padding: 30px;
    }

    .card-title {
        font-weight: 900;
        font-size: 140%;
    }

    .card-text {
        margin-bottom: 0px;
        font-size: 120%;
        text-transform: capitalize;
    }

    .card-col {
        margin-top: 10px;
        margin-right: -10px;
        margin-bottom: 10px;
    }
</style>
@endsection

@section('content')
<div class="card text-center">
    <div class="row">
        <div class="col-md-3 col-lg-3 col-6 card-col">
            <h5 class="card-title">Total Film</h5>
            <p class="card-text" id="totFilm">film</p>
        </div>
        <div class="col-md-3 col-lg-3 col-6 card-col">
            <h5 class="card-title">Total User</h5>
            <p class="card-text" id="totUser">user</p>
        </div>
        <div class="col-md-3 col-lg-3 col-6 card-col">
            <h5 class="card-title">Total Rating Done</h5>
            <p class="card-text" id="totRating">rating</p>
        </div>
        <div class="col-md-3 col-lg-3 col-6 card-col">
            <h5 class="card-title">Total Like Done</h5>
            <p class="card-text" id="totLike">like</p>
        </div>

    </div>
</div>
    <!-- Tautan logout -->
    <a class="nav-link text-uppercase" id="logout" onclick="document.getElementById('logout-form').submit();">
        <div style="background: black">
            <svg style="margin-left: 12px; display: inline;" xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#ffffff" d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
        </div>
        Log Out
    </a>

    <!-- Form untuk logout -->
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <table id="myTable">
        <thead>
            <tr>
                <th id="topLeft">Judul</th>
                <th>Sinopsis</th>
                <th>Link Trailer</th>
                <th>Tahun Rilis</th>
                <th>Durasi</th>
                <th>Genre</th>
                <th>PG</th>
                <th>Director</th>
                <th>Producer</th>
                <th>Distributor</th>
                <th>Original Language</th>
                <th>Image</th>
                <th id="topRight">Edit</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>




{{-- <img src="{{asset('storage/uploads/films/1699449875ERDno3.png')}}" alt=""> --}}




<script>
    $(document).ready(function () {
        var film = {!! json_encode($films)!!};

    $('#myTable').DataTable({
        data: film,
        columns: [
            { data: 'judul' },
            {
                data: 'sinopsis',
                render: function (data, type, row) {
                    var maxChars = 28;
                    if (data.length > maxChars) {
                        var truncatedText = data.substring(0, maxChars) + '...';
                        return truncatedText + ' <a href="#" class="readMore">Read More</a>';
                    } else {
                        return data;
                    }
                }
            },
            {
                data: 'trailer',
                render: function (data, type, row) {
                    return '<a href="' + data + '" target="_blank">Watch Trailer</a>';
                }
            },
            { data: 'tahun_rilis' },
            { data: 'durasi' },
            { data: 'genre' },
            { data: 'pg' },
            { data: 'director' },
            { data: 'producer' },
            { data: 'distributor' },
            { data: 'original_language' },
            {
                data: 'path_image',
                render: function (data, type, row) {
                    return "<a src='#' class=showImage>Show Image</a>";
                }
            },
            {
                data: 'edit',
                render: function (data, type, row) {
                    return "<a src='#' class=editFilm>Edit</a>";
                }
            },
        ]

    });

    $(document).on('click', '.readMore', function () {
        var data = $('#myTable').DataTable().row($(this).parents('tr')).data();
        alert(data.judul + " Sinopsis: \n" + data.sinopsis);
    });

    $(document).on('click', '.showImage', function () {
        var data = $('#myTable').DataTable().row($(this).parents('tr')).data();
        var image = data.path_image;
        var url = "{{asset('storage/')}}/" + image;
        window.open(url, '_blank');
    });

    $(document).on('click', '.editFilm', function () {
        var data = $('#myTable').DataTable().row($(this).parents('tr')).data();
        var id = data.id;
        window.location.href = "{{env('LINK_WEBSITE')}}admin/films/edit/" + data.id;
    });
});

</script>

@endsection