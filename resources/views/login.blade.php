@extends('layouts.default')
@section('content')
<header>
    <link href="{{url('/css/login/bootstrap-4.1.1.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <script src="/js/login/bootstrap-4.1.1.min.js"></script>
    <link rel="stylesheet" href="/css/login/style.css">
</header>


<div class="container cpanel-login col-md-5 xs-12">
    <div class="card card-login text-center ">
        <div class="card-header bloco-login">
            <span> <img src="{{url('/images/logo.png')}}" class="w-50" alt="Logo"> </span>
            <hr class="linha-titulo">
            <span class="logo_title mb-0 titulo"><h5> Painel De Controle </h5></span>
        </div>
        <div class="card-body bg-dark">
            <form action="{{url('logar')}}" method="post">
                @csrf  
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">👤</span>
                    </div>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">🔑</span>
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <div class="form-group">
                    <input type="submit" name="btn" value="Login" class="btn btn-outline-danger float-right login_btn">
                </div>

            </form>
        </div>
    </div>
</div>
@stop