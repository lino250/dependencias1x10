<div class="container-fluid">
    <div class="modal modal-person-1 fade" id="validElimInt" tabindex="-1" aria-labelledby="validElim" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Integrante!!</h1>
                    <button type="button" class="btn ms-auto" data-bs-dismiss="modal" aria-label="Close"><i class="fa fs-4  fa-regular fa-circle-xmark text-white"></i></button>
                </div>
                <div class="modal-body">
                    <p>¿Deseas eliminar al integrante? <br> Si eliminas a este integrante pobra ser usado en otro 1x10. </p>
                    <!-- Campo oculto para almacenar el ID del integrante -->
                    <input type="hidden" id="idIntegrante" name="idIntegrante" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-person-2" data-bs-dismiss="modal">Cerrar</button>
                    <form id="formEliminarIntegrante" action="{{ route('integrante.destroy', '__ID_INTEGRANTE__') }}" method="POST">
                        <input type="hidden" name="idRepresentante" id="idRepresentante" value="__ID_REPRESENTANTE__">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-person-1 float-right" data-bs-placement="left">
                            {{ __('Eliminar') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                                                <a class="btn btn-sm btn-success" href="{{ route('integrante.edit',$integrante->id) }}"><i class="fa fa-light fa-pen-to-square"></i></a>
                                                <button type="button" id="openElimInt" class="btn btn-danger btn-sm" data-id-integrante="{{ $integrante->id }}" data-id-representante="{{ $representante->id }}" data-nombre-representante="{{ $representante->nombre }}" data-bs-toggle="modal" data-bs-target="#validElimInt">
                                                    <i class="fa fa-fw fa-trash"></i>
                                                </button>
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

