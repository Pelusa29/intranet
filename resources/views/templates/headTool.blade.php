<div class="navbar-content">
    <ul class="nav navbar-top-links">
        <li id="dropdown-user" class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                <span class="ic-user pull-right">
                    <i class="demo-pli-male"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                <ul class="head-list">
                    @if (Route::has('login'))
                        @auth
                            <li>
                                <a href="{{ url('/') }}"><i class="demo-pli-home icon-lg icon-fw"></i>Home</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="demo-psi-arrow-left-2 icon-lg icon-fw"></i>Logout</a>
                                <form class="form-inline" id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <!--<input type="submit" value="Logout">-->
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="{{ url('login') }}"><i class="demo-pli-unlock icon-lg icon-fw"></i>login</a>
                            </li>
                            @if(Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}"><i class="demo-pli-unlock icon-lg icon-fw"></i>Registro</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </li>
    </ul>
</div>