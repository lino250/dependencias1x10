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
            <th colspan="25" style="text-align: center; font-weight: bold; font-size: 16px;">
                <h2>República Bolivariana de Venezuela</h2>
            </th>
        </tr>
        <tr>
            <th colspan="25" style="text-align: center; font-weight: bold; font-size: 16px;">
                <h2>Alcaldía Bolivariana del Municipio Sucre</h2>
            </th>
        </tr>
        <tr>
            <th colspan="25" style="text-align: center; font-weight: bold; font-size: 16px;">
                <h2>Listado de Representantes de 1x10 (por dependencia).</h2>
            </th>
        </tr>
        <tr>
        </tr>
        <tr >
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 100%;">Nro</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 150%;">Cédula</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 400%;">Nombres y Apellidos</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width: 180%;">Teléfono</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width:180px;">Parroquia</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width:400px;">Centro de Votación</th> 
            <th style="text-align: center; font-weight: bold; font-size: 12px;width:400px;">Dependencia</th>
            <th style="text-align: center; font-weight: bold; font-size: 12px;width:400px;">Coordinación</th>    
            
        </tr>
    </thead>
    <tbody>
        
        @php $i = 0; @endphp                                  
        @foreach (session('representantes') as $rep) 
                                                    
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{$rep->cedula_representante}}</td>
                <td>{{$rep->nombre_representante}}</td>
                <td>{{$rep->telefono_representante}}</td> 
               <td>{{$rep->nombre_parroquia}}</td>
                <td>{{$rep->nombre_centro}}</td>
                <td>{{$rep->nombre_dependencia}}</td>
                <td>{{$rep->nombre_coordinacion}}</td>
            </tr>                                       
        @endforeach
                                   
    </tbody>
</table>