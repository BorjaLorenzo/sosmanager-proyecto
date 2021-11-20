@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h2>Partes de Servicio</h2>
            </div>
            <div class="col-4 offset-4">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#insertModal">Nuevo
                    Parte</button>
                <a href="{{ url('/') }}" role="button" class="btn btn-info">
                    < Volver</a>
            </div>

        </div>
        <div class="row">
            <p></p>
            <p></p>
            <table id="tabla" class="display">
                <thead>
                    <tr>
                        <td>ID</td>
                        @if ($usuario->rol == 'A')
                            <th>Nombre Trabajador</th>
                        @endif
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Puesto</th>
                        <th>Tipo Incidencia</th>
                        <th>Traslado Ambulacia</th>
                        @if ($usuario->rol == 'A')
                            <th>Activo</th>
                        @endif
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($partes as $p)
                        @if ($p->activo == 'S')
                            <tr>
                                <td>{{ $p->id }}</td>
                                @if ($usuario->rol == 'A')
                                    <td>
                                        <div class="row">
                                            <div class="col-7">{{ strtoupper($p->nombre_trabajador) }}</div>
                                            <div class="col-1"><button type="button"
                                                    class="btn btn-secondary info offset-3" data-bs-toggle="modal"
                                                    data-bs-target="#infoModal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-file-earmark-person-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z" />
                                                    </svg>
                                                </button></div>
                                        </div>
                                    </td>
                                @endif
                                <td>{{ $p->fecha }}</td>
                                <td>{{ $p->hora }}</td>
                                <td>{{ $p->puesto }}</td>
                                <td>{{ $p->tipo_incidencia }}</td>
                                <td>{{ $p->ambulancia }}</td>
                                @if ($usuario->rol == 'A')
                                    <th>{{ $p->activo }}</th>
                                @endif

                                <td>
                                    <button type="button" class="btn btn-info detalles" data-bs-toggle="modal"
                                        data-bs-target="#detallesModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                            <path
                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                        </svg>
                                    </button>
                                    @if ($usuario->rol == 'A')
                                        <button type="button" class="btn btn-primary preditar" data-bs-toggle="modal"
                                            data-bs-target="#editModal"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></button>
                                    @endif
                                    <button type="button" class="btn btn-danger preliminar" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg>
                                    </button>
                                </td>


                            </tr>
                        @else
                            @if ($usuario->rol == 'A')
                                <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-7">{{ strtoupper($p->nombre_trabajador) }}</div>
                                            <div class="col-1"><button type="button"
                                                    class="btn btn-secondary info offset-3" data-bs-toggle="modal"
                                                    data-bs-target="#infoModal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-file-earmark-person-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z" />
                                                    </svg>
                                                </button></div>
                                        </div>
                                    </td>

                                    <td>{{ $p->fecha }}</td>
                                    <td>{{ $p->hora }}</td>
                                    <td>{{ $p->puesto }}</td>
                                    <td>{{ $p->tipo_incidencia }}</td>
                                    <td>{{ $p->ambulancia }}</td>

                                    <th>{{ $p->activo }}</th>


                                    <td>
                                        <button type="button" class="btn btn-info detalles" data-bs-toggle="modal"
                                            data-bs-target="#detallesModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                <path
                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                            </svg>
                                        </button>

                                        <button type="button" class="btn btn-primary preditar" data-bs-toggle="modal"
                                            data-bs-target="#editModal"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></button>

                                        <button type="button" class="btn btn-danger preliminar" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg>
                                        </button>
                                    </td>


                                </tr>
                            @endif

                        @endif

                    @endforeach
                </tbody>
                </tbody>
            </table>
            <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="insertModalLabel">Nuevo Parte</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Parte</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="exampleModalLabel">
                            Estas seguro de que quieres eliminar a este parte de servicio?
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NO</button>
                            <button type="submit" class="btn btn-success" id="eliminar">SI</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Parte</h5>
                            <button type="button" class="btn-close cerrarEditar" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="editModalLabel">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">Incidencia numero:</div>
                                    <div class="col-6"><input type="text" value="" disabled id="id"></div>
                                </div>
                                @if ($usuario->rol == 'A')
                                    <div class="row">
                                        <div class="col-6">Nombre Trabajador:</div>
                                        <div class="col-6"><input type="text" value="" disabled id="nombre"></div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-6">DNI Trabajador:</div>
                                    <div class="col-6"><input type="text" value="" disabled id="dni"></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">Fecha:</div>
                                    <div class="col-6"><input type="date" value="" id="fecha"></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">Hora:</div>
                                    <div class="col-6"><input type="time" value="" id="hora" step="1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">Tipo incidencia:</div>
                                    <div class="col-6">
                                        <select name="" id="tipo">
                                            <option value="CURA">Cura</option>
                                            <option value="AYUDA">Ayuda</option>
                                            <option value="RESCATE">Rescate</option>
                                            <option value="OTROS">Otros</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">Puesto:</div>
                                    <div class="col-6"><input type="number" class="editar" min="1" value=""
                                            id="puesto">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">Nombre victima:</div>
                                    <div class="col-6"><input type="text" class="editar" value=""
                                            id="victima"></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">Procedencia victima:</div>
                                    <div class="col-6"><input type="text" class="editar" value=""
                                            id="procedencia"></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">Patologia:</div>
                                    <div class="col-6"><input type="text" class="editar" value=""
                                            id="patologia"></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">Descripcion:</div>
                                    <div class="col-6"><textarea class="editar" id="descripcion" cols="23"
                                            rows="5" style="resize: none"></textarea></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">Traslado en ambulacia:</div>
                                    <div class="col-6">
                                        <label class="switch">
                                            <input type="checkbox" id="ambulancia">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row" id="errorEditar" hidden>
                                    <div class="col" style="color: red">Algunos de los campos esta incompletos,
                                        rellenalos porfavor</div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger cerrarEditar"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-success" id="editar">Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            let idd;
            $('table').DataTable();
            $('.preditar').click(function(e) {
                e.preventDefault();
                id = $(this).parent().parent().children().eq(0).text();
                $.ajax({
                    type: "post",
                    url: "{{ asset('helpers/get_asistencia.php') }}",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#id').val(response.id);
                        $('#nombre').val(response.nombre_trabajador);
                        $('#dni').val(response.dni_trabajador);
                        $('#fecha').val(response.fecha);
                        $('#hora').val(response.hora);
                        $('#puesto').val(response.puesto);
                        $('#victima').val(response.nombre_victima);
                        $('#procedencia').val(response.procedencia);
                        $('#descripcion').val(response.descripcion);
                        $('#patologia').val(response.patologia);

                        if (response.tipo_incidencia == "CURA") {
                            $('#tipo option').eq(0).prop('selected', true);
                        } else if (response.tipo_incidencia == "AYUDA") {
                            $('#tipo option').eq(1).prop('selected', true);
                        } else if (response.tipo_incidencia == "RESCATE") {
                            $('#tipo option').eq(2).prop('selected', true);
                        } else {
                            $('#tipo option').eq(3).prop('selected', true);
                        }
                        if (response.ambulancia == "SI") {
                            $('#ambulancia').prop('checked', true);
                        } else {
                            $('#ambulancia').prop('checked', false);
                        }
                    }
                });
                //console.log(id);
            });
            $('#editar').click(function(e) {
                e.preventDefault();
                let campos = $('.editar');
                let interruptor = false;
                let arr = [];
                for (let i = 0; i < campos.length; i++) {
                    if (campos.eq(i).val() == "") {
                        $('#errorEditar').attr('hidden', false);
                        interruptor = true;
                        break;
                    }
                }
                if (!interruptor) {
                    let id = $('#id').val();
                    let nombre = $('#nombre').val();
                    let dni = $('#dni').val();
                    let fecha = $('#fecha').val();
                    let hora = $('#hora').val();
                    let puesto = $('#puesto').val();
                    let victima = $('#victima').val();
                    let procedencia = $('#procedencia').val();
                    let descripcion = $('#descripcion').val();
                    let patologia = $('#patologia').val();
                    let tipo = $('#tipo option:selected').val();
                    let ambulancia;
                    if ($('#ambulancia').prop('checked')) {
                        ambulancia = "SI";
                    } else {
                        ambulancia = "NO";
                    }
                    arr.push(id, nombre, dni, fecha, hora, puesto, victima, procedencia, descripcion,
                        patologia, tipo, ambulancia);
                    $.ajax({
                        type: "post",
                        url: "{{ asset('helpers/update_asistencia.php') }}",
                        data: {
                            arr: JSON.stringify(arr)
                        },
                        dataType: "text ",
                        success: function(response) {
                            location.reload();
                        }
                    });
                }
            });
            $('.cerrarEditar').click(function(e) {
                e.preventDefault();
                $('#errorEditar').attr('hidden', true);
            });
            $('.preliminar').click(function (e) { 
                e.preventDefault();
                idd = $(this).parent().parent().children().eq(0).text();
                $('#exampleModalLabel').text('Eliminar Parte N°: '+idd+' ?');
            });
            $('#eliminar').click(function (e) { 
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "{{asset('helpers/delete_asistencia.php')}}",
                    data: {idd:idd},
                    dataType: "text",
                    success: function (response) {
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection
