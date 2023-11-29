<nav class="navbar navbar-expand-lg bg-navbar-dark bg-opacity-75 fixed-top navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand text-white" href="#"><img width="36" src="https://img.icons8.com/cotton/64/banana.png"
                alt="banana"/>  <strong>ROTTEN BANANA</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
            <div class="input-group">
                <i class="bi bi-search search text-dark"></i>
                <input type="text" class="form-control rounded-5 form-input border-light color-dark"
                    placeholder="Search...">
            </div>
        </div> --}}
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <div class="ms-auto d-none d-sm-block">
                {{-- <div class="form">
                    <i class="bi bi-search search text-dark"></i>
                    <input type="text" class="form-control rounded-5 form-input border-light color-dark"
                        placeholder="Search...">
                </div> --}}
            </div>
            <ul class="navbar-nav ms-auto ">
                <!-- <li class="nav-item">
            <a class="nav-link mx-2 text-uppercase active text-white" aria-current="page" href="#">HOME</a>
            </li> -->
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase text-white" href="#">MOVIES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase text-white" href="#">RANKING</a>
                </li>
                <!-- <li class="nav-item">
            <a class="nav-link mx-2 text-uppercase text-white" href="#">CONTACT US</a>
            </li> -->
                {{--
            </ul>
            <ul class="navbar-nav ms-auto"> --}}
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase text-white" href="#" data-bs-toggle="modal"
                        data-bs-target="#modalAccount"><i class="fa-solid fa-circle-user me-1 "></i> Profile</a>
                </li>
            </ul>
        </div>
    </div>


</nav>

<!-- Button trigger modal -->

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

<style>
    * {
        margin: 0;
        padding: 0;
    }

    .bg-cover {
        position: fixed;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 255, 0.2);
        z-index: -1;
    }

    #account {
        width: 400px;
        height: 400px;
        background-color: #272829;
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
        position: relative;
        text-align: center;
        top: 70px;
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
        position: absolute;
        bottom: 0%;
        padding: 10% 100%;
        background-color: #272829;
        border: none;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #f9690E;
        box-shadow: 0px 5px 45px rgba(249, 105, 14, 0.4);
        border: 1px solid transparent;
        transition: all 0.5s ease-in;
    }

    .btn-follow:hover {
        cursor: pointer;
        border: 1px solid rgba(255, 255, 255, 0.2);
        background: #f9690E;
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