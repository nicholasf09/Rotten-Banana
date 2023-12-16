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
        border-radius: 20px;
        width: 100%;
        margin: 20px 0px;
    }

    thead {


        color: black;
        background-color: white;
    }

    thead #topLeft {
        border-top-left-radius: 20px;
    }

    thead #topRight {
        border-top-right-radius: 20px;
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