{{ csrf_field() }}

    <div class="box form-person-1  box-info padding-1">

        <div class="box-body">
            <!-- Aquí agregamos el div para mostrar el mensaje -->
            <div class="form-group col-12" id="cedulaStatus"></div>
            <input type="hidden" id="modoEdicion" value="{{ $modoEdicion ? 'true' : 'false' }}">
            @isset($cedula_rep)
            <input type="hidden" id="CedulaRepresentante" value="{{ $cedula_rep }}">
            
             @endisset

            <div class="row">
                {{--  <div class="form-group col-6">
                    {{ Form::label('cedula') }}
                    {{ Form::text('cedula', $integrante->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'placeholder' => 'Cedula']) }}
                    {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
                    
                </div>--}}
    
                @isset($cedula_rep)

                    <div class="form-group col-6">
                    {{ Form::label('cedula') }}
                    {{ Form::text('cedula', $integrante->cedula, [
                        'id' => 'cedula', // Agrega el ID al input
                        'class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 
                        'placeholder' => 'Cedula',

                    ]) }}
                   
                    {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                @else
                <div class="form-group col-6">
                    {{ Form::label('cedula') }}
                    {{ Form::hidden('cedula', $integrante->cedula) }}
                    {{ Form::text('cedula', $integrante->cedula, [
                        'id' => 'cedula', // Agrega el ID al input
                        'class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 
                        'placeholder' => 'Cedula',
                        'disabled' => true // Agregar el atributo disabled

                    ]) }}
                   
                    {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            @endisset
               
            
               
                <div class="form-group col-6">
                        {{ Form::label('nombres') }}
                        {{ Form::text('nombres', $integrante->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
                        {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    
                    <div class="form-group col-6">
                        {{ Form::label('apellidos') }}
                        {{ Form::text('apellidos', $integrante->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
                        {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('telefono') }}
                        {{ Form::text('telefono', $integrante->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                        {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('telefono_alternativo') }}
                        {{ Form::text('telefono_alternativo', $integrante->telefono_alternativo, ['class' => 'form-control' . ($errors->has('telefono_alternativo') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Alternativo']) }}
                        {!! $errors->first('telefono_alternativo', '<div class="invalid-feedback">:message</div>') !!}
                    </div>    
                    <div class="form-group col-6">
                        {{ Form::label('parroquia_id','Parroquia') }}
                        {{ Form::select('parroquia_id',$parroquias, $integrante->parroquia_id, ['class' => 'form-control' . ($errors->has('parroquia_id') ? ' is-invalid' : ''), 'placeholder' => 'Parroquia Id']) }}
                        {!! $errors->first('parroquia_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('centro_id','Centro') }}
                        {{ Form::select('centro_id',$centros, $integrante->centro_id, ['class' => 'form-control' . ($errors->has('centro_id') ? ' is-invalid' : ''), 'placeholder' => 'Centro Id']) }}
                        {!! $errors->first('centro_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>                    
            
            </div>         
           
        </div>
        <div class="box-footer text-end">
            <button type="submit" id="submitButton" class="btn btn-person-1">{{ __('Enviar') }}</button>
        </div>
    </div>


{{--<form method="POST" action="{{ route('integrante.store',$id) }}"  role="form" enctype="multipart/form-data">
    @csrf

    @include('integrante.form')
    <div class="box form-person-1  box-info padding-1">

        <div class="box-body">
           
            <div class="row">
                 <div class="form-group col-6">
                    {{ Form::label('cedula') }}
                    {{ Form::text('cedula', $integrante->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'placeholder' => 'Cedula']) }}
                    {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
                    
                </div>
    
                
                <div class="form-group col-6">
                    {{ Form::label('cedula') }}
                    {{ Form::text('cedula', $integrante->cedula, [
                        'id' => 'cedula', // Agrega el ID al input
                        'class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 
                        'placeholder' => 'Cedula',
                        'onblur' => 'buscarIntegrante(this.value)' // Agrega el evento onchange
                    ]) }}
                    {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            
               
                <div class="form-group col-6">
                        {{ Form::label('nombres') }}
                        {{ Form::text('nombres', $integrante->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
                        {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    
                    <div class="form-group col-6">
                        {{ Form::label('apellidos') }}
                        {{ Form::text('apellidos', $integrante->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
                        {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('telefono') }}
                        {{ Form::text('telefono', $integrante->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                        {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('telefono_alternativo') }}
                        {{ Form::text('telefono_alternativo', $integrante->telefono_alternativo, ['class' => 'form-control' . ($errors->has('telefono_alternativo') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Alternativo']) }}
                        {!! $errors->first('telefono_alternativo', '<div class="invalid-feedback">:message</div>') !!}
                    </div>    
                    <div class="form-group col-6">
                        {{ Form::label('parroquia_id','Parroquia') }}
                        {{ Form::select('parroquia_id',$parroquias, $integrante->parroquia_id, ['class' => 'form-control' . ($errors->has('parroquia_id') ? ' is-invalid' : ''), 'placeholder' => 'Parroquia Id']) }}
                        {!! $errors->first('parroquia_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('centro_id','Centro') }}
                        {{ Form::select('centro_id',$centros, $integrante->centro_id, ['class' => 'form-control' . ($errors->has('centro_id') ? ' is-invalid' : ''), 'placeholder' => 'Centro Id']) }}
                        {!! $errors->first('centro_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    
            
            </div>
          
           
           
        </div>
        <div class="box-footer text-end">
            <button type="submit" class="btn btn-person-1">{{ __('Enviar') }}</button>
        </div>
    </div>
</form>--}}
