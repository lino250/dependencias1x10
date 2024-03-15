@extends('layouts.app')

@section('template_title')
    {{ $coordinacion->name ?? __('Show') . " " . __('Coordinacion') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Coordinacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('coordinacions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $coordinacion->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Dependencia Id:</strong>
                            {{ $coordinacion->dependencia_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
