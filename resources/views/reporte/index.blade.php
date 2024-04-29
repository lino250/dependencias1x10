@extends('layouts.dashboard')

@section('title')
    Reportes
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-person-1  table-p">
                    <div class="card-header report-m">
                        <div class="">
                            <form action="{{ route('reporte.buscar') }}" method="POST">
                                @csrf
                                <div class="row justify-content-end">
                                @if (Auth::user()->dependencia)
                                    @php
                                        $idDependencia = Auth::user()->dependencia->id;
                                    @endphp
                                    <div class="form-group col-5">                                        
                                        {{ Form::hidden('dependencia_idr', $idDependencia,['class' => 'form-control' . ($errors->has('dependencia_idr') ? ' is-invalid' : ''), 'placeholder' => 'Dependencia']) }}
                                    </div>  
                                    <div class="form-group col-5">
                                        {{ Form::label('coordinacion_idr', 'Coordinacion', ['class' => 'd-none']) }}
                                        {{ Form::select('coordinacion_idr', $coordinaciones, null, ['class' => 'form-control' . ($errors->has('coordinacion_idr') ? ' is-invalid' : ''), 'placeholder' => 'Coordinacion']) }}
                                        {!! $errors->first('coordinacion_idr', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                                                     
                                @else

                                    <div class="form-group col-6">
                                      {{ Form::label('dependencia_idr', ' ', ['class' => 'd-none']) }} 
                                        {{ Form::select('dependencia_idr', $dependencias, null, ['class' => 'form-control' . ($errors->has('dependencia_idr') ? ' is-invalid' : ''), 'placeholder' => 'Dependencia']) }}
                                        {!! $errors->first('dependencia_idr', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group col-5">
                                       {{ Form::label('coordinacion_idr', ' ',['class' => 'd-none']) }}
                                        {{ Form::select('coordinacion_idr', $coordinaciones, null, ['class' => 'form-control' . ($errors->has('coordinacion_idr') ? ' is-invalid' : ''), 'placeholder' => 'Coordinacion']) }}
                                        {!! $errors->first('coordinacion_idr', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                @endif
                                <div class="col-1">
                                    <button id="btnFitro" class="btn" type="submit"><i class="fa text-white fa-solid fa-magnifying-glass"></i></button>    
                                </div>
                               
                                </div>
                                
                                {{--<a href="{{ route('reporte.buscar') }}" class="btn btn-primary">Buscar</a>--}}
                                

                            </form>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body" id="table-reporte-representante">
                        <div class="table-responsive">
                            <table class="table  table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>                        
                                        <th>Cedula</th>
                                        <th>Nombres y Apellidos</th>
                                        <th>Telefono</th>
                                        <th>Parroquia</th>
                                        <th>Centro</th>
                                        <th>Dependencia</th>
                                        <th>Coordinacion</th>       
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (session()->has('representantes'))
                                    @php $i = 0; @endphp                                  
                                    @foreach (session('representantes') as $rep) 
                                                                               
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{$rep->cedula_representante}}</td>
                                            <td>{{$rep->nombre_representante}}</td>
                                            <td>{{$rep->telefono_representante}}</td>   
                                            <td>{{$rep->nombre_parroquia}}</td>
                                            <td>{{$rep->nombre_centro}}</td> 
                                            <td>{{$rep->nombre_dependencia}}</td>
                                             <td>{{$rep->nombre_coordinacion}}</td>                                         
                                        </tr>
                                        
                                                                          
                                    @endforeach
                                    <div class="text-end enviar">
                                        <a href="{{ route('descargar.reporte.excel') }}" class="btn btn-person-1">Tranbajadores x Dependencia <i class="fa fa-light fa-download"></i></a>

                                    </div>
                                    <div class="text-end enviar">
                                        @csrf
                                        <a href="{{ route('descargar.reporte.excel1x10') }}" class="btn btn-person-1">1x10 x Dependencia <i class="fa fa-light fa-download"></i></a>

                                    </div>
                                    
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

            </div>
        </div>
    </div>
@endsection
