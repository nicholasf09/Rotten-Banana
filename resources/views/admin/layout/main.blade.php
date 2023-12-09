<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- swiper js --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/1ded6ff2c1.js" crossorigin="anonymous"></script>

    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- CSS ANIMATE --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    <title>Rotten Banana | {{$title}}</title>
    @yield('style')
</head>
<style>
    body {
        margin: 0;
        padding: 0; 
    }

    .nav-pills .nav-item a {
        text-decoration: none;
        color: white;
    }

    .nav-pills .nav-item a:hover {
        color: black;
    }

    .btn {
        position: fixed;
        top: 10px;
        right: 10px;
        z-index: 1000;
        color: aliceblue;
    }
</style>

<body class="bg-dark" >
    <button class="btn btn-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar"
        aria-expanded="false" aria-controls="sidebar">
        <i class="bi-list"></i>
    </button>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div id="sidebar" class="col-auto col-xs-4 col-xl-3 px-sm-3 px-0 bg-secondary">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline"><img width="55"
                                src="{{asset('storage/uploads/assets/cool-banana.png')}}" alt="banana" class="m-0">
                            <strong>ROTTEN <span style="color:orange">BANANA</span></strong></span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">

                        <li class="nav-item">
                            <a href="{{route('admin.home')}}" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.storeFilm')}}" class="nav-link px-0"> <i
                                    class="fs-4 fa-regular fa-folder-open"></i> <span class="d-none d-sm-inline">Store</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Account</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link px-0 align-middle">
                              <i class="fs-4 fa-solid fa-rocket"></i> <span class="ms-1 d-none d-sm-inline">Go To User</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="col p-5 animate__animated animate__fadeInUp">
                @yield('content')
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div id="account" class="modal-content">
                <div class="header">
                    <i class="fa fa-bars"></i>
                    <i class="fa-solid fa-x" data-bs-dismiss="modal" aria-label="Close"></i>
                </div>
                <div class="middle">
                    <img src="https://th.bing.com/th?id=OIP.cn3LaokCXKhEkj8btLN9PAHaJ4&w=216&h=288&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2"
                        alt="" class="user-pic">
                    <h4 class="name">{{ auth()-> user()->name }}</h4>
                    <h4 class="work">{{ auth()-> user()->email }}</h4>
                </div>
                <button class="btn-follow">SEE DETAILS</button>
            </div>
        </div>
    </div>
    @yield('script')
</body>

</html>