@extends('layouts.dashboard')

@section('title')
    Listado 1x10
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="float-right">
                    <a class="btn btn-person-1" href="{{ route('representante.index') }}"><i class="fa fa-light fa-circle-left"></i> {{ __('Regresar') }}</a>
                </div>
                <div class="card card-person-1">
                   
                    <div class="card-header">
                        <div class="form-group text-center">
                            <strong>{{ $representante->nombres }}</strong>
                            
                        </div>
                    </div>

                    <div class="card-body row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <strong>Cedula:</strong>
                                {{ $representante->cedula }}
                            </div>
                            
                            <div class="form-group">
                                <strong>Telefono:</strong>
                                {{ $representante->telefono }}
                            </div>
                            <div class="form-group">
                                <strong>Telefono Alternativo:</strong>
                                {{ $representante->telefono_alternativo }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <strong>Parroquia:</strong>
                                {{ $representante->parroquia->nombre }}
                            </div>
                            <div class="form-group">
                                <strong>Centro:</strong>
                                {{ $representante->centro->nombre }}
                            </div>
                            @if($representante->dependencia)
                            <div class="form-group">
                                <strong>Dependencia:</strong>
                                {{ $representante->dependencia->nombre}}
                            </div>                                                        
                            @endif                        
                            @if($representante->coordinacion)
                                <div class="form-group">
                                    <strong>Coordinacion:</strong>
                                    {{ $representante->coordinacion->nombre}}
                                </div>                                                        
                            @endif                        

                        </div>                      
                        
                    </div>
                </div>
            </div>
            @include('integrante.index')
        </div>
    </section>
@endsection
