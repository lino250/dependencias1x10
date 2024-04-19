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
                <h2>Listado de Representantes de 1x10 (por dependencia).</h2>
            </th>
        </tr>
        <tr>
        </tr>
        <tr >
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 150%;">Cédula Representante</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 400%;">Nombres y Apellidos Representante</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 180%;">Teléfono Representante</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 100%;">Nro</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 150%;">Cédula Integrante</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 400%;">Nombres y Apellidos Integrante</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 180%;">Teléfono Integrante</th>
  
            
        </tr>
    </thead>
    <tbody>
        
        @php $i = 0; @endphp                                  
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
                                   
    </tbody>
</table>