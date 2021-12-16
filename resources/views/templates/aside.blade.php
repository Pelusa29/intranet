<nav id="mainnav-container">
    <div id="mainnav">
        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">

                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap text-center">
                            <div class="pad-btm">
                                <img class="img-circle img-md" src="{{asset('img/profile-photos/2.png')}}" alt="Profile Picture">
                            </div>
                            <div class="box-block">
                                <p class="mnp-name">{{ ucfirst(auth()->user()->name) }}</p>
                                <span class="mnp-desc">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                        <div class="mainnav-widget">
                            <!-- Hide the content on collapsed navigation -->
                            <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                                <ul class="list-group">
                                    <li class="list-header pad-no mar-ver">Sesión</li>
                                    <li class="mar-btm">
                                        <span class="label label-primary pull-right">123456</span>
                                        <p><b>DNI</b></p>
                                    </li>
                                    <li class="mar-btm">
                                        <span class="label label-primary pull-right">ADMIN</span>
                                        <p><b>Cargo</b></p>
                                    </li>
                                    <li class="mar-btm">
                                        <span class="label label-primary pull-right">Sistemas</span>
                                        <p><b>Area</b></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <ul id="mainnav-menu" class="list-group">
            
                        <!--Category name-->
                        <li class="list-header">Administración</li>
            
                        <!--Menu list item-->
                        <li class="{{ (request()->is('document')) ? 'active-sub active mm-active' : 'active-sub' }}">
                            <a href="#">
                                <i class="demo-pli-gear"></i>
                                <span class="menu-title">Procesos</span>
                                <i class="arrow"></i>
                            </a>
            
                            <!--Submenu-->
                            <ul class="collapse in">
                                <li class="active-link active"><a href="{{ route('document') }}">Drivers</a></li>                                
                            </ul>
                        </li>
                        <li class="list-divider"></li>                          
                    </ul>    
                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>