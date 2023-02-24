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
                                <i class="fas fa-coins"></i><span class="ms-1 d-none d-sm-inline"> Créditos</span></a>
                        </li>

                        <hr>
                </div>
            </div>
            <div class="col py-3">
                <section>
                    <div class="jumbotron jumbotron-fluid bg-ligth">
                        <div class="container">
                            <h1 class="display-8 text-center">Agregar Crédito</h1>
                        </div>
                    </div>
                    <div class="container">
                        <div class="card border-success"><br>
                            <form action="{{ route('credito.store') }}" method="POST">
                                @csrf
                                <div class="form-group row mx-2">
                                    <label class="col-sm-2 col-form-label"><b>Pagare número</b></label>
                                    <div class="col-sm-4">
                                        <input required type="number" class="form-control" id="num_pagare"
                                            name="num_pagare" placeholder="Pagare número">
                                    </div>
                                    <label class="col-sm-2 col-form-label"><b>Cuotas mensuales</b> </label>
                                    <div class="col-sm-3">
                                        <input required type="number" class="form-control" id="cuota_mensual"
                                            name="cuota_mensual" placeholder="Cuotas">
                                    </div>
                                </div> <br>
                                <div class="form-group row mx-2">
                                    <label class="col-sm-2 col-form-label"><b>Monto crédito</b> </label>
                                    <div class="col-sm-4">
                                        <input required type="number" class="form-control" id="monto_credito"
                                            name="monto_credito" placeholder="Cantidad">
                                    </div>
                                {{--     <form action="" method="GET">
                                        <label class="col-sm-2 col-form-label"><b>Cédula cliente</b> </label>
                                        <div class="col-sm-3">
                                            <input required type="text" class="form-control" id="cedula"
                                                name="cedula" placeholder="Cédula">
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </form> --}}
                                </div><br>

                                <div class="form-group row mx-2">
                                    <label class="col-sm-2 col-form-label"><b>Cuota inicial</b> </label>
                                    <div class="col-sm-4">
                                        <input required type="number" class="form-control" id="cuota_inicial"
                                            name="cuota_inicial" placeholder="Cantidad">
                                    </div>
                                    <label class="col-sm-2 col-form-label"><b>Cliente</b></label>
                                    <div class="col-sm-3">
                                        <select class="form-select" name="cliente" id="cliente">
                                            <option defaultValue>Seleccionar...</option>
                                            @foreach ($clientes as $cliente)
                                                <option value="{{ $cliente->cedula }}">{{ $cliente->nombres }}
                                                    {{ $cliente->apellidos }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div><br>
                                <div class="form-group row mx-2">
                                    <label class="col-sm-2 col-form-label"><b>Fecha credito</b></label>
                                    <div class="col-sm-4">
                                        <input required class="form-control" type="date" name="fecha_credito"
                                            id="fecha_credito">
                                    </div>
                                    <label class="col-sm-2 col-form-label"><b>Tasa de interes</b></label>
                                    <div class="col-sm-3">
                                        <select required class="form-select" name="tasa_interes" id="tasa_interes">
                                            <option defaultValue>Seleccionar...</option>
                                            <option value="2.7">2.7%</option>
                                            <option value="1.7">1.7%</option>
                                            <option value="0.7">0.7%</option>
                                        </select>
                                    </div>
                                </div><br>
                                <div class="form-group row mx-2">
                                    <label class="col-sm-2 col-form-label"><b>Fecha desembolso</b></label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="date" name="fecha_desembolso"
                                            id="fecha_desembolso">
                                    </div>
                                    <label class="col-sm-2 col-form-label"><b>Observaciones</b></label>
                                    <div class="col-sm-3">
                                        <textarea class="form-control" name="observaciones" id="observaciones" cols="60" rows="5"></textarea>
                                    </div>
                                </div><br>
                                <div class="form-group row mx-auto">
                                    <div class="col-sm-10">
                                        <button type="submit"
                                            class="btn btn-primary text-align-center">Agregar</button>
                                    </div>
                                </div>
                            </form>
                            <br>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
