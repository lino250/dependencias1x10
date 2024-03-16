@extends('layouts.dashboard')

@section('template_title')
    {{ $representante->name ?? __('Show') . " " . __('Representante') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Regresar') }} Representante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('representante.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cedula:</strong>
                            {{ $representante->cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $representante->nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $representante->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono Alternativo:</strong>
                            {{ $representante->telefono_alternativo }}
                        </div>
                        <div class="form-group">
                            <strong>Centro Id:</strong>
                            {{ $representante->centro_id }}
                        </div>
                        <div class="form-group">
                            <strong>Parroquia Id:</strong>
                            {{ $representante->parroquia_id }}
                        </div>
                        <div class="form-group">
                            <strong>Dependencia Id:</strong>
                            {{ $representante->dependencia_id }}
                        </div>
                        <div class="form-group">
                            <strong>Coordinacion Id:</strong>
                            {{ $representante->coordinacion_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @include('integrante.index')
    </section>
@endsection
