<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COEX</title>
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <div class="admin">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png"
                            width="40px" height="40px" alt=""><br>
                        <span class="fs-5 d-none d-sm-inline">Admin</span>
                    </div>
                    <br>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="{{ route('welcome') }}" class="nav-link align-middle px-0 text-white">
                                <i class="fas fa-home"></i> <span class="ms-1 d-none d-sm-inline"> Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cliente.index') }}" class="nav-link align-middle px-0 text-white">
                                <i class="fas fa-user-tie"></i><span class="ms-1 d-none d-sm-inline"> Clientes</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('credito.index') }}" class="nav-link px-0 align-middle text-white">
                                <i class="fas fa-coins"></i><span class="ms-1 d-none d-sm-inline"> Créditos</span></a>
                        </li>

                        <hr>
                </div>
            </div>
            <div class="col py-3">
                <section>
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-6 text-center">Inicio</h1>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col">
                                                    <p class="card-text">Clientes</p>
                                                </div>
                                                <div class="col">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <p class="card-text">{{ $clientes }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col">
                                                    <p class="card-text">Creditos</p>
                                                </div>
                                                <div class="col">
                                                    <i class="fas fa-credit-card"></i>
                                                </div>
                                            </div>
                                            <p class="card-text">{{ $creditos }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
