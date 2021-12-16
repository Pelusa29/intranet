@extends('templates.main')
@section('title',"Documentos")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-body text-center">
                <div class="panel-heading">
                    <h3>Drivers</h3>
                </div>
                <div class="row demo-nifty-panel">
                    <div class="col-sm-8 col-md-offset-2">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1 class="panel-title">Formulario Documento</h1>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="{{route('storeDriver')}}" enctype="multipart/form-data">
                                @csrf
                                    <div class="panel-body">
                                        <div class="form-group @error('name') has-error @enderror">
                                            <label for="name" class="col-sm-3 control-label">Nombre</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="name" placeholder="Nombre" class="form-control @error('name') has-error @enderror" id="name" value="{{ old('name') }}" >
                                                @error('name')
                                                    <span class="help-block" data-bv-validator="notEmpty" data-bv-result="INVALID" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group @error('so_xp') has-error @enderror">
                    			        <div class="bord-top pad-ver">
                                            <label class="btn btn-success">
                                                <i class="fa fa-image"></i>Agregar Driver XP<input type="file" style="display: none;"  name="so_xp">
                                            </label>
                                            @error('so_xp')
                                                    <span class="help-block" data-bv-validator="notEmpty" data-bv-result="INVALID" role="alert">
                                                        {{ $message }}
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group @error('so_diez') has-error @enderror">
                    			        <div class="bord-top pad-ver">
                                            <label class="btn btn-success">
                                                <i class="fa fa-image"></i>Agregar Driver windows 10<input type="file" style="display: none;"  name="so_diez">
                                            </label>
                                            @error('so_diez')
                                                    <span class="help-block" data-bv-validator="notEmpty" data-bv-result="INVALID" role="alert">
                                                        {{ $message }}
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-4">
                                                <button class="btn btn-mint" type="submit">Guardar</button>
                                                <a href="{{route('document')}}" class="btn btn-warning">Regresar a Documentos</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="demo-custom-toolbar2" class="table-toolbar-left">
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
                                    <tr>
                                        <td class="text-center">Driver de RED</td>
                                        <td class="text-center">file</td>
                                        <td class="text-center">file donwload</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Driver de RED</td>
                                        <td class="text-center">file</td>
                                        <td class="text-center">file donwload</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Driver de RED</td>
                                        <td class="text-center">file</td>
                                        <td class="text-center">file donwload</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Driver de RED</td>
                                        <td class="text-center">file</td>
                                        <td class="text-center">file donwload</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Driver de RED</td>
                                        <td class="text-center">file</td>
                                        <td class="text-center">file donwload</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Driver de RED</td>
                                        <td class="text-center">file</td>
                                        <td class="text-center">file donwload</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Driver de RED</td>
                                        <td class="text-center">file</td>
                                        <td class="text-center">file donwload</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Driver de RED</td>
                                        <td class="text-center">file</td>
                                        <td class="text-center">file donwload</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Driver de RED</td>
                                        <td class="text-center">file</td>
                                        <td class="text-center">file donwload</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Driver de RED</td>
                                        <td class="text-center">file</td>
                                        <td class="text-center">file donwload</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Driver de RED</td>
                                        <td class="text-center">file</td>
                                        <td class="text-center">file donwload</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
@push('scripts')
   
@endpush