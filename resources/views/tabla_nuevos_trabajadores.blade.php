@extends('layouts.app')

@section('content')
    @if ($usuario[0]->rol != 'A')
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="alert alert-warning" role="alert">Lo siento pero solo los usuarios ADMINISTRADORES tienen
                        accesso a este servicio :(</p>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h2>Nuevos Registros</h2>
                </div>
                <div class="col-2 offset-6 ">
                    <a href="{{ url('/trabajadores') }}" role="button" class="btn btn-info float-end">
                        < Volver</a>
                </div>

            </div>
            <div class="row">
                <p></p>
                <p></p>
                <table id="tabla" class="display">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Ajustes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trabajadores as $t)
                            <tr>
                                <td>{{ $t->nombre }}</td>
                                <td>{{ $t->dni }}</td>
                                <td>
                                    <button type="button" class="btn btn-danger preliminar " data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-success preditar " data-bs-toggle="modal"
                                        data-bs-target="#editModal"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Eliminar usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="exampleModalLabel">
                                Estas seguro de que quieres eliminar a este usuario?
                            </div>
                            <div class="modal-footer" id="exampleModalLabel">
                                <form action="{{ url('eliminar_nuevo_trabajador') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="dni" id="dni_eliminar">
                                    <button type="submit" class="btn btn-success" id="eliminar">SI</button>
                                </form>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NO</button>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Por favor indique un grupo de trabajo y un rol para completar el registro de este usuario
                                </p>
                                <form action="{{ url('confirmar_nuevo_trabajador') }}" method="post" id="submit">
                                    @csrf

                                    <input type="hidden" id="dni" name="dni">

                                    <p>Grupo: <input type="number" id="grupo" name="grupo" min="1" value="1" onkeydown="return false">
                                    </p>
                                    <p>Rol: <select name="rol" id="rol">
                                            <option value="P">PATRON</option>
                                            <option value="S">SOCORRISTA</option>
                                        </select></p>


                                </form>
                                {{-- <p style="color: red" hidden id="erroreditar">! El campo "Grupo" esta vacio por favor rellenelo para continuar !</p> --}}
                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NO</button>
                                <button type="button" class="btn btn-success" id="editar">SI</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(function() {
                let dni, old_dni, nombre, /*apellidos,*/ rol, asuntos, grupo;
                $('table').DataTable();
                $('.preliminar').click(function(e) {
                    e.preventDefault();
                    //console.log($(this).parent().parent().children().eq(1).text());
                    dni = $(this).parent().parent().children().eq(1).text();
                    nombre = $(this).parent().parent().children().eq(0).text();
                    $('#exampleModalLabel').text('Eliminar usuario: ' + nombre + ' con DNI: ' + dni + ' ?');
                    $('#dni_eliminar').val(dni);
                });
                $('.preditar').click(function(e) {
                    e.preventDefault();
                    dni = $(this).parent().parent().children().eq(1).text();
                    $('#dni').val(dni);
                });

                $('#editar').click(function(e) {
                    e.preventDefault();
                    $('#submit').trigger('submit');
                });
               
            });
        </script>
    @endif
@endsection
@section('mensaje')
    @if (isset($mensaje))
        @if ($mensaje)
            <p class="alert alert-success" role="alert">{{ $texto }}</p>
        @else
            <p class="alert alert-danger" role="alert">{{ $texto }}</p>
        @endif
    @endif
@endsection
