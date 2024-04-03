<table>
    <thead>
    <tr>
        <th>Nro</th>
        <th>Cedula</th>
        <th>Nombres y Apellidos</th>
        <th>Telefono</th>
        <th>Parroquia</th>
        <th>Centro de Votacion</th> 
        <th>Dependencia</th>
        <th>Coordinacion</th>    
        
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