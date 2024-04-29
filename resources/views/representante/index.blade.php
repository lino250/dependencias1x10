@extends('layouts.dashboard')
@section('title')
  Registro Representante
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Modal Para eliminar un representante -->
            <div class="modal modal-person-1 fade" id="validElim" tabindex="-1" aria-labelledby="validElim" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Representante!!</h1>
                            <button type="button" class="btn ms-auto" data-bs-dismiss="modal" aria-label="Close"><i class="fa fs-4  fa-regular fa-circle-xmark text-white"></i></button>
                        </div>
                        <div class="modal-body">
                            <p>¿Deseas eliminar al este representante? <br> Si lo eliminas se borraran todos los integrantes asociados.</p>
                            <!-- Campo oculto para almacenar el ID del representante -->
                            <input type="hidden" id="idRepresentante" name="idRepresentante" value="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-person-2" data-bs-dismiss="modal">Cerrar</button>
                            <form id="formEliminarRepresentante" action="{{ route('representante.destroy', '__ID__') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-person-1 float-right"  data-placement="left">
                                    {{ __('Eliminar') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card card-person-1 table-p">
                <div class="card-header">
                    <div class="d-flex justify-content-end ">
                        <!-- Modal -->
                        <div class="modal modal-person-1 fade" id="validReprent" tabindex="-1" aria-labelledby="validReprent" aria-hidden="true">
                             <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Registro no encontrado!!</h1>
                                        <button type="button" class="btn ms-auto" data-bs-dismiss="modal" aria-label="Close"><i class="fa fs-4  fa-regular fa-circle-xmark text-white"></i></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Desea crear un nuevo representante con el siguiente dato? </p>
                                        <p id="cedulaMostrada"> </p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-person-2" data-bs-dismiss="modal">Cerrar</button>
                                    <a href="{{ route('representante.create', ['cedula' => '']) }}" id="crearLink" class="btn btn-person-1 float-right" data-placement="left">
                                        {{ __('Crear') }}
                                    </a>
                                                                    </div>
                                </div>
                            </div>
                        </div>
                            {{--<!--a href="{{ route('representante.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                {{ __('Create New') }}
                              </a-->--}}
                             <div class="float-right">
                             <form class="d-flex" id="formSearch" role="search" action="{{ route('representante.buscar') }}" method="POST">
                                    @csrf <!-- Agrega el token CSRF para protección -->
                                    <input class="form-control me-2" type="text" placeholder="Cedula" aria-label="Cedula" name="cedula" id="cedulaRepresentante" maxlength="8" required>
                                    <button id="btnSearch" class="btn " type="submit"><i class="fa text-white fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            
                                    
                                {{-- boton de modal prueba
                                <form class="d-flex" role="search">
                                        <input class="form-control me-2" type="seacrch" placeholder="Cedula" aria-label="Cedula" name="cedula" id="cedula">
                                       <button class="btn btn-person-1"  data-bs-toggle="modal" data-bs-target="#validReprent" type="button">Buscar</button>
                                        <a href="{{ route('representante.buscar') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                            {{ __('Buscar') }}
                                        </a>
                                    </form>
                                --}}
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body" id="table-representante">
                        <div class="table-responsive ">
                            <table class="table  table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>                                        
                                        <th>Cedula</th>
                                        <th>Nombres</th>
                                        <th>Telefono</th>
                                        <th>Parroquia</th>
                                        <th>Centro de Votación</th>                                        
                                        @if(Auth::user()->dependencia == null)
                                        <th>Dependencia</th>
                                        @endif
                                        <th>Coordinacion</th> 
                                        {{--<th>Acciones</th>--}}
                                    </tr>
                                </thead>
                                <tbody>
                                        
                                        @if(isset($representantes)) 
                                        @php $i = 0; @endphp                                  
                                        @foreach ($representantes as $representante)                                            
                                            <tr>
                                                <td>{{ ++$i }}</td>                                            
                                                <td>{{ $representante->cedula }}</td>
                                                <td>{{ $representante->nombres }}</td>
                                                <td>{{ $representante->telefono }}</td>
                                                <td>{{ $representante->parroquia->nombre }}</td>
                                                <td>{{ $representante->centro->nombre }}</td>                                                
                                                @if(Auth::user()->dependencia == null)
                                                <td>{{$representante->dependencia->nombre}}</td>
                                                @endif
                                                @if($representante->coordinacion)
                                                <td>{{ $representante->coordinacion->nombre }}</td>
                                                @else
                                                <td> </td>
                                                @endif


                                                {{--<td>{{ $representante->coordinacion->nombre }}</td>--}}
                        
                                                <td>
                                                        <a class="btn btn-sm btn-primary " href="{{ route('representante.show',$representante->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Crear 1x10"><i class="fa fa-light fa-list-ol"></i></a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('representante.edit',$representante->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Editar Representante"><i class="fa fa-light fa-pen-to-square"></i></a>
                                                        <button type="button" id="openEliminar" class="btn btn-danger btn-sm" data-id="{{ $representante->id }}" data-bs-toggle="modal" data-bs-target="#validElim"><i class="fa fa-fw fa-trash"></i></button>
                                                </td>
                                            </tr>
                                           {{-- <table>
                                                <tr>
                                                <td> <strong>DEPENDENCIA: </strong>{{$representante->dependencia->nombre}}</td>
                                                </tr>
                                                <tr>  
                                                    <td><strong>COORDINACION: </strong>{{$representante->coordinacion->nombre }}</td>
                                                </tr>
                                            </table> --}} 
                                        @endforeach
                                        @else
                                            <tr>
                                                <td colspan="10"> <p>No hay registros...</p></td>
                                            </tr>
                        
                                        @endif
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @if($representantes->count() > 10) 
                {!! $representantes->links() !!}
                @endif
            </div>
        </div>
        <script>
            var baseRoute = '{{ route('representante.create') }}';
        </script>
    </div>    
@endsection
