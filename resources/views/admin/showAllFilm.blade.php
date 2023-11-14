@extends('admin.layout.main')
@section('content')

<style>
    #myTable{
        width: 75%;
        height: 90vh;
    }

    .body{
        overflow-x: hidden
    }
</style>

<table id="myTable">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Sinopsis</th>
            <th>Link Trailer</th>
            <th>Tahun Rilis</th>
            <th>Durasi</th>
            <th>Genre</th>
            <th>Image</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>


{{-- <img src="{{asset('storage/uploads/films/1699449875ERDno3.png')}}" alt=""> --}}




<script>
    $(document).ready( function () {

        var film = {!! json_encode($films) !!}

        console.log(film);

        console.log('test');

        $('#myTable').DataTable({
            data: film,
            columns: [
                {data: 'judul'},
                {data: 'sinopsis'},
                {data: 'trailer',
                    render: function (data, type, row) {
                        return '<a href="'+data+'" target="_blank">Watch Trailer</a>';
                    }
                },
                {data: 'tahun_rilis'},
                {data: 'durasi'},
                {data: 'genre'},
                {data: 'path_image',
                    render: function (data, type, row) {
                        return "<button class=showImage>Show Image</button>"
                        // return "storage/app/public/uploads/films"+data;
                    }
                },
                {data: 'edit',
                    render: function (data, type, row) {
                        return "<button class=editFilm>Edit</button>"
                    }
                },
            ]
        });

        $(document).on('click', '.showImage', function(){
            var data = $('#myTable').DataTable().row($(this).parents('tr')).data();
            console.log(data);
            var image = data.path_image;
            console.log(image);
            var url = "{{asset('storage/')}}/"+image;
            console.log(url);
            window.open(url, '_blank');
        });

        $(document).on('click', '.editFilm', function(){
            var data = $('#myTable').DataTable().row($(this).parents('tr')).data();
            console.log(data);
            var id = data.id;
            console.log(id);
            window.location.href = "http://127.0.0.1:8000/admin/films/edit/"+data.id;
        });
    });
</script>
@endsection