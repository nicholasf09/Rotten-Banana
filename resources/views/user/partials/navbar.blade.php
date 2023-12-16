<nav class="navbar navbar-expand-lg bg-navbar-dark bg-opacity-75 fixed-top navbar-light shadow-sm">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <a class="navbar-brand text-white" href="#">
                <img width="80" src="{{asset('storage/uploads/assets/cool-banana.png')}}" alt="banana" />
                <strong>ROTTEN BANANA</strong>
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <!-- Items on the far right -->
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase text-white" href="{{route('user.showAllFilm')}}">MOVIES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase text-white" href="{{route('user.home')}}#ranking">RANKING</a>
                </li>
                <li class="nav-item" >
                    <a href="#" class="nav-link text-uppercase text-white" data-bs-toggle="modal"
                        data-bs-target="#modalAccount">
                        <i class="fa-solid fa-circle-user me-1 "></i> Account
                    </a>
                </li>
                <li class="nav-item" style="margin-left: 5px">
                    <!-- Tautan logout -->
                    <a class="nav-link text-uppercase text-white" id="logout" onclick="document.getElementById('logout-form').submit();">
                        <svg style="display: inline;" xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#ffffff" d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                        Log Out
                    </a>
                    <!-- Form untuk logout -->
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Modal -->
<div class="modal fade" id="modalAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div id="account" class="modal-content">
            <div class="header">
                <i class="fa-solid fa-x" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="middle mt-5">
                <img src="https://th.bing.com/th?id=OIP.cn3LaokCXKhEkj8btLN9PAHaJ4&w=216&h=288&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2"
                    alt="" class="user-pic">
                <h4 class="name">{{ auth()-> user()->name }}</h4>
                <h4 class="work">{{ auth()-> user()->email }}</h4>
            </div>
            <div class="justify-content-center d-flex">
                <a class="btn-follow" style="text-decoration: none; text-align: center" href="{{route('user.profile',['user' => auth()->user()->id])}}" >SEE DETAILS</a>
            </div>
        </div>
    </div>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
    }
    .bg-cover {
        position: fixed;
        width: 100%;
        height: 100%;
    }
    #account {
        width: 400px;
        height: 400px;
        background-color: #121212;
        margin: 50px auto;
        border-radius: 12px;
        overflow: hidden;
    }
    .header i {
        font-size: 20px;
        color: rgba(255, 255, 255, 0.7);
        padding: 10px;
        margin-top: 20px;
    }
    .fa-bars {
        float: left;
        margin-left: 20px;
    }
    .fa-bars:hover {
        cursor: pointer;
        animation: bars 0.3s ease-in forwards;
    }
    .fa-x {
        float: right;
        margin-right: 20px;
    }
    .fa-x:hover {
        cursor: pointer;
    }
    div.middle {
        text-align: center;
    }

    img.user-pic {
        width: 110px;
        height: 110px;
        border-radius: 100%;
        background: rgba(255, 255, 255, 0.7);
        border: 5px solid rgba(255, 255, 255, 1);
    }

    h4.name {
        font-size: 18px;
        color: rgba(255, 255, 255, 0.8);
        padding: 10px;
    }

    h4.work {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.5);
        padding: 10px;
        padding-top: 0px;
    }

    h4.social {
        font-size: 15px;
        color: rgba(255, 255, 255, 0.5);
        padding: 15px;
    }

    .btn-follow {
        padding: 10px 10px;
        width: 50%;
        background-color: rgba(39, 40, 41, 0.3);
        border: none;
        letter-spacing: 1px;
        color: white;
        border-radius: 3%;
        border: 1px solid transparent;
    }

    .btn-follow:hover {
        cursor: pointer;
        border: 1px solid rgba(39, 40, 41, 0.2);
        background: rgba(39, 40, 41, 0.5);
        color: rgba(255, 255, 255, 1);
    }

    .fa-lock {
        font-size: 20px;
        color: rgba(0, 0, 0, 0.2);
        padding-top: 15px;
    }

    .profile-status {
        font-size: 12px;
        color: rgba(0, 0, 0, 0.2);
        padding-top: 7px;
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(180deg);
        }
    }

    @keyframes bars {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(90deg);
        }
    }

    @keyframes img3d {
        0% {
            transform: rotateY(0deg);
        }

        100% {
            transform: rotateY(55deg);
        }
    }
</style>