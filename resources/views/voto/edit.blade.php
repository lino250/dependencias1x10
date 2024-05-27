@extends('layouts.dashboard')
@section('title')
  Actualizar voto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                 
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('votos.update', $voto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('voto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
