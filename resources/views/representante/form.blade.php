<div class="box box-info padding-1">
    <div class="box-body">
        <span>id: {{ Auth::user()->dependencia->id }}</span>
                        
        
        <div class="form-group">
            {{ Form::label('cedula') }}
            {{ Form::text('cedula', $representante->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'placeholder' => 'Cedula']) }}
            {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombres') }}
            {{ Form::text('nombres', $representante->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
            {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $representante->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono_alternativo') }}
            {{ Form::text('telefono_alternativo', $representante->telefono_alternativo, ['class' => 'form-control' . ($errors->has('telefono_alternativo') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Alternativo']) }}
            {!! $errors->first('telefono_alternativo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('centro_id') }}
            {{ Form::select('centro_id',$centros ,$representante->centro_id, ['class' => 'form-control' . ($errors->has('centro_id') ? ' is-invalid' : ''), 'placeholder' => 'Centro Id']) }}
            {!! $errors->first('centro_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('parroquia_id') }}
            {{ Form::select('parroquia_id',$parroquias, $representante->parroquia_id, ['class' => 'form-control' . ($errors->has('parroquia_id') ? ' is-invalid' : ''), 'placeholder' => 'Parroquia Id']) }}
            {!! $errors->first('parroquia_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dependencia_id') }}
            {{ Form::select('dependencia_id',$dependencias, $representante->dependencia_id, ['class' => 'form-control' . ($errors->has('dependencia_id') ? ' is-invalid' : ''), 'placeholder' => 'Dependencia Id']) }}
            {!! $errors->first('dependencia_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('coordinacion_id') }}
            {{ Form::select('coordinacion_id',$coordinaciones, $representante->coordinacion_id, ['class' => 'form-control' . ($errors->has('coordinacion_id') ? ' is-invalid' : ''), 'placeholder' => 'Coordinacion Id']) }}
            {!! $errors->first('coordinacion_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>