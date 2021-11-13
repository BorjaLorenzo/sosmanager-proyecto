@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-1"><a href="{{url('/')}}" role="button" class="btn btn-info">Volver</a></div>
            <p></p>
            <p></p>
            <table id="tabla" class="display">
                <thead>
                    @if ($usuario->rol=='A')
                        <tr>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Grupo</th>
                            <th>Rol</th>
                            <th>Asuntos Propios</th>
                            <th>Ajustes</th>
                        </tr>
                    @else
                        <tr>
                            <th>Nombre</th>
                            <th>Grupo</th>
                            <th>Rol</th>
                            <th>Asuntos Propios</th>
                        </tr>
                    @endif
                    
                </thead>
                <tbody>
                    
                        @foreach ($trabajadores as $t)
                            @if ($t->activo=='S')
                                <tr>
                                    <td>{{strtoupper($t->nombre)}}</td>
                                    @if ($usuario->rol=='A')
                                    <td>{{$t->dni}}</td>
                                    @endif
                                    <td>{{$t->grupo}}</td>
                                    @switch($t->rol)
                                        @case('S')
                                        <td>SOCORRISTA</td>
                                            @break
                                        @case('P')
                                        <td>PATRON</td>
                                            @break
                                    @endswitch
                                    
                                    
                                    @switch($t->asuntos_propios)
                                        @case('S')
                                        <td>SI</td>
                                            @break
                                        @case('N')
                                        <td>NO</td>
                                            @break
                                    @endswitch
                                    @if ($usuario->rol=='A')
                                        <td>
                                            <button type="button" class="btn btn-danger preliminar" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                            </button>
                                            <button type="button" class="btn btn-primary preditar" data-bs-toggle="modal" data-bs-target="#editModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg></button>
                                        </td>
                                    @endif
                                    
                                </tr>
                            @endif
                        @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" >Eliminar usuario</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="exampleModalLabel">
                      Estas seguro de que quieres eliminar a este usuario?
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
                      <p>Nombre: <input type="text" name="nombre" id="nombre"></p>
                      {{-- <p>Apellidos: <input type="text" name="apellidos" id="apellidos"></p> --}}
                      <p>DNI: <input type="text" name="dni" id="dni"></p>
                      <input type="hidden" name="old_dni" id="old_dni">     
                      <p>Grupo: <input type="number" name="grupo" id="grupo" min="0"></p>
                      <p>Rol: <select name="rol" id="rol">
                          <option value="P">PATRON</option>
                          <option value="S">SOCORRISTA</option>
                        </select></p>
                      <p>Asuntos propios disponibles: <label class="switch">
                        <input type="checkbox" id="asuntos">
                        <span class="slider round"></span>
                      </label></p>
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
            let dni,old_dni,nombre,/*apellidos,*/rol,asuntos,grupo;
            $('table').DataTable();
            $('.preliminar').click(function (e) { 
                e.preventDefault();
                //console.log($(this).parent().parent().children().eq(1).text());
                dni = $(this).parent().parent().children().eq(1).text();
                nombre = $(this).parent().parent().children().eq(0).text();
                $('#exampleModalLabel').text('Eliminar usuario: '+nombre+' con DNI: '+dni+' ?');
            });
            $('#eliminar').click(function (e) { 
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "{{asset('helpers/delete_user.php')}}",
                    data: {dni:dni},
                    dataType: "text",
                    success: function (response) {
                        //console.log(response);
                        location.reload();
                    }
                });
            });
            $('.preditar').click(function (e) { 
                e.preventDefault();
                $('#asuntos').prop('checked',false);
                //console.log($(this).parent().parent().children().eq(1).text());
                nombre = $(this).parent().parent().children().eq(0).text();
                dni = $(this).parent().parent().children().eq(1).text();
                grupo=$(this).parent().parent().children().eq(2).text();
                rol=$(this).parent().parent().children().eq(3).text();
                asuntos=$(this).parent().parent().children().eq(4).text();
                if (asuntos=='SI') {
                    $('#asuntos').prop('checked',true);
                }
                console.log(rol);
                if (rol=='PATRON') {
                    $('#rol option').eq(0).prop('selected',true);
                }else if (rol=='SOCORRISTA') {
                    $('#rol option').eq(1).prop('selected',true);
                }
                
                $('#dni').val(dni);
                $('#old_dni').val(dni);
                $('#nombre').val(nombre);
                $('#grupo').val(grupo);
                
            });
            $('#editar').click(function (e) { 
                e.preventDefault();
                if ($('#asuntos').prop('checked')) {
                    asuntos='S';
                }else{
                    asuntos='N';
                }
                rol=$('#rol option:selected').val();
                old_dni=$('#old_dni').val();
                dni=$('#dni').val();
                grupo=$('#grupo').val();
                nombre=$('#nombre').val();
                nombre.toUpperCase();
                $.ajax({
                    type: "post",
                    url: "{{asset('helpers/update_user.php')}}",
                    data: {
                        nombre:nombre,
                        dni:dni,
                        old_dni:old_dni,
                        apellidos:'-',
                        rol:rol,
                        asuntos:asuntos,
                        grupo:grupo
                    },
                    dataType: "text",
                    success: function (response) {
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection