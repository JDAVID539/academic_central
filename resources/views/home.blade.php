@extends('layouts.app')
@section('title', 'Home - Academic Central')
@section('content')
<center>
    <!-- Slider de imágenes -->
    <section id="image-slider">
        <div class="slider-container">
            <div class="slides">
                <div class="slide active" style="background-image: url('https://bogota.gov.co/sites/default/files/styles/1050px/public/2022-11/educacion-67.jpg');"></div>
                <div class="slide" style="background-image: url('https://cooperativa.cl/noticias/site/artic/20230509/imag/foto_0000000120230509155008.jpg');"></div>
                <div class="slide" style="background-image: url('https://cdn.eldestapeweb.com/eldestape/032025/1742983035538.jpg?cw=1500&ch=843');"></div>
            </div>
            <button class="slider-btn prev" aria-label="Imagen anterior">&lt;</button>
            <button class="slider-btn next" aria-label="Imagen siguiente">&gt;</button>
        </div>
    </section>
    
        <div class="container">
            <div class="hero-content">
                <h1>Bienvenido a Academic Central</h1>
                <p>La plataforma que transforma la gestión académica y el aprendizaje en tu institución.</p>
    
            </div>
        </div>
    
    <div class="highlights">
        <div class="container">
        <div class="row">
            <div class="col-md-3 highlight-item">
            <i class="fa fa-graduation-cap fa-3x"></i>
            <h3>Gestión de Cursos</h3>
            <p>Organiza y administra tus cursos de forma sencilla y eficaz con Academic Central.</p>
            </div>
            <div class="col-md-3 highlight-item">
                <i class="fa fa-users fa-3x"></i>
                <h3>Comunicación con Estudiantes</h3>
                <p>Mantén a tus estudiantes informados y conectados a través de Academic Central.</p>
            </div>
            <div class="col-md-3 highlight-item">
                <i class="fa fa-book fa-3x"></i>
                <h3>Recursos de Aprendizaje</h3>
                <p>Comparte materiales y recursos para enriquecer la experiencia educativa en Academic Central.</p>
            </div>
            <div class="col-md-3 highlight-item">
                <i class="fa fa-chart-bar fa-3x"></i>
                <h3>Seguimiento del Progreso</h3>
                <p>Evalúa y analiza el rendimiento de tus estudiantes con Academic Central.</p>
            </div>
            </div>
        </div>
        </div>
        <div class="about-academic-central">
            <div class="container">
            <div class="row">
                <div class="col-md-6">
                <h2>¿Qué es Academic Central?</h2>
                <p>Academic Central es una plataforma de aprendizaje diseñada para potenciar la educación en tu institución. Ofrecemos una amplia gama de herramientas y funcionalidades para facilitar la gestión académica, mejorar la comunicación y crear un entorno de aprendizaje dinámico y colaborativo.</p>
                <ul>
                    <li>Gestión integral de estudiantes y profesores con Academic Central</li>
                    <li>Herramientas de comunicación en tiempo real integradas en Academic Central</li>
                    <li>Plataforma para compartir recursos y actividades en Academic Central</li>
                    <li>Seguimiento detallado del progreso individual y grupal en Academic Central</li>
                    <li>Integración con otras herramientas educativas de Academic Central</li>
                </ul>
                <a href="/acerca-de" class="button secondary">Más sobre Academic Central</a>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('public/images/fb31487f2295170415690e4c872e8455_high.webp') }}" alt="Logo" width="250" height="60" class="d-inline-block align-text-top">
                </div>
            </div>
            </div>
        </div>
</center>
@endsection
<!-- filepath: c:\xampp\htdocs\academic_central\resources\views\home.blade.php -->


@section('styles')
<style>
<<<<<<< HEAD
    body {}
        margin: 0;
        padding: 0;
        background: linear-gradient(120deg, #84fab0, #8fd3f4);
        background-size: 400% 400%;
        animation: backgroundMove 15s ease infinite;
    }

    @keyframes backgroundMove {}
        0% {}
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    .hero-slider {
=======
    /* Estilos del slider */
    .slider-container {
>>>>>>> 777cb0ea4b56086652e88973270f11bd143ec7fb
        position: relative;
        max-width: 800px;
        margin: 20px auto;
        overflow: hidden;
        height: 400px;
    }

    .slides {}
        position: relative;
        width: 100%;
        height: 100%;
    }

    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        opacity: 0;
        transition: opacity 0.8s ease-in-out;
    }

    .slide.active {
        opacity: 1;
        z-index: 1;
    }

    .slider-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.5);
        border: none;
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
        padding: 10px;
        z-index: 10;
    }

    .slider-btn.prev {
        left: 10px;
    }

    .slider-btn.next {
        right: 10px;
    }

    .slider-btn:hover {
        background: rgba(0, 0, 0, 0.8);
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.slide');
        const prevBtn = document.querySelector('.slider-btn.prev');
        const nextBtn = document.querySelector('.slider-btn.next');
        let currentIndex = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove('active');
            });
            slides[index].classList.add('active');
        }

        function changeSlide(direction) {
            currentIndex += direction;
<<<<<<< HEAD
                changeSlide(1);
            };
        }
=======
            if (currentIndex < 0) {
                currentIndex = slides.length - 1;
            } else if (currentIndex >= slides.length) {
                currentIndex = 0;
            }
            showSlide(currentIndex);
        }

        // Mostrar la primera imagen al cargar
        showSlide(currentIndex);

        // Eventos para los botones
        prevBtn.addEventListener('click', function() {
            changeSlide(-1);
        });

        nextBtn.addEventListener('click', function() {
            changeSlide(1);
        });
>>>>>>> 777cb0ea4b56086652e88973270f11bd143ec7fb
    });
</script>
@endsection

