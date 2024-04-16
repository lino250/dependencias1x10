
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-person-1 table-p">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Integrantes') }}
                            </span>
                
                             <div class="float-right">
                                <a href="{{ route('integrante.create',$id) }}" class="btn text-light  btn-sm float-right"  data-placement="left">
                                 <i class="fa fa-light fa-circle-plus fs-4"></i>
                                </a>
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
                            <table class="table table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>                                        
										<th>Cedula</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Telefono</th>
										<th>Telefono Alternativo</th>                    
										<th>Parroquia</th>
                                        <th>Centro</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($representante->integrantesR->isEmpty())
                                    <td>No hay integrantes asociados a este representante.</td>
                                @else   
                                @php $i = 0; @endphp
                                    @foreach ($representante->integrantesR as $integrante)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $integrante->cedula }}</td>
											<td>{{ $integrante->nombres }}</td>
											<td>{{ $integrante->apellidos }}</td>
											<td>{{ $integrante->telefono }}</td>
											<td>{{ $integrante->telefono_alternativo }}</td>
                                            <td>{{ $integrante->parroquia->nombre }}</td>
                                            <td>{{ $integrante->centro->nombre }}</td>
                            
                                            <td>
                                                <form action="{{ route('integrante.destroy',$integrante->id,$representante->id) }}" method="POST">
                                                   {{-- <a class="btn btn-sm btn-primary " href="{{ route('integrante.show',$integrante->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>--}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('integrante.edit',$integrante->id) }}"><i class="fa fa-light fa-pen-to-square"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Eliminar Integrante"><i class="fa fa-fw fa-trash" ></i> </button>

                                                   {{-- <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash" ></i> </button>--}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              {{--  {!! $integrantes->links() !!}  --}} 
            </div> 
        </div>
    </div>

<!--
    {{-- 
@extends('layouts.app')

@section('template_title')
    Integrante
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Integrante') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('integrantes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
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
										<th>Apellidos</th>
										<th>Telefono</th>
										<th>Telefono Alternativo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($integrantes as $integrante)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $integrante->cedula }}</td>
											<td>{{ $integrante->nombres }}</td>
											<td>{{ $integrante->apellidos }}</td>
											<td>{{ $integrante->telefono }}</td>
											<td>{{ $integrante->telefono_alternativo }}</td>

                                            <td>
                                                <form action="{{ route('integrantes.destroy',$integrante->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('integrantes.show',$integrante->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('integrantes.edit',$integrante->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $integrantes->links() !!}
            </div>
        </div>
    </div>
@endsection
--> --}}