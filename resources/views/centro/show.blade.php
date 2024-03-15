@extends('layouts.app')

@section('template_title')
    {{ $centro->name ?? __('Show') . " " . __('Centro') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Centro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('centros.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $centro->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Parroquia Id:</strong>
                            {{ $centro->parroquia_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
