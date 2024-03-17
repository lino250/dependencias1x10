@extends('layouts.dashboard')

@section('title')
    Reportes
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-end ">
                        
                        <form action="{{ route('reporte.buscar') }}" method="POST">
                        @csrf
                        <label for="dependencia">Seleccionar dependencia:</label>
                        <input type="text" name="dependencia" id="dependencia" value="">
                        <input type="text" name="coordinacion" id="coordinacion" value="">
                        <!--<select name="dependencia" id="dependencia" value="1">
                           
                        </select>-->
                        <button type="submit">Filtrar</button>
                    </form>  
                              
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
										{{--<th>Dependencia Id</th>
										<th>Coordinacion Id</th>--}}

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
@endsection
