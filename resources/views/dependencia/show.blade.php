@extends('layouts.app')

@section('template_title')
    {{ $dependencia->name ?? __('Show') . " " . __('Dependencia') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Dependencia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('dependencias.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $dependencia->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $dependencia->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $dependencia->user_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
