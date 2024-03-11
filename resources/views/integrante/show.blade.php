@extends('layouts.app')

@section('template_title')
    {{ $integrante->name ?? __('Show') . " " . __('Integrante') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Integrante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('integrantes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cedula:</strong>
                            {{ $integrante->cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $integrante->nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $integrante->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $integrante->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono Alternativo:</strong>
                            {{ $integrante->telefono_alternativo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
