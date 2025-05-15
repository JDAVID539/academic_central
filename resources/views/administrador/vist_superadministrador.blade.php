@extends('layouts.app_modulosuperadmin')
@section('title', 'Vista Super Administrador')
@section('content')
<br>
<br>
    <center><strong><h1>Bienvenido, {{ $userName }}</strong></h1></center> 

    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card text-white bg-primary h-100">
                    <div class="card-header">Total de Colegios</div>
                    <div class="card-body d-flex align-items-center">
                        <i class="now-ui-icons education_hat mr-3" style="font-size: 2.5rem; color: white;"></i>
                        <div>
                            <h3 class="card-title mb-1">{{ $totalColegios }}</h3>
                            <p class="card-text">Número total de colegios registrados en el sistema.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card text-white bg-success h-100">
                    <div class="card-header">Total de Usuarios</div>
                    <div class="card-body d-flex align-items-center">
                        <i class="now-ui-icons users_single-02 mr-3" style="font-size: 2.5rem; color: white;"></i>
                        <div>
                            <h3 class="card-title mb-1">{{ $totalUsuarios }}</h3>
                            <p class="card-text">Cantidad total de usuarios registrados en la plataforma.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="card text-white bg-info h-100">
                    <div class="card-header">Total de Contactos</div>
                    <div class="card-body d-flex align-items-center">
                        <i class="now-ui-icons ui-1_email-85 mr-3" style="font-size: 2.5rem; color: white;"></i>
                        <div>
                            <h3 class="card-title mb-1">{{ $totalContactos }}</h3>
                            <p class="card-text">Número total de solicitudes de contacto recibidas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
