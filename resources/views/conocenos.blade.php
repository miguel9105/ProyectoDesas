{{-- 
    resources/views/conocenos.blade.php 
    Vista principal para la página "Conócenos" de KodeLAMD
--}}

@extends('components.layouts.noRegister')

@push('styles')
    @vite(['resources/sass/conocenos.scss', 'resources/js/conocenos.js'])
    <!-- Adding FontAwesome for better icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap Icons as an alternative -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
@endpush

@section('content')
<!-- Hero section with improved Bootstrap classes -->
<section class="bg-dark text-white py-5">
    <div class="container py-5">
        <div class="row align-items-center py-md-5">
            <div class="col-lg-5 mb-4 mb-lg-0 text-center text-lg-start">
                <div class="mb-4">
                    <img src="{{ asset('img/kodelamd.jpg') }}" class="img-fluid rounded shadow" alt="KodeLAMD Logo">
                </div>
            </div>
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold mb-3">Conócenos</h1>
                <div class="bg-primary mb-4" style="width: 80px; height: 4px;"></div>
                <p class="lead">En KodeLAMD, somos un equipo de cinco jóvenes innovadores que han unido fuerzas para revolucionar el mundo del desarrollo de software. Nuestra pasión por la tecnología nos impulsa a crear soluciones digitales a medida que no solo cumplen, sino que superan las expectativas.</p>
                <a href="#quienes-somos" class="btn btn-primary btn-lg mt-3">Descubre más <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- Quienes somos section with more Bootstrap and less custom CSS -->
<section id="quienes-somos" class="py-5 bg-light">
    <div class="container py-4">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold mb-3">Quiénes Somos</h2>
                <div class="bg-primary mx-auto mb-4" style="width: 80px; height: 4px;"></div>
                <p class="lead text-muted">KodeLAMD es más que una empresa; somos un colectivo de visionarios que fusionan creatividad y tecnología.</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100 mb-4 hover-scale">
                    <div class="card-body p-4">
                        <div class="text-center mb-3">
                            <span class="bg-primary text-white d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-code fa-2x"></i>
                            </span>
                        </div>
                        <h3 class="h4 mb-3 text-center">Innovación Tecnológica</h3>
                        <p class="text-center">Nuestra juventud es nuestra mayor fortaleza, ya que hemos crecido en un entorno digital que nos permite anticipar tendencias y adaptarnos con rapidez.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100 mb-4 hover-scale">
                    <div class="card-body p-4">
                        <div class="text-center mb-3">
                            <span class="bg-primary text-white d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-lightbulb fa-2x"></i>
                            </span>
                        </div>
                        <h3 class="h4 mb-3 text-center">Aliado Estratégico</h3>
                        <p class="text-center">Cada miembro de nuestro equipo aporta habilidades únicas, creando una sinergia que nos permite abordar cualquier reto con confianza y ofrecerte soluciones personalizadas.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
                          
<!-- Mission and Vision with attractive cards -->
<section class="py-5 bg-dark">
    <div class="container py-lg-4">
        <div class="row text-center mb-4">
            <div class="col-12">
                <h2 class="text-white display-5 fw-bold">Nuestra Filosofía</h2>
                <div class="bg-primary mx-auto my-3" style="width: 80px; height: 4px;"></div>
            </div>
        </div>
        <div class="row">
            <!-- Mission Card -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="card bg-white h-100 hover-scale">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="fas fa-bullseye fa-lg text-white"></i>
                            </div>
                            <h3 class="h3 mb-0 text-dark">Misión</h3>
                        </div>
                        <p class="lead mb-3 text-primary">Convertir ideas en soluciones digitales innovadoras</p>
                        <p class="text-dark">En KodeLAMD, nuestra misión es desarrollar software de alta calidad que optimiza procesos, mejora la experiencia del usuario y potencia el crecimiento de nuestros clientes. A través de un enfoque colaborativo y personalizado, trabajamos codo a codo contigo para garantizar que cada solución sea un reflejo de tus objetivos.</p>
                    </div>
                </div>
            </div>
            
            <!-- Vision Card -->
            <div class="col-lg-6">
                <div class="card bg-white h-100 hover-scale">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="fas fa-binoculars fa-lg text-white"></i>
                            </div>
                            <h3 class="h3 mb-0 text-dark">Visión</h3>
                        </div>
                        <p class="lead mb-3 text-primary">Ser pioneros en el desarrollo de software</p>
                        <p class="text-dark">Nuestra visión es destacarnos por nuestra creatividad, agilidad y capacidad para anticipar las tendencias tecnológicas del futuro. Aspiramos a dejar una huella significativa en el ecosistema digital, estableciendo alianzas estratégicas que impulsen la transformación digital y contribuyan al avance tecnológico de nuestra comunidad.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services section with modern icons -->
 <section class="py-5 bg-white">
  <div class="container py-lg-4">
    <div class="row text-center justify-content-center mb-5">
      <div class="col-lg-8">
        <h2 class="display-5 fw-bold">Nuestras Soluciones</h2>
        <div class="accent-line bg-primary mx-auto my-3" style="width: 80px; height: 4px;"></div>
        <p class="lead text-muted">Ofrecemos servicios integrales de desarrollo tecnológico adaptados a tus necesidades</p>
      </div>
    </div>

    <!-- Ejemplo de una tarjeta de solución con ícono circular corregido -->
    <div class="row g-4 justify-content-center">
      <div class="col-sm-6 col-md-4">
        <div class="text-center p-4 shadow rounded bg-light h-100">
          <!-- Ícono con fondo perfectamente circular -->
          <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
               style="width: 80px; height: 80px;">
            <i class="fas fa-laptop-code fa-2x"></i>
          </div>
          <h5 class="fw-bold">Desarrollo Web</h5>
          <p class="text-muted">Creamos sitios y aplicaciones web modernas, escalables y personalizadas con tecnologías de última generación.</p>
        </div>
      </div>

      <!-- Puedes duplicar más tarjetas siguiendo este mismo modelo -->
      <div class="col-sm-6 col-md-4">
        <div class="text-center p-4 shadow rounded bg-light h-100">
          <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
               style="width: 80px; height: 80px;">
            <i class="fas fa-mobile-alt fa-2x"></i>
          </div>
          <h5 class="fw-bold">Aplicaciones Móviles</h5>
          <p class="text-muted">Desarrollamos apps móviles intuitivas y eficientes para iOS y Android.</p>
        </div>
      </div>

      <div class="col-sm-6 col-md-4">
        <div class="text-center p-4 shadow rounded bg-light h-100">
          <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
               style="width: 80px; height: 80px;">
            <i class="fas fa-cloud fa-2x"></i>
          </div>
          <h5 class="fw-bold">Soluciones en la Nube</h5>
          <p class="text-muted">Implementamos y gestionamos infraestructuras seguras y escalables en la nube.</p>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="py-5 bg-light">
    <div class="container py-lg-4">
        <div class="row text-center justify-content-center mb-5">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold">Nuestro Equipo</h2>
                <div class="bg-primary mx-auto my-3" style="width: 60px; height: 3px;"></div>
                <p class="lead text-muted">Conoce a los profesionales detrás de KodeLAMD</p>
            </div>
        </div>

          <style>
            .team-card {
                min-height: 480px;
            }

            .team-image {
                height: 180px;
                object-fit: cover;
                width: 100%;
            }
        </style>

<div class="row g-4 justify-content-center">
            <!-- Team Member 1 -->
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card border-0 shadow h-100 team-card">
            <img src="{{ asset('img/michelle.jpg') }}" class="card-img-top img-fluid" alt="Alba Michelle Jiménez">
            <div class="card-body p-4 text-center">
                    <h5 class="card-title fw-bold">Alba Michelle Jiménez Morales</h5>
                    <p class="text-primary mb-3">Desarrolladora Backend</p>
                    <p class="card-text text-muted">Especializada en Laravel </p>
            </div>
        </div>
 </div>

<!-- Team Member 2 -->
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card border-0 shadow h-100 team-card">
            <img src="{{ asset('img/adriana.jpg') }}" class="card-img-top img-fluid" alt="Carmen Adriana Moreno">
                <div class="card-body p-4 text-center">
                    <h5 class="card-title fw-bold">Carmen Adriana Moreno Castillo</h5>
                    <p class="text-primary mb-3">Diseñadora UI/UX</p>
                    <p class="card-text text-muted">Especializada en Laravel</p>
                </div>
         </div>
    </div>

 <!-- Team Member 3 -->
 <div class="col-sm-12 col-md-6 col-lg-3">
     <div class="card border-0 shadow h-100 team-card">
         <img src="{{ asset('img/david.jpg') }}" class="card-img-top img-fluid" alt="David Alexander Martínez">
             <div class="card-body p-4 text-center">
                <h5 class="card-title fw-bold">David Alexander Martínez López</h5>
                <p class="text-primary mb-3">Ingeniero de Calidad</p>
                <p class="card-text text-muted">Especializada en Laravel</p>
            </div>
        </div>
    </div>

 <!-- Team Member 4 -->
<div class="col-sm-12 col-md-6 col-lg-3">
    <div class="card border-0 shadow h-100 team-card">
        <img src="{{ asset('img/kevin.jpg') }}" class="card-img-top img-fluid" alt="Kevin Alejandro Peña">
            <div class="card-body p-4 text-center">
                <h5 class="card-title fw-bold">Kevin Alejandro Peña Ramírez</h5>
                  <p class="text-primary mb-3">Gerente de Proyectos</p>
                    <p class="card-text text-muted">Especializada en Laravel</p>
            </div>
        </div>
    </div>

<!-- Team Member 5 -->
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card border-0 shadow h-100 team-card">
            <img src="{{ asset('img/luis.jpg') }}" class="card-img-top img-fluid" alt="Luis Miguel Tao">
                <div class="card-body p-4 text-center">
                    <h5 class="card-title fw-bold">Luis Miguel Tao Achicue</h5>
                    <p class="text-primary mb-3">Especialista DevOps</p>
                    <p class="card-text text-muted">Especializada en Laravel</p>
            </div>
        </div>
    </div>

<!-- Team Member 6 -->
    <div class="col-sm-12 col-md-6 col-lg-3">
         <div class="card border-0 shadow h-100 team-card">
            <img src="{{ asset('img/jairo.jpeg') }}" class="card-img-top img-fluid" alt="Jairo Enrique">
                <div class="card-body p-4 text-center">
                <h5 class="card-title fw-bold">Jairo Enrique Montes Jojoa</h5>
                <p class="text-primary mb-3">Especialista</p>
                <p class="card-text text-muted">Especializada en Laravel</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Call to Action section -->
<section class="py-5 bg-primary text-white text-center">
    <div class="container py-4">
        <h2 class="display-5 fw-bold mb-4">¿Listo para transformar tu idea en realidad?</h2>
        <p class="lead mb-4">Contáctanos hoy mismo y descubre cómo podemos ayudarte a alcanzar tus objetivos tecnológicos</p>
        <a href="#" class="btn btn-light btn-lg px-4">Contactar ahora <i class="fas fa-arrow-right ms-2"></i></a>
    </div>
</section>
@endsection