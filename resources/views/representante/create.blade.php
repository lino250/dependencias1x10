@extends('layouts.dashboard')

@section('template_title')
    {{ __('Create') }} Representante
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Representante</span>                        
                        @if(Auth::user()->dependencia)
                        <span>Dependencia: {{ Auth::user()->dependencia->nombre }}</span>
                        @else
                        <span>No hay dependencia asociada</span>
                        @endif
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('representante.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('representante.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
