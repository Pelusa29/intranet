<div class="cls-content">
    <div class="cls-content-sm panel">
        <div class="panel-body">
            <div class="mar-ver pad-btm">
                <h1 class="h4">INTRANE<b>T</b></h1>
            </div>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group @error('username') has-error @enderror">
                    <input type="text" class="form-control" name="username" id="username"placeholder="username">
                    @error('username')
                        <span class="help-block" data-bv-validator="notEmpty" data-bv-result="INVALID" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group @error('password') has-error @enderror">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    @error('password')
                        <span class="help-block" data-bv-validator="notEmpty" data-bv-result="INVALID" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Acceder</button>
            </form>
        </div>
    </div>
</div>
