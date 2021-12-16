@extends('templates.main')
@section('title',"Bienvenido")
@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-body text-center">
                <div class="panel-heading">
                    <h3>@if(Auth::user()) Bienvenido {{ ucfirst(auth()->user()->name) }} @endif</h3>
                </div>
                <div class="panel-body">
                    <p>Sistema Intranet para Manejo de Archivos</p>
                </div>
            </div>
        </div>
    </div>
@endsection