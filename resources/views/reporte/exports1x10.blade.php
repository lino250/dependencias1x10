<table>
    <thead>
        <tr>
        </tr>
       <!-- <tr>
            <th colspan="2" style="text-align: center; font-weight: bold; font-size: 5px;">
                <img src="{{ public_path('img/AlcalCumana.png') }}" alt="Logo" style="max-width: 20px;max-height: 20px;">
            </th>
        </tr>-->
        <tr>
            <th colspan="8" style="text-align: center; font-weight: bold; font-size: 16px;">
                <h2>República Bolivariana de Venezuela</h2>
            </th>
        </tr>
        <tr>
            <th colspan="8" style="text-align: center; font-weight: bold; font-size: 16px;">
                <h2>Alcaldía Bolivariana del Municipio Sucre</h2>
            </th>
        </tr>
        <tr>
            <th colspan="8" style="text-align: center; font-weight: bold; font-size: 16px;">
                <h2>Listado de 1x10 (por dependencia).</h2>
            </th>
        </tr>
        <tr>
        </tr>
        <tr >
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 200%;">Cédula Rep.</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 350%;">Nombres y Apellidos Rep.</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 250%;">Teléfono Rep.</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 180%;">Dependencia</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 180%;">Coordinación</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 200%;">Parroquia</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 300%;">Centro de Votación</th>
            {{--  <th style="text-align: center; font-weight: bold; font-size: 12px;width: 100%;">Nro</th>--}}
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 200%;">Cédula Integrante</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 250%;">Nombres Integrante</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 250%;">Apellidos Integrante</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 250%;">Teléfono Integrante</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 250%;">Parroquie Integrante</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 300%;">Centro Votación Integrante</th>
  
            
        </tr>
    </thead>
    <tbody>
        
     @if(session()->has('integrantes1x10') && !empty(session('integrantes1x10')))
        @php $i = 0; @endphp
        @foreach (session('integrantes1x10') as $resp) 
            <tr>
                <td>{{$resp['cedula_rep']}}</td>
                <td>{{$resp['nombre_rep']}}</td>
                <td>{{$resp['telefono_rep']}}</td>
                <td>{{$resp['dependencia']}}</td> 
                <td>{{$resp['coordinacion']}}</td> 
                <td>{{$resp['parroquia_rep']}}</td> 
                <td>{{$resp['centro_rep']}}</td> 
               {{-- <td>{{ ++$i }}</td>--}}
                <td>{{$resp['cedula_int']}}</td>
                <td>{{$resp['nombre_int']}}</td>
                <td>{{$resp['apellido_int']}}</td>
                <td>{{$resp['telefono_int']}}</td>
                <td>{{$resp['parroquia_int']}}</td> 
                <td>{{$resp['centro_int']}}</td> 
            </tr>                                 
        @endforeach
       
    @else
        <tr>
            <td colspan="7">No hay resultados para mostrar.</td>
        </tr>
    @endif
      {{--  @php $i = 0; @endphp                                  
        @foreach (session('resultadosBusqueda') as $resp) 
                                                    
            <tr>
                <td>{{$resp->cedula_rep}}</td>
                <td>{{$resp->nombre_rep}}</td>
                <td>{{$resp->telefono_rep}}</td> 
                <td>{{ ++$i }}</td>
                <td>{{$resp->cedula_int}}</td>
                <td>{{$resp->nombre_int}}</td>
                <td>{{$resp->telefono_int}}</td> 

            </tr>                                       
        @endforeach
       
         {{--@if (!empty($resultadosBusqueda))
             @php $i = 0; @endphp
             @foreach ($resultadosBusqueda as $resp) 
                <tr>
                <td>{{$resp['cedula_rep']}}</td>
                <td>{{$resp['nombre_rep']}}</td>
                <td>{{$resp['telefono_rep']}}</td> 
                <td>{{ ++$i }}</td>
                <td>{{$resp['cedula_int']}}</td>
                <td>{{$resp['nombre_int']}}</td>
                <td>{{$resp['telefono_int']}}</td> 
                </tr>                                       
            @endforeach
        @else
            <tr>
                <td colspan="7">No hay resultados para mostrar.</td>
            </tr>
        @endif--}}

                                   
    </tbody>
</table>