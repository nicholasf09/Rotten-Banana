@extends('admin.layout.main')
@section('content')

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

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

    ::-webkit-scrollbar {
        display: none;
    }

    .container {
        margin: 10px;
        padding: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        color: white;
    }

    #myTable {
        margin: 10px;
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
        border-radius: 20px;
        overflow-x: auto;
        width: 100%;
    }

    #myTable th {
        background-color: aliceblue;
        color: black;
        text-align: left;
        padding: 8px;
    }

    #myTable th,
    #myTable td {
        border-bottom: 2px solid grey;
        padding: 8px;
        text-align: left;
        flex: 1;
        max-width: 100%;
    }

    .col-8 {
        width: 100%;
        max-width: 100%;
        margin: 0 auto;
    }

    .tableTopLeft {
        border-top-left-radius: 20px;
    }

    .tableTopRight {
        border-top-right-radius: 20px;
    }
</style>
<div class="container">
    <div class="col-8">
        <table id="myTable">
            <thead>
                <tr>
                    <th class="tableTopLeft">Judul</th>
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
                    <th class="tableTopRight">Edit</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>


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