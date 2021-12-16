@extends('templates.main')
@section('title',"Documentos")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-body text-center">
                <div class="panel-heading">
                    <h3>Documentos</h3>
                </div>
                <div class="row">
                    <div id="demo-custom-toolbar2" class="table-toolbar-left">
                        <a href="{{route('create')}}" class="btn btn-primary"><i class="btn-label demo-psi-add"></i> Agregar Documento</a>
                    </div>
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
                <div class="panel-body">
                    <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="min-desktop">Descripcion</th>
                                <th class="min-desktop">Versión</th>
                                <th class="min-desktop">Sede</th>
                                <th class="min-desktop">Area</th>
                                <th class="min-desktop">Fecha Elaboración</th>
                                <th class="min-desktop">Archivo</th>
                                <th class="min-desktop">Asignar Drivers</th>
                                <th class="min-desktop">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documentos as $documento)
                            <tr>
                                <td>{{ $documento->descripcion }}</td>
                                <td>{{ $documento->version }}</td>
                                <td>{{ $documento->sede }}</td>
                                <td>{{ $documento->area }}</td>
                                <td>{{ $documento->fecha_elaboracion }}</td>
                                <td>@if ($documento->documento != null)
                                   <button class="btn btn-primary btn-circle"><i class="demo-psi-file icon-lg"></i></button>
                                    @else                  
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('editard',$documento->id) }}" class="btn btn-mint btn-icon"><i class="demo-pli-list-view icon-lg"></i></a>
                                </td>
                                <td>
                                    
                                    <!--<a href="#" class="btn btn-danger btn-icon" id="elimina"><i class="demo-psi-remove icon-lg"></i></a>-->
                                    <button type="button" class="btn btn-danger btn-icon" id="{{$documento->id}}" onclick="event.preventDefault();">
                                        <i class="demo-psi-remove icon-lg"></i>
                                    </button>
                                    <form class="form-horizontal" method="POST" action="{{route('destroy', $documento->id)}}" id="delete-document-{{$documento->id}}" style="display: none;">
                                        @csrf
                                        @method("DELETE")
                                        <div class="modal-header">
                                            <h4 class="modal-title">Eliminar</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Desea Usted Eliminar el documento</p>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                            <input type="submit" class="btn btn-danger" value="Eliminar">
                                        </div>
                                    </form>
                                    <a href="{{ route('editar', $documento->id) }}" class="btn btn-mint btn-icon"><i class="demo-psi-pen-5 icon-lg"></i></a>
                                    <a href="{{route('show', $documento->id)}}" class="btn btn-mint btn-icon"><i class="demo-pli-information icon-lg"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            <!--DElete form modal-->
                            <div id="deleteDocumentModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Eliminar</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="documento_agregado" id="documento_agregado" />
                                                <p>Desea Eliminar el Documento?</p>
                                                <p>Con esto usted Eliminará todos los Archivos relacionados con el documento, tanto Drivers cómo el documento en sí.</p>
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