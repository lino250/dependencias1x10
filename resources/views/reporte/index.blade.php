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
                                <div class="row">
                                @if (Auth::user()->dependencia)
                                    @php
                                        $idDependencia = Auth::user()->dependencia->id;
                                    @endphp
                                    <div class="form-group col-6">                                        
                                        {{ Form::hidden('dependencia_id', $idDependencia, ['class' => 'form-control' . ($errors->has('dependencia_id') ? ' is-invalid' : ''), 'placeholder' => 'Dependencia']) }}
                                    </div>  
                                    <div class="form-group col-12">
                                        {{ Form::label('coordinacion_id', 'Coordinacion') }}
                                        {{ Form::select('coordinacion_id', $coordinaciones, null, ['class' => 'form-control' . ($errors->has('coordinacion_id') ? ' is-invalid' : ''), 'placeholder' => 'Coordinacion Id']) }}
                                        {!! $errors->first('coordinacion_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                                                     
                                @else

                                    <div class="form-group col-6">
                                        {{ Form::label('dependencia_id', 'Dependencia') }}
                                        {{ Form::select('dependencia_id', $dependencias, ['class' => 'form-control' . ($errors->has('dependencia_id') ? ' is-invalid' : ''), 'placeholder' => 'Dependencia Id']) }}
                                        {!! $errors->first('dependencia_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group col-12">
                                        {{ Form::label('coordinacion_id', 'Coordinacion') }}
                                        {{ Form::select('coordinacion_id', $coordinaciones, null, ['class' => 'form-control' . ($errors->has('coordinacion_id') ? ' is-invalid' : ''), 'placeholder' => 'Coordinacion Id']) }}
                                        {!! $errors->first('coordinacion_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                @endif
                       
                                </div>
                                <button id="btnSearch" class="btn btn-person-1" type="submit">Buscar<i class="fa text-white fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
