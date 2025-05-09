@extends('components.layouts.noRegister')

@push('styles')
<!-- se enlaza la hoja de estilos personalizada para esta vista....  -->

@vite(['resources/sass/conocenos.scss','resources/js/conocenos.js'])
@endpush

@section('content')
<!-- seccion principal con imagen de fondo y titulo -->
<section class="py-5 text-white" style="background-color: #343a40;">
    <div class="container">
        <div class="row">
            <!-- mision -->
            <div class="col-md-6">
                <h1>logo</h1>
                <img src="{{ asset('img/kodelamd.jpg') }}" class="card-img-top rounded-circle mx-auto d-block mt-3" style="width: 150px; height: 150px; object-fit: cover;" alt="integrante 1">
            </div>

            <div class="col-md-6">
                <h1>Conocenos</h1>
                <p>En KodeLAMD, somos un equipo de cinco jóvenes innovadores que han unido fuerzas para revolucionar el mundo del desarrollo de software. Nuestra pasión por la tecnología nos impulsa a crear soluciones digitales a medida que no solo cumplen, sino que superan las expectativas. Con un enfoque en la agilidad y la calidad, transformamos ideas en realidades funcionales, convirtiendo cada desafío en una oportunidad para innovar. Desde el desarrollo de aplicaciones móviles hasta la consultoría tecnológica, cada proyecto que emprendemos está diseñado para potenciar el crecimiento de tu negocio y ofrecer experiencias inolvidables a tus usuarios</p>
        </div>
    </div>
</section>

<!-- seccion quienes somos -->
<section class="py-5 text-center bg-light">
    <div class="container">
        <h2 class="mb-4">Quienes somos</h2>
        <p class="text-muted">KodeLAMD es más que una empresa; somos un colectivo de visionarios que fusionan creatividad y tecnología. Nuestra juventud es nuestra mayor fortaleza, ya que hemos crecido en un entorno digital que nos permite anticipar tendencias y adaptarnos con rapidez. Cada miembro de nuestro equipo aporta habilidades únicas, creando una sinergia que nos permite abordar cualquier reto con confianza. Creemos firmemente que la tecnología, cuando se aplica de manera efectiva, tiene el poder de transformar no solo negocios, sino también vidas. Nos consideramos tu aliado estratégico, comprometidos a hacer realidad tu visión digital con soluciones personalizadas que se ajustan a tus necesidades..</p>
    </div>
</section>

<!-- seccion mision y vision -->
<section class="py-5 text-white" style="background-color: #343a40;">
    <div class="container">
        <div class="row">
            <!-- mision -->
            <div class="col-md-6">
                <h3>Misión</h3>
                <p>En KodeLAMD, nuestra misión es convertir ideas en soluciones digitales innovadoras y accesibles que aborden problemas reales. Nos dedicamos a ofrecer software de alta calidad que optimiza procesos, mejora la experiencia del usuario y potencia el crecimiento de nuestros clientes. A través de un enfoque colaborativo y personalizado, trabajamos codo a codo contigo para garantizar que cada solución sea un reflejo de tus objetivos y aspiraciones.</p>
            </div>
            <!-- vision -->
            <div class="col-md-6">
                <h3>Visión</h3>
                <p>Nuestra visión es ser reconocidos como pioneros en el desarrollo de software, destacándonos por nuestra creatividad, agilidad y capacidad para anticipar las tendencias tecnológicas del futuro. Aspiramos a dejar una huella significativa en el ecosistema digital, estableciendo alianzas estratégicas que impulsen la transformación digital y contribuyan al avance tecnológico de nuestra comunidad. En KodeLAMD, no solo miramos hacia el futuro; lo creamos.</p>
            </div>
        </div>
    </div>
</section>

<!-- seccion soluciones principales -->
<section class="py-5 bg-white text-center">
    <div class="container">
        <h2 class="mb-4">Nuestras soluciones destacadas</h2>
        <div class="row">
            <!-- solucion 1 -->
            <div class="col-md-4">
                <div class="p-4 border rounded h-100">
                    <h4>Desarrollo web</h4>
                    <p>creamos sitios web responsivos y funcionales adaptados a las necesidades del cliente.</p>
                </div>
            </div>
            <!-- solucion 2 -->
            <div class="col-md-4">
                <div class="p-4 border rounded h-100">
                    <h4>Aplicaciones moviles</h4>
                    <p>desarrollamos apps intuitivas para android e ios con alto rendimiento y gran experiencia de usuario.</p>
                </div>
            </div>
            <!-- solucion 3 -->
            <div class="col-md-4">
                <div class="p-4 border rounded h-100">
                    <h4>Automatizacion de procesos</h4>
                    <p>optimizamos procesos empresariales mediante herramientas de software personalizadas.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- seccion integrantes del equipo -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Nuestro Equipo</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            <!-- integrante 1 -->
            <div class="col">
                <div class="card h-100 text-center p-3">
                <img src="{{ asset('img/michelle.jpg') }}" class="card-img-top rounded-circle mx-auto d-block mt-3" style="width: 150px; height: 150px; object-fit: cover;" alt="integrante 1">
                    <div class="card-body">
                        <h5 class="card-title">Alba Michelle Jimenéz Morales </h5>
                        <p class="card-text">desarrollador backend especializado en laravel y base de datos.</p>
                    </div>
                </div>
            </div>
            <!-- integrante 2 -->
            <div class="col">
                <div class="card h-100 text-center p-3">
                <img src="{{ asset('img/adriana.jpg') }}" class="card-img-top rounded-circle mx-auto d-block mt-3" style="width: 150px; height: 150px; object-fit: cover;" alt="integrante 1">
                    <div class="card-body">
                        <h5 class="card-title">Carmen Adriana Moreno Castillo</h5>
                        <p class="card-text">disenadora ui/ux apasionada por crear experiencias digitales atractivas.</p>
                    </div>
                </div>
            </div>
            <!-- integrante 3 -->
            <div class="col">
                <div class="card h-100 text-center p-3">
                <img src="{{ asset('img/david.jpg') }}" class="card-img-top rounded-circle mx-auto d-block mt-3" style="width: 150px; height: 150px; object-fit: cover;" alt="integrante 1">
                    <div class="card-body">
                        <h5 class="card-title">David Alexander Martinéz Lopéz</h5>
                        <p class="card-text">ingeniero de calidad con experiencia en pruebas automatizadas y control de versiones.</p>
                    </div>
                </div>
            </div>
            <!-- integrante 4 -->
            <div class="col">
                <div class="card h-100 text-center p-3">
                <img src="{{ asset('img/kevin.jpg') }}" class="card-img-top rounded-circle mx-auto d-block mt-3" style="width: 150px; height: 150px; object-fit: cover;" alt="integrante 1">
                    <div class="card-body">
                        <h5 class="card-title">Kevin Alejandro Peña Ramiréz</h5>
                        <p class="card-text">gerente de proyectos encargada de la planificacion y comunicacion con clientes.</p>
                    </div>
                </div>
            </div>
            <!-- integrante 5 -->
            <div class="col">
                <div class="card h-100 text-center p-3">
                <img src="{{ asset('img/miguel.jpg') }}" class="card-img-top rounded-circle mx-auto d-block mt-3" style="width: 150px; height: 150px; object-fit: cover;" alt="integrante 1">
                    <div class="card-body">
                        <h5 class="card-title">Luis Miguel Tao Achicue</h5>
                        <p class="card-text">especialista en devops y despliegue de soluciones en la nube.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection