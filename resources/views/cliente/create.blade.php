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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    @include('sweetalert::alert')
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
                                <i class="fas fa-coins"></i><span class="ms-1 d-none d-sm-inline"> Cr??ditos</span></a>
                        </li>
                </div>
            </div>
            <div class="col py-3">
                <section>
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-8 text-center">Agregar Cliente</h1>
                        </div>
                    </div>
                    <div class="container">
                        <div class="card border-success ">
                            <br>
                            <form action="{{ route('cliente.store') }}" method="POST">
                                @csrf
                                <div class="form-group row mx-auto">
                                    <label class="col-sm-2 col-form-label"><b>Nombres</b> </label>
                                    <div class="col-sm-4">
                                        <input required type="text" class="form-control" id="nombres"
                                            name="nombres" placeholder="Nombres">
                                    </div>
                                    <label class="col-sm-2 col-form-label"><b>Apellidos</b></label>
                                    <div class="col-sm-3">
                                        <input required type="text" class="form-control" id="apellidos"
                                            name="apellidos" placeholder="Apellidos">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row mx-auto">
                                    <label class="col-sm-2 col-form-label"><b>C??dula/Nit</b> </label>
                                    <div class="col-sm-4">
                                        <input required type="text" class="form-control" id="cedula"
                                            name="cedula" placeholder="C??dula/Nit">
                                    </div>
                                    <label class="col-sm-2 col-form-label"><b>Direcci??n</b> </label>
                                    <div class="col-sm-3">
                                        <input required type="text" class="form-control" id="direccion"
                                            name="direccion" placeholder="Direcci??n">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row mx-auto">
                                    <label class="col-sm-2 col-form-label"><b>Ciudad</b></label>
                                    <div class="col-sm-4">
                                        <select required class="form-select" name="ciudad" id="ciudad">
                                            <option defaultValue>Seleccionar...</option>
                                            <option value="Bogota">Bogota</option>
                                            <option value="Bucaramanga">Bucaramanga</option>
                                            <option value="Cali">Cali</option>
                                            <option value="Medellin">Medellin</option>
                                            <option value="Manizales">Manizales</option>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 col-form-label"><b>Telefono</b></label>
                                    <div class="col-sm-3">
                                        <input required type="text" class="form-control" id="telefono"
                                            name="telefono" placeholder="Telefono">
                                    </div>
                                </div><br>
                                <div class="form-group row mx-auto">
                                    <label class="col-sm-2 col-form-label"><b>Contacto</b></label>
                                    <div class="col-sm-8">
                                        <input required type="text" class="form-control" id="contacto"
                                            name="contacto" placeholder="Contacto">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row mx-auto">
                                    <div class="d-flex justify-content-center">
                                        <label class="col-sm-2 col-form-label"><b>Cupo total</b></label>
                                        <div class="col-sm-6">
                                            <input required type="number" class="form-control" id="cupo_total"
                                                name="cupo_total" placeholder="Cupo total">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="form-group row mx-auto">
                                    <div class="d-flex justify-content-center">
                                        <label class="col-sm-2 col-form-label"><b>Cupo disponible</b></label>
                                        <div class="col-sm-6">
                                            <input disabled type="number" class="form-control" id="cupo_disponible"
                                                name="cupo_disponible" placeholder="Cupo disponible">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="form-group row mx-auto">
                                    <div class="d-flex justify-content-center">
                                        <label class="col-sm-2 col-form-label"><b>Dias de gracia</b> </label>
                                        <div class="col-sm-6">
                                            <input required type="number" class="form-control" id="dias_gracia"
                                                name="dias_gracia" placeholder="Dias de gracia">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="form-group row mx-auto justify-content-center">
                                    <div class="col-sm-2">
                                        <button type="submit"
                                            class="btn btn-primary text-align-center">Agregar</button>
                                    </div>
                                </div>

                                <br>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
