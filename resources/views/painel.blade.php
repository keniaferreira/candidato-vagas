@extends('layouts.default')
@section('content')
<header>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" type="text/css" href="{{url('/css/painel/fonts.css')}}" />
    <link rel="stylesheet" href="{{url('/css/painel/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('/css/painel/fonticon.css')}}">
    <!-- Material Kit CSS -->
    <link href="{{url('/css/painel/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />
    
</header>

<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
        <div class="logo">
            <a class="simple-text logo-mini">
                <i class="material-icons">dashboard</i>
            </a>
            <a class="simple-text logo-normal">
                Painel Recrutador
            </a>
        </div>
        <div class="sidebar-wrapper">
        	
            <ul class="nav">
            	<li class="nav-item active  ">
            		<a class="nav-link" href="#0">
            			<i class="material-icons">dashboard</i>
            			<p>Opções</p>
            		</a>
            	</li>

            	<li class="nav-item">
            		<a class="nav-link" href="{{url('/candidato/')}}">
            			<i class="icon-profile"></i>
            			<p>Candidatos</p>
            		</a>
            	</li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/vaga/')}}">
                        <i class="icon-library"></i>
                        <p>Vagas</p>
                    </a>
                </li>               

                <li class="nav-item">
                    <a class="nav-link" href="{{url('logout')}}">
                        <i class="icon-exit"></i>
                        <p>Sair</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <!-- Dashboard
                    Conteúdo -->
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="material-icons">notifications</i> <!-- Notifications -->
                            </a>
                        </li>
                        <!-- your navbar here -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="container">
                    <span class="mensagem-retorno"></span>
                </div>
                @yield('conteudo')
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright float-right">
                    &copy; Candidato Vagas. Todos os direitos reservados.
                </div>
                <!-- your footer here -->
            </div>
        </footer>
    </div>
</div>
<!-- <script src="https://demos.creative-tim.com/material-dashboard-bs4/assets/js/core/jquery.min.js"></script> -->
<script src="/js/painel/popper.min.js"></script>   
<script src="/js/painel/bootstrap-material-design.min.js"></script>
<script src="/js/painel/perfect-scrollbar.jquery.min.js"></script>
<script src="/js/painel/material-dashboard.min.js"></script>


@stop