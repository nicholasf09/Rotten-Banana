@extends('admin.layout.main')
@section('style')
<style>
    * {
        font-family: 'poppins', sans-serif;
        margin: 0;
        padding: 0;
    }


    .form {
        position: relative;
    }

    .search {
        position: absolute;
        z-index: 1;
        top: 10px;
        left: 17px;
        color: #9ca3af;
    }

    .form-input {
        padding-left: 45px;
    }

    .form-input:focus {
        box-shadow: none;
    }

    ::placeholder {
        color: gray !important;
    }

    .bg-navbar-dark {
        background-color: #121212;
    }

    .title {
        color: white;
        transition: 0.5s ease-in-out;
    }

    .title:hover {
        color: #CF0102;
    }


    #searchBar {
        width: 30%;
        margin-right: auto;
        margin-left: auto;
        border-radius: 3px;
        border: #fff solid 4px;
    }

    #posterFilm {
        text-decoration: none;
        color: #fff;
    }

    #logoPisang {
        width: 30px;
        height: 30px;
        object-fit: cover;
        display: inline
    }

    .heading {
        color: black;
        background-color: white;
        width: 100%;
        height: 4vh;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }


    .container {
        font-family: 'Times New Roman', Times, serif;
        color: white;
        background: #352437;
        background: linear-gradient(135deg, #352437, #F57E30);
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 0px;
    }

    .col {
        margin: 5vh 4vh;
    }
    .circle{
        border-radius:50%;
        height: 100%;
        background-color:white;
    }
</style>
@endsection

@section('content')

<div class="container d-flex justify-content-center align-item-center">
    <div class="row d-flex w-100">
        <div class="col-3" style="height:200px;">
            <div class="heading py-1 ps-2">
                <div class="circle justify-content-center text-center">
                <h5 style="font-weight:bold">ALL <span style="color:orange">Film</span></h5>
                <p>Isi</p>
                </div>
            </div>
        </div>
        <div class="col-3" style="height:200px;">
            <div class="heading py-1 ps-2">
                <div class="circle justify-content-center text-center">
                <h5 style="font-weight:bold">ALL <span style="color:orange">Film</span></h5>
                <p>Isi</p>
                </div>
            </div>
        </div>
        <div class="col-3" style="height:200px;">
            <div class="heading py-1 ps-2">
                <div class="circle justify-content-center text-center">
                <h5 style="font-weight:bold">ALL <span style="color:orange">Film</span></h5>
                <p>Isi</p>
                </div>
            </div>
        </div>
        <div class="col-3" style="height:200px;">
            <div class="heading py-1 ps-2">
                <div class="circle justify-content-center text-center">
                <h5 style="font-weight:bold">ALL <span style="color:orange">Film</span></h5>
                <p>Isi</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>


@endsection