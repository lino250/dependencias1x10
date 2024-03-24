
@extends('representante.index')
  @section('table')

  <div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>
                <th>No</th>
                
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Telefono</th>
                <th>Parroquia</th>
                <th>Centro de Votación</th>
                
                 <th>Dependencia</th>
                @if(Auth::user()->dependencia == null)
                <th>Coordinacion</th> 
                @endif
                <th></th>
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
                        <td>{{$representante->dependencia->nombre}}</td>
                        @if(Auth::user()->dependencia == null)
                        <td>{{ $representante->coordinacion->nombre }}</td>
                        @endif                       

                        <td>
                            <form action="{{ route('representante.destroy',$representante->id) }}" method="POST">
                                <a class="btn btn-sm btn-primary " href="{{ route('representante.show',$representante->id)}}"><i class="fa fa-fw fa-eye"></i> {{ __('1x10') }}</a>
                                <a class="btn btn-sm btn-success" href="{{ route('representante.edit',$representante->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                            </form>
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

      
  @endsection
      