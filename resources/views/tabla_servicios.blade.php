@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4"><h2>Partes de Servicio</h2></div>
            <div class="col-4 offset-4">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#insertModal">Nuevo Parte</button>
                <a href="{{url('/')}}" role="button" class="btn btn-info">< Volver</a>
            </div>
            
        </div>
        <div class="row">
            <p></p>
            <p></p>
            <table id="tabla" class="display">
                <thead>
                    <tr>
                        @if ($usuario->rol=='A')
                        <th>Nombre Trabajador</th>
                        @endif
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Puesto</th>
                        <th>Tipo Incidencia</th>
                        <th>Traslado Ambulacia</th>
                        @if ($usuario->rol=='A')
                        <th>Activo</th>
                        @endif
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($partes as $p)
                            @if ($p->activo=='S')
                                <tr>
                                    @if ($usuario->rol=='A')
                                    <td>
                                        <div class="row">
                                            <div class="col-7">{{strtoupper($p->nombre_trabajador)}}</div> 
                                        <div class="col-1"><button type="button" class="btn btn-secondary info offset-3" data-bs-toggle="modal" data-bs-target="#infoModal" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
                                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z"/>
                                              </svg>
                                        </button></div>
                                        </div>
                                    </td>
                                    @endif
                                    <td>{{$p->fecha}}</td>
                                    <td>{{$p->hora}}</td>
                                    <td>{{$p->puesto}}</td>
                                    <td>{{$p->tipo_incidencia}}</td>
                                    <td>{{$p->ambulancia}}</td>
                                    @if ($usuario->rol=='A')
                                    <th>{{$p->activo}}</th>
                                    @endif
                                    
                                        <td>
                                            <button type="button" class="btn btn-info detalles" data-bs-toggle="modal" data-bs-target="#detallesModal" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                  </svg>
                                            </button>
                                            @if ($usuario->rol=='A')
                                            <button type="button" class="btn btn-primary preditar" data-bs-toggle="modal" data-bs-target="#editModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg></button>
                                                @endif
                                            <button type="button" class="btn btn-danger preliminar" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                </svg>
                                            </button>
                                        </td>
                                   
                                    
                                </tr>
                            @endif
                        @endforeach
                </tbody>
                </tbody>
            </table>
            <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="insertModalLabel">Nuevo Parte</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" >Eliminar Parte</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="exampleModalLabel">
                      Estas seguro de que quieres eliminar a este parte de servicio?
                    </div>
                    <div class="modal-footer">
                      
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >NO</button>
                        <button type="submit" class="btn btn-success" id="eliminar">SI</button>
                    
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" >Editar usuario</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="editModalLabel">
                      <div class="container">
                          @if ($usuario->rol=='A')
                          <div class="row">
                            <div class="col-6">Nombre Trabajador:</div>
                            <div class="col-6"><input type="text" value="" disabled></div>
                        </div>
                          @endif
                          <div class="row">
                            <div class="col-6">Fecha:</div>
                            <div class="col-6"><input type="text" value="" disabled></div>
                        </div>
                        <div class="row">
                            <div class="col-6"></div>
                            <div class="col-6"><input type="text" value="" disabled></div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >NO</button>
                      <button type="button" class="btn btn-success" id="editar">SI</button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('table').DataTable();
        });
    </script>
@endsection