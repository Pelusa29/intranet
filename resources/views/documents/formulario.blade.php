@extends('templates.main')
@section('title',"Documentos")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-body text-center">
                <div class="panel-heading">
                    <h3>Documentos {{ $documento->descripcion}}</h3>
                </div>
                <div class="row demo-nifty-panel">
                    <div class="col-sm-8 col-md-offset-2">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1 class="panel-title">Autor: {{ $documento->autor }}</h1>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="Descripcion" class="col-sm-3 control-label"><p class="text-bold text-main text-sm">Descripción</p></label>
                                            <div class="col-sm-6">
                                                {{ $documento->descripcion}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="version" class="col-sm-3 control-label"><p class="text-bold text-main text-sm">Versión</p></label>
                                            <div class="col-sm-6">
                                                {{ $documento->version}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="sede" class="col-sm-3 control-label"><p class="text-bold text-main text-sm">Sede</p></label>
                                            <div class="col-sm-6">
                                                {{ $documento->sede}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="area" class="col-sm-3 control-label"><p class="text-bold text-main text-sm">Área</p></label>
                                            <div class="col-sm-6">
                                                {{ $documento->area}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="autor" class="col-sm-3 control-label"><p class="text-bold text-main text-sm">Autor</p></label>
                                            <div class="col-sm-6">
                                                {{ $documento->autor}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fecha_elaboracion" class="col-sm-3 control-label"><p class="text-bold text-main text-sm">Fecha Elaboración</p></label>
                                            <div class="col-sm-6">
                                                {{ $documento->fecha_elaboracion }}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="panel panel-bordered panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">>> Listado de Drivers</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <h4 class="panel-title pull-left"><b>@if($documento->title_driver){{ $documento->title_driver }} @else {{ 'Sin Titulo' }} @endif<b></h4>
                                            </div>
                                            <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <th class="text-center">Descripción</th>
                                                    <th class="text-center">Windows XP</th>
                                                    <th class="text-center">Windows 10</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($documento->listDivers as $driver)
                                                    <tr>
                                                        <td>{{ $driver->name }}</td>
                                                        <td>{{ $driver->so_xp }}</td>
                                                        <td>{{ $driver->so_diez }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-4">
                                        <a href="{{route('document')}}" class="btn btn-warning">Regresar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection