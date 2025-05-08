@extends('layouts.app')

@section('content')


<section id="home-academic-central" class="text-center py-5 bg-light">
    <div id="heroCarousel" class="carousel slide carousel-fade mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://bogota.gov.co/sites/default/files/styles/1050px/public/2022-11/educacion-67.jpg" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Imagen 1">
            </div>
            <div class="carousel-item">
                <img src="https://cooperativa.cl/noticias/site/artic/20230509/imag/foto_0000000120230509155008.jpg" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Imagen 2">
            </div>
            <div class="carousel-item">
                <img src="https://img-aws.ehowcdn.com/750x500p/photos.demandstudios.com/getty/article/28/17/sb10069478a-001.jpg" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Imagen 3">
            </div>
            <div class="carousel-item">
                <img src="https://travesia360.com/wp-content/uploads/2021/08/Catedral-Basilica-de-Nuestra-Senora-de-la-Asuncion-de-Popayan-Colombia-1.jpg" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Imagen 4">
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="hero-content mb-5">
            <h1 class="display-5 fw-bold">Tu Plataforma Integral de Aprendizaje con Academic Central</h1>
            <p class="lead">Academic Central te ofrece las herramientas que necesitas para una gestión académica eficiente y un aprendizaje enriquecedor.</p>
            
        </div>
    </div>
</section>

<section class="highlights py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <i class="fa fa-graduation-cap fa-3x mb-3" style="color: #D4AF37;"></i>

                <h4>Gestión de Cursos</h4>
                <p>Organiza y administra tus cursos de forma sencilla y eficaz con Academic Central.</p>
            </div>
            <div class="col-md-3 mb-4">
                <i class="fa fa-graduation-cap fa-3x mb-3" style="color: #D4AF37;"></i>
                <h4>Comunicación con Estudiantes</h4>
                <p>Mantén a tus estudiantes informados y conectados a través de Academic Central.</p>
            </div>
            <div class="col-md-3 mb-4">
                <i class="fa fa-graduation-cap fa-3x mb-3" style="color: #D4AF37;"></i>

                <h4>Recursos de Aprendizaje</h4>
                <p>Comparte materiales y recursos para enriquecer la experiencia educativa en Academic Central.</p>
            </div>
            <div class="col-md-3 mb-4">
                <i class="fa fa-graduation-cap fa-3x mb-3" style="color: #D4AF37;"></i>

                <h4>Seguimiento del Progreso</h4>
                <p>Evalúa y analiza el rendimiento de tus estudiantes con Academic Central.</p>
            </div>
        </div>
    </div>
</section>

<section class="about-academic-central bg-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4">
                <h2 class="fw-bold">¿Qué es Academic Central?</h2>
                <p>Academic Central es una plataforma de aprendizaje diseñada para potenciar la educación en tu institución. Ofrecemos una amplia gama de herramientas para facilitar la gestión académica, mejorar la comunicación y crear un entorno de aprendizaje dinámico y colaborativo.</p>
                <ul class="list-unstyled ps-3">
                    <li>✔ Gestión integral de estudiantes y profesores</li>
                    <li>✔ Herramientas de comunicación en tiempo real</li>
                    <li>✔ Recursos y actividades compartidas</li>
                    <li>✔ Seguimiento del progreso académico</li>
                    <li>✔ Integración con herramientas externas</li>
                </ul>
                
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Academic Central" class="img-fluid" style="max-width: 300px;">
            </div>
        </div>
    </div>
</section>

@endsection

