@extends('templates.main')
@section('title',"Bienvenido")
@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-body text-center">
                <div class="panel-heading">
                    <h3>Registro Usuarios</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{route('register')}}">
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
                            <div class="form-group @error('email') has-error @enderror">
                                <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" name="email" placeholder="Email" class="form-control" id="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="help-block" data-bv-validator="notEmpty" data-bv-result="INVALID" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group @error('username') has-error @enderror">
                                <label for="username" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-6">
                                    <input type="text" name="username" placeholder="Username" class="form-control" id="username" value="{{ old('username') }}">
                                    @error('username')
                                        <span class="help-block" data-bv-validator="notEmpty" data-bv-result="INVALID" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group @error('password') has-error @enderror"">
                                <label for="password" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" name="password" placeholder="Password" class="form-control @error('password') has-error @enderror" id="password">
                                    @error('password')
                                        <span class="help-block" data-bv-validator="notEmpty" data-bv-result="INVALID" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">Confirmar Password</label>
                                <div class="col-sm-6">
                                    <input type="password" name="password_confirmation" placeholder="Password" class="form-control" id="password_confirmation">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <button class="btn btn-mint" type="submit">Guardar</button>
                                    <button class="btn btn-warning" type="reset">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection