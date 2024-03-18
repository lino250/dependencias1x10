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
                        @if(Auth::user()->dependencia)
                        <span>Dependencia: {{ Auth::user()->dependencia->nombre }}</span>
                        @else
                        <span>No hay dependencia asociada</span>
                        @endif

                        
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
                            <strong>Parroquia:</strong>
                            {{ $representante->parroquia->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Centro:</strong>
                            {{ $representante->centro->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Dependencia:</strong>
                            {{ $representante->dependencia->nombre}}
                        </div>
                        <div class="form-group">
                            <strong>Coordinacion:</strong>
                            {{ $representante->coordinacion->nombre}}
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @include('integrante.index')
    </section>
@endsection
