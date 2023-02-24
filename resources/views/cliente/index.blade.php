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
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-6 text-center">Clientes</h1>
                        </div>
                    </div>
                    <div class="container">
                        <div class="card border-success">
                            <div class="card-header text-center">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <a class="btn btn-primary" href="{{ route('cliente.create') }}">Nuevo
                                            Cliente</a>
                                        <br>
                                    </div>
                                    <div class="col-md-8">
                                        <form action="{{ route('cliente.index') }}" method="GET">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                </div>
                                                <input name="texto" id="texto" type="text" class="form-control"
                                                    placeholder="Cédula, Nombres o Apellidos">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-success" type="submit"
                                                        id="search">Buscar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class=" card-body justify-content-center table-responsive">
                                <table class="table table-hover text-center">
                                    <thead class="table-ligth" style="background-color: #4edfd3;">
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Cédula/NIT</th>
                                        <th>Direccion</th>
                                        <th>Ciudad</th>
                                        <th>Telefono</th>
                                        <th>Cupo Disponible</th>
                                        <th>Estado</th>
                                        <th>Información</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </thead>
                                    <tbody class="text-center">
                                        @if (count($clientes) <= 0)
                                            <tr>
                                                <td colspan="12">
                                                    No se encontraron resultados
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($clientes as $cliente)
                                                <tr>
                                                    <td>
                                                        {{ $cliente->nombres }}
                                                    </td>
                                                    <td>
                                                        {{ $cliente->apellidos }}
                                                    </td>
                                                    <td>
                                                        {{ $cliente->cedula }}
                                                    </td>

                                                    <td>
                                                        {{ $cliente->direccion }}
                                                    </td>
                                                    <td>
                                                        {{ $cliente->ciudad }}
                                                    </td>
                                                    <td>
                                                        {{ $cliente->contacto }}
                                                    </td>
                                                    <td>
                                                        {{ $cliente->cupo_disponible }}
                                                    </td>
                                                    <td>
                                                        {{ $cliente->estado }}
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('cliente.show', $cliente->id) }} "><i
                                                                class="fas fa-info-circle"></i></a>
                                                    </td>
                                                    <td>

                                                        <a class="btn btn-success"
                                                            href="{{ route('cliente.edit', $cliente->id) }} "><i
                                                                class="fas fa-edit"></i></a>

                                                    </td>
                                                    <td>

                                                        <form action="{{ route('cliente.destroy', $cliente->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            {{ method_field('DELETE') }}
                                                            <button class="btn btn-danger" type="submit"
                                                                onclick="return confirm('¿Desea eliminar el cliente?')"><i
                                                                    class="fas fa-trash-alt"></i></button>
                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $clientes->links() }}
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
