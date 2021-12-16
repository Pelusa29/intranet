<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Infra - @yield('title')</title>
        <!-- Styles -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/metismenu/dist/metisMenu.min.css">
        <link src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nanoscroller/0.8.7/css/nanoscroller.min.css" rel="stylesheet">
        <link href="{{ asset('css/nifty.min.css')}}" rel="stylesheet">
        <link href="{{ asset('css/nifty-demo-icons.min.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css" type="text/css" />
    </head>
    <body>
        @if (Route::has('login'))
            @auth
                <div id="container" class="effect aside-float aside-bright mainnav-lg">
                    <header id="navbar">
                        <div id="navbar-container" class="boxed">
                            <div class="navbar-header">
                                <a href="#" class="navbar-brand">
                                    <img src="{{asset('img/logo.png')}}" alt="Nifty Logo" class="brand-icon">
                                    <div class="brand-title">
                                        <span class="brand-text">{{ config('app.name','Intranet') }}</span>
                                    </div>
                                </a>
                            </div>
                            @include('templates.headTool')
                        </div>
                    </header>
                    <div class="boxed">
                        <div id="content-container">
                            <div id="page-head">
                                <div class="pad-all text-center">
                                    <h3>Sistema Administrativo Intranet</h3>
                                </div>
                            </div>
                            <div id="page-content">
                                @yield('content')
                            </div>
                        </div>
                        @include('templates.aside')    
                    </div>
                    @include('templates.footer')
                </div>
            @else
                <div id="container" class="cls-container">
                    <div id="bg-overlay"></div>
                    @include('auth.login')
                </div>
            @endif
        @endif
       <!-- JS -->
       @stack('scripts')
       <script src="{{ asset('js/app.js') }}"></script>
       <script src="{{ asset('js/jquery.min.js') }}"></script>
       <script src="{{ asset('js/bootstrap.min.js') }}"></script>
       <script src="https://cdn.jsdelivr.net/npm/metismenu"></script>
       <script src="{{ asset('js/nifty.min.js') }}"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nanoscroller/0.8.7/javascripts/jquery.nanoscroller.js"></script>

       <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
       <script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

       <script src="{{ asset('js/tables-datatables.js') }}"></script>
       @yield('scripts')
    </body>
</html>
