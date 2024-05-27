<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="col-md-12 size-voto">
            <div class="float-right">
                <a class="btn btn-person-1" href="{{ route('representante.index') }}"><i class="fa fa-light fa-circle-left"></i> {{ __('Regresar') }}</a>
            </div>
            <div class="card card-person-1 ">
               
                <div class="card-header">
                    <div class="form-group text-center">
                        <h5>{{ 'Representante' }}</h5>
                        
                    </div>
                </div>

                <div class="card-body row ">
                    <div class="col-sm-4">
                    <div class="form-group text-center">
                        <strong>Nombre:</strong>
                        {{ 'camaron' }}
                        
                    </div>
                    </div> 
                    <div class="col-sm-3">
                        <div class="form-group text-center">
                            <strong>Cédula:</strong>
                            {{ '1234' }}
                        </div>
                    </div>   
                    <div class="col-sm-5">
                        <div class="form-group text-center">
                            <strong>Voto:</strong>
                            <br>
                            <div class="btn-group buton-voto" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                <label class="btn btn-outline-primary" for="btnradio1">NO</label>
                              
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio2">SI</label>
                              
                              </div>
                        </div>
                    </div>   
                        
                    </div>
            </div>
        </div>
       {{-- Integrante --}}
       <div class="col-sm-12">
        <div class="card card-person-1 table-p size-votos">
            <div class="card-header">
                <div class="d-flex justify-content-center ">
                        <strong>Integrantes</strong>
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
                                    <th>N°</th>                                        
                                    <th>Cédula</th>
                                    <th>Nombres</th>
                                    <th>voto</th>
                                </tr>
                            </thead>
                            <tbody>                         
                                <tr>
                                    <td>{{ '1' }}</td>                                            
                                    <td>{{ '2343'}}</td>
                                    <td>{{  'juan' }}</td>
                                    <td>
                                        <div class="btn-group buton-voto" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="voto1" id="btnradio3" autocomplete="off" checked>
                                        <label class="btn btn-outline-primary" for="btnradio3">NO</label>
                                        
                                        <input type="radio" class="btn-check" name="voto1" id="btnradio4" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btnradio4">SI</label>
                                        
                                        </div>
                                    </td>
                                </tr>         
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="pagination justify-content-center">
            </div>
            {{--@if($representantes->count() ) 
            {!! $representantes->links() !!}
            {{--@endif--}}
        </div>

      
    <div class="col-md-12 mt20 mt-2 text-center">
        <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
    </div>
</div>
</div>