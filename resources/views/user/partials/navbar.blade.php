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
                    <a class="nav-link mx-2 text-uppercase text-white" href="#">MOVIES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase text-white" href="#">RANKING</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase text-white" href="#" data-bs-toggle="modal"
                        data-bs-target="#modalAccount">
                        <i class="fa-solid fa-circle-user me-1 "></i> Account
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


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
        height: 600px;
        background-color: #F7CA05;
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

    div.footer {
        position: relative;
        background: rgba(255, 255, 255, 1);
        top: 110px;
        height: 180px;
        text-align: center;
    }

    .btn-follow {
        position: relative;
        padding: 15px 70px;
        top: -22px;
        background: rgba(255, 255, 255, 1);
        border: none;
        border-radius: 20px;
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