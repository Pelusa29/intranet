@extends('templates.main')
@section('title',"Documentos")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-body text-center">
                <div class="panel-heading">
                    <h3>Editar Documento</h3>
                </div>
                <div class="row demo-nifty-panel">
                    <div class="col-sm-8 col-md-offset-2">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1 class="panel-title">Formulario Documento</h1>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="{{route('update', $documento->id)}}" enctype="multipart/form-data">
                                @csrf
                                    <div class="panel-body">
                                        <div class="form-group @error('descripcion') has-error @enderror">
                                            <label for="descripcion" class="col-sm-3 control-label">Descripción</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="descripcion" placeholder="Descripcion" class="form-control" id="descripcion" value="{{ $documento->descripcion }}" >
                                                @error('descripcion')
                                                    <span class="help-block" data-bv-validator="notEmpty" data-bv-result="INVALID" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group @error('version') has-error @enderror">
                                            <label for="version" class="col-sm-3 control-label">Version</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="version" placeholder="Version" class="form-control" id="version" value="{{ $documento->version }}">
                                                @error('version')
                                                    <span class="help-block" data-bv-validator="notEmpty" data-bv-result="INVALID" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group @error('sede') has-error @enderror">
                                            <label for="sede" class="col-sm-3 control-label">Sede</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="sede" placeholder="Sede" class="form-control" id="sede" value="{{ $documento->sede }}">
                                                @error('sede')
                                                    <span class="help-block" data-bv-validator="notEmpty" data-bv-result="INVALID" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group @error('area') has-error @enderror">
                                            <label for="area" class="col-sm-3 control-label">Área</label>
                                            <div class="col-sm-6">
                                                <input type="area" name="area" placeholder="Área" class="form-control" id="area" value="{{ $documento->area}}">
                                                @error('area')
                                                    <span class="help-block" data-bv-validator="notEmpty" data-bv-result="INVALID" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group @error('autor') has-error @enderror">
                                            <label for="autor" class="col-sm-3 control-label">Autor</label>
                                            <div class="col-sm-6">
                                                <input type="autor" name="autor" placeholder="Autor" class="form-control" id="autor" value="{{ $documento->autor }}">
                                                @error('autor')
                                                    <span class="help-block" data-bv-validator="notEmpty" data-bv-result="INVALID" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group @error('fecha_elaboraxion') has-error @enderror">
                                            <label for="fecha_elaboracion" class="col-sm-3 control-label">Fecha Elaboración</label>
                                            <div class="col-sm-6">
                                                <input type="date" name="fecha_elaboracion" placeholder="Fecha Elaboración" class="form-control" id="fecha_elaboracion" value="{{ $documento->fecha_elaboracion}}">
                                                @error('fecha_elaboracion')
                                                    <span class="help-block" data-bv-validator="notEmpty" data-bv-result="INVALID" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group @error('documento') has-error @enderror">
                                            <div class="bord-top pad-ver">
                                                <label class="btn btn-success">
                                                    <i class="fa fa-image"></i>Agregar Archivo<input type="file" style="display: none;"  name="documento">
                                                </label>
                                                <div class="row">
                                                    @if($documento->documento){{$documento->documento}} @else {{'No hay documentos'}} @endif
                                                </div>
                                                @error('documento')
                                                        <span class="help-block" data-bv-validator="notEmpty" data-bv-result="INVALID" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group @error('title_driver') has-error @enderror">
                                            <label for="title_driver" class="col-sm-3 control-label">Nombre de Lista</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="title_driver" placeholder="Nombre de Lista" class="form-control" id="title_driver" value="{{ $documento->title_driver}}">
                                                @error('title_driver')
                                                    <span class="help-block" data-bv-validator="notEmpty" data-bv-result="INVALID" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-4">
                                                <button class="btn btn-mint" type="submit">Actualizar</button>
                                                <a href="{{route('document')}}" class="btn btn-warning">Cancelar</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection