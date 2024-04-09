@extends('layouts.dashboard')
@section('title')
   Editar Integrante
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-person-1">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Integrante</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('integrante.update', $integrante->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @if($modoEdicion)
                                <input type="hidden" id="modoEdicion" value="true">
                            @else
                                <input type="hidden" id="modoEdicion" value="false">
                            @endif

                            @include('integrante.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
