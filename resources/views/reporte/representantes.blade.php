@extends('reporte.index')
@section('title')
Reporte Representantes
@endsection

@section('content')


<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>
                <th>No</th>

                <th>Cedula</th>
                <th>Nombres</th>
                <th>Telefono</th>
                <th>Telefono Alternativo</th>
                <th>Centro Id</th>
                <th>Parroquia Id</th>
                {{-- <th>Dependencia Id</th>
                <th>Coordinacion Id</th> --}}

                <th></th>
            </tr>
        </thead>
        <tbody>


        </tbody>
    </table>
</div>

    
@endsection
