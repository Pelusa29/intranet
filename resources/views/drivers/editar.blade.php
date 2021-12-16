@extends('templates.main')
@section('title',"Documentos")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-body text-center">
                <div class="panel-heading">
                    <h3>Drivers</h3>
                </div>
                <div class="row">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-error">
                            {{session('error')}}
                        </div>
                    @endif
                </div>
                <div class="row demo-nifty-panel">
                    <div class="col-sm-8 col-md-offset-2">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1 class="panel-title">Formulario Edición Drivers</h1>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="{{route('updated', $documento->id)}}" enctype="multipart/form-data">
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
                @if($drivers->count() > 0)
                    <div id="demo-custom-toolbar2" class="col-sm-8 col-md-offset-2">
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
                                        <th class="text-center">Acción</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($documento->listDivers as $driver)
                                        <tr>
                                            <td>{{ $driver->name }}</td>
                                            <td>@if ($driver->so_xp != null)
                                                <button class="btn btn-primary btn-circle"><i class="demo-psi-file icon-lg"></i></button>
                                                 @else
                                                 @endif
                                            <td>
                                                @if ($driver->so_diez != null)
                                                <button class="btn btn-primary btn-circle"><i class="demo-psi-file icon-lg"></i></button>
                                                 @else
                                                 @endif
                                            </td>
                                            <td class="pull-center">
                                                <button type="button" class="btn btn-danger btn-icon" id="{{$driver->id}}" onclick="event.preventDefault();">
                                                    <i class="demo-psi-remove icon-lg"></i>
                                                </button>
                                                <form class="form-horizontal" method="POST" action="{{route('destroy', $driver->id)}}" id="delete-document-{{$driver->id}}" style="display: none;">
                                                    @csrf
                                                    @method("DELETE")
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Eliminar</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <div id="deleteDocumentModal" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Eliminar</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="documento_agregado" id="documento_agregado" />
                                                            <p>Desea Eliminar el Driver?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                                            <input type="submit" class="btn btn-primary" id="elimina" value="Eliminar">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @section('scripts')
        <script>
            (function() {
                $(function() {
                    
                    $(".btn-danger").on('click', function() {
                        $('#documento_agregado').val(this.id);
                        $('#deleteDocumentModal').modal();
                    });
                });

                $(document).on('click', '#elimina', function(){
                    let id_documento = $('#documento_agregado').val(); 
                        document.getElementById('delete-document-'+id_documento).submit();
                });
            }());
        </script>
    @stop
@endsection