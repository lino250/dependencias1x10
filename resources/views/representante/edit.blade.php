@extends('layouts.dashboard')

@section('title')
    Editar Representante
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-person-1">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Representante</span>
                        {{--<span>Depedencia: {{ Auth::user()->dependencia->nombre }}</span>--}}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('representante.update', $representante->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('representante.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
