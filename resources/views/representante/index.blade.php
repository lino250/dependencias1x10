@extends('layouts.app')

@section('template_title')
    Representante
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-end ">

                            <!-- Modal -->
                            <div class="modal fade" id="validReprent" tabindex="-1" aria-labelledby="validReprent" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registro no encontra!!</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Desea crear un nuevo representante con esta cedula?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <a href="{{ route('representante.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                            {{ __('Crear') }}
                                        </a>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <!--a href="{{ route('representante.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                {{ __('Create New') }}
                              </a-->
                             <div class="float-right">
                            
                                    <form class="d-flex" role="search">
                                        <input class="form-control me-2" type="search" placeholder="Cedula" aria-label="Cecula">
                                        <button class="btn btn-person-1"  data-bs-toggle="modal" data-bs-target="#validReprent" type="button">Buscar</button>
                                      </form>
                             
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Cedula</th>
										<th>Nombres</th>
										<th>Telefono</th>
										<th>Telefono Alternativo</th>
										<th>Centro Id</th>
										<th>Parroquia Id</th>
										<th>Dependencia Id</th>
										<th>Coordinacion Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($representantes as $representante)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $representante->cedula }}</td>
											<td>{{ $representante->nombres }}</td>
											<td>{{ $representante->telefono }}</td>
											<td>{{ $representante->telefono_alternativo }}</td>
											<td>{{ $representante->centro->nombre }}</td>
											<td>{{ $representante->parroquia->nombre }}</td>
											<td>{{$representante->dependencia->nombre}}</td>
											<td>{{ $representante->coordinacion->nombre }}</td>

                                            <td>
                                                <form action="{{ route('representante.destroy',$representante->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('representante.show',$representante->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('1x10') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('representante.edit',$representante->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $representantes->links() !!}
            </div>
        </div>
    </div>
@endsection
