<div class="box form-person-1 box-info padding-1">
    <div class="box-body">
      {{--  @if(Auth::user()->dependencia)
        <span>Dependencia: {{ Auth::user()->dependencia->nombre }}</span>
        <span>Dependencia: {{ Auth::user()->dependencia->id }}</span>

        @else
        <span>No hay dependencia asociada</span>
        @endif
                  --}}   
                  @isset($cedula)
                  <div class="form-group col-6">
                      {{ Form::label('cedula') }}
                      {{ Form::hidden('cedula', $cedula, [
                        'id' => 'cedula', // Agrega el ID al campo oculto
                        ]) }}
                      {{ Form::text('cedula_mostrar', $cedula, [
                          'id' => 'cedula_mostar', // Agrega el ID al input
                          'class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 
                          'placeholder' => 'Cedula',
                          'disabled' => true // Agregar el atributo disabled

                      ]) }}
                      {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
                  </div>
              @else
                  <div class="form-group col-6">
                      {{ Form::label('cedula') }}
                      {{ Form::text('cedula', $representante->cedula, [
                          'id' => 'cedula', // Agrega el ID al input
                          'class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 
                          'placeholder' => 'Cedula',
                          'disabled' => true // Agregar el atributo disabled
                      ]) }}
                      {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
                  </div>
              @endisset
{{--                   
<div class="form-group col-6">
            {{ Form::label('cedula') }}
            {{ Form::text('cedula', $representante->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'placeholder' => 'Ejm: 26566454']) }}
            {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
            </div>--}}
        <div class="row">
            <div class="form-group col-6">
                {{ Form::label('nombres') }}
                {{ Form::text('nombres', $representante->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Ejm: Felix Puerta', 'id' => 'nombresField']) }}

                {{--{{ Form::text('nombres', $representante->nombres, ['class' => 'form-control', 'id' => 'nombresField', 'placeholder' => 'Ejm: Felix Puerta']) }} --}} 
                {!! $errors->first('parroquia_id', '<div class="invalid-feedback">El campo Nombre es obligatorio.</div>') !!}
            </div>   
        <div class="form-group col-6">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $representante->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''),  'id' => 'telefValic', 'placeholder' => 'Ejm: 04125415656']) }}
            {!! $errors->first('parroquia_id', '<div class="invalid-feedback">El campo Telefono es obligatorio.</div>') !!}
        </div>
        <div class="form-group col-6">
            {{ Form::label('telefono_alternativo') }}
            {{ Form::text('telefono_alternativo', $representante->telefono_alternativo, [
                'id' => 'telefonoAlternativo',
                'class' => 'form-control' . ($errors->has('telefono_alternativo') ? ' is-invalid' : ''), 
                'id' => 'telefValic2',
                'placeholder' => 'Ejm: 04126589745'
            ]) }}
            {!! $errors->first('telefono_alternativo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if(Auth::user()->dependencia)
        @php
            $idDependencia = Auth::user()->dependencia->id;
        @endphp
        {{ Form::hidden('dependencia_id', $idDependencia, ['class' => 'form-control ' . ($errors->has('dependencia_id') ? ' is-invalid' : ''), 'placeholder' => 'Dependencia Id']) }}
       
        <div class="form-group col-6">
            {{ Form::label('coordinacion_id', 'Coordinacion') }}
            {{ Form::select('coordinacion_id', $coordinaciones, $representante->coordinacion_id, ['class' => 'form-control' . ($errors->has('coordinacion_id') ? ' is-invalid' : ''), 'placeholder' => 'Coordinacion']) }}
            {!! $errors->first('parroquia_id', '<div class="invalid-feedback">El campo Coordinación es obligatorio.</div>') !!}
        </div>
        @else
        <div class="form-group col-6">
            {{ Form::label('dependencia_id') }}
            {{ Form::select('dependencia_id',$dependencias,$representante->dependencia_id, ['class' => 'form-control' . ($errors->has('dependencia_id') ? ' is-invalid' : ''), 'placeholder' => 'Dependencia Id']) }}
            {!! $errors->first('parroquia_id', '<div class="invalid-feedback">El campo Dependencia es obligatorio.</div>') !!}
        </div>
      
        <div class="form-group col-6">
            {{ Form::label('coordinacion_id','Coordinacion') }}
            {{ Form::select('coordinacion_id',$coordinaciones,$representante->coordinacion_id, ['class' => 'form-control' . ($errors->has('coordinacion_id') ? ' is-invalid' : ''), 'placeholder' => 'Coordinacion Id']) }}
            {!! $errors->first('parroquia_id', '<div class="invalid-feedback">El campo Coordinación es obligatorio.</div>') !!}
        </div>
        @endif
       
        <div class="form-group col-6">
            {{ Form::label('parroquia_id','Parroquia') }}
            {{ Form::select('parroquia_id',$parroquias, $representante->parroquia_id, ['class' => 'form-control' . ($errors->has('parroquia_id') ? ' is-invalid' : ''), 'placeholder' => 'Parroquia Id']) }}
            {!! $errors->first('parroquia_id', '<div class="invalid-feedback">El campo Parroquia es obligatorio.</div>') !!}
        </div>
        <div class="form-group col-6">
            {{ Form::label('centro_id','Centro') }}
            {{ Form::select('centro_id',$centros ,$representante->centro_id, ['class' => 'form-control' . ($errors->has('centro_id') ? ' is-invalid' : ''), 'placeholder' => 'Centro Id']) }}
            {!! $errors->first('parroquia_id', '<div class="invalid-feedback">El campo Centro es obligatorio.</div>') !!}
        </div>
       
     
    </div>
    </div>

    <div class="box-footer text-end">
        <button type="submit" class="btn btn-person-1">{{ __('Enviar') }}</button>
    </div>
    <script src="{{ asset('js/validacionesRepres.js') }}"></script>

    <script>
        $(document).ready(function() {
    // Busca el campo de teléfono alternativo por su ID
    var telefonoAlternativoInput = $('#telefonoAlternativo');

    // Quita la validación del campo y lo hace opcional
    telefonoAlternativoInput.prop('required', false);
});

    </script>
</div>