@extends('layouts.dashboard')

@section('title')
    Crear Integrante
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-person-1">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Integrante</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" id="integranteForm" action="{{ route('integrante.store',$id) }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('integrante.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
