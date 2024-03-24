@extends('layouts.dashboard')
@section('template_title')
    {{ __('Update') }} Integrante
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

                            @include('integrante.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
