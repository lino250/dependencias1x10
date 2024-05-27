@extends('layouts.dashboard')
@section('title')
  registrar voto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

     
                 
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('voto.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('voto.form')

                        </form>
                    </div>
            
            </div>
        </div>
    </section>
@endsection
