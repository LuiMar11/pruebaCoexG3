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
                            <h1 class="display-8 text-center">Editar Crédito</h1>
                        </div>
                    </div>
                    <div class="container">
                        <div class="card border-success"><br>
                            <form action="{{ route('credito.update',$credito->id) }}" method="POST">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="form-group row mx-2">
                                    <label class="col-sm-2 col-form-label"><b>Pagare número</b></label>
                                    <div class="col-sm-4">
                                        <input required type="number" class="form-control" id="num_pagare"
                                            name="num_pagare" value="{{ $credito->num_pagare }}">
                                    </div>
                                    <label class="col-sm-2 col-form-label"><b>Cuotas mensuales</b> </label>
                                    <div class="col-sm-3">
                                        <input required type="number" class="form-control" id="cuota_mensual"
                                            name="cuota_mensual" value="{{ $credito->cuota_mensual }}">
                                    </div>
                                </div> <br>
                                <div class="form-group row mx-2">
                                    <label class="col-sm-2 col-form-label"><b>Monto crédito</b> </label>
                                    <div class="col-sm-4">
                                        <input required type="number" class="form-control" id="monto_credito"
                                            name="monto_credito" value="{{ $credito->monto_credito }}">
                                    </div>
                                    <label class="col-sm-2 col-form-label"><b>Cédula cliente</b> </label>
                                    <div class="col-sm-3">
                                        <input required type="text" class="form-control" id="cliente"
                                            name="cliente" value="{{ $credito->cliente }}">
                                    </div>

                                </div><br>

                                <div class="form-group row mx-2">
                                    <label class="col-sm-2 col-form-label"><b>Cuota inicial</b> </label>
                                    <div class="col-sm-4">
                                        <input required type="number" class="form-control" id="cuota_inicial"
                                            name="cuota_inicial" value="{{ $credito->cuota_inicial }}">
                                    </div>
                                    <label class="col-sm-2 col-form-label"><b>Cliente</b></label>
                                    <div class="col-sm-3">
                                        @foreach ($clientes as $cliente)
                                            @if ($credito->cliente == $cliente->cedula)
                                                <input required class="form-control" type="text"
                                                    value=" {{ $cliente->nombres }} {{ $cliente->apellidos }}">
                                            @endif
                                        @endforeach

                                    </div>

                                </div><br>
                                <div class="form-group row mx-2">
                                    <label class="col-sm-2 col-form-label"><b>Fecha credito</b></label>
                                    <div class="col-sm-4">
                                        <input required class="form-control" type="date" name="fecha_credito"
                                            id="fecha_credito" value="{{ $credito->fecha_credito }}">
                                    </div>
                                    <label class="col-sm-2 col-form-label"><b>Tasa de interes</b></label>
                                    <div class="col-sm-3">
                                        <input required class="form-control" type="text"
                                            value=" {{ $credito->tasa_interes }}">
                                    </div>
                                </div><br>
                                <div class="form-group row mx-2">
                                    <label class="col-sm-2 col-form-label"><b>Fecha desembolso</b></label>
                                    <div class="col-sm-4">
                                        <input required class="form-control" type="date" name="fecha_desembolso"
                                        id="fecha_desembolso"" value="{{ $credito->fecha_desembolso }}">
                                    </div>
                                    <label class="col-sm-2 col-form-label"><b>Observaciones</b></label>
                                    <div class="col-sm-3">
                                        <textarea required class="form-control" name="observaciones" id="observaciones" cols="60" rows="5" >{{ $credito->observaciones }}</textarea>
                                    </div>
                                </div><br>
                                <div class="form-group row mx-auto justify-content-center">
                                    <div class="col-sm-2">
                                        <button type="submit"
                                            class="btn btn-primary text-align-center">Guardar cambios</button>
                                    </div>
                                </div>
                                <br>
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
