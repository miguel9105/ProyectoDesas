<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Define la codificación de caracteres y el viewport para móviles -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <!-- Enlace a la hoja de estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <style>
        /* Estilo de la sección de contacto */
        .contact-section {
            background-color: rgba(27, 26, 26, 0.11); /* Fondo con color negro semi-transparente */
            color: black; /* Establece que el texto de la sección de contacto sea negro */
        }

        /* Ajusta el color del texto dentro de las cards en la sección de contacto */
        .contact-section .card-body {
            color: black;
        }
    </style>

    <!-- Navbar: Barra de navegación fija en la parte superior -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <!-- Enlace al logo -->
            <a class="navbar-brand" href="#page-top">logo</a>
            <!-- Botón que despliega el menú en dispositivos móviles -->
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <!-- Menú de navegación que se despliega -->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Buzón reportes</a></li>
                    <li class="nav-item"><a class="nav-link" href="#signup">Publicar</a></li>
                    <li class="nav-item"><a class="nav-link" href="#signup">Chat</a></li>
                    <li class="nav-item"><a class="nav-link" href="#signup">Conócenos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección de chat de mensajes -->
    <section class="container py-5" style="margin-top: 80px;">
        <h1 class="mb-4 ">Chat</h1>
        <!-- Card que contiene el área del chat -->
        <div class="card shadow" style="height: 500px;">
            <div class="card-body d-flex flex-column justify-content-between h-100">
                <!-- Área donde se muestran los mensajes -->
                <div id="chatMessages" class="overflow-auto mb-3 p-3 border rounded" style="height: 350px; background-color:rgb(255, 255, 255);">
                    <!-- Bucle que recorre los mensajes almacenados en la variable $messages -->
                    @foreach ($messages as $message)
                        <!-- Define la alineación de los mensajes según si es del administrador o del usuario -->
                        <div class="mb-2 d-flex {{ $message->is_admin_message ? 'justify-content-start' : 'justify-content-end' }}">
                            <!-- Se asigna un estilo a cada mensaje dependiendo si es del administrador o del usuario -->
                            <div class="p-2 rounded bg-{{ $message->is_admin_message ? 'light' : 'primary' }} text-{{ $message->is_admin_message ? 'dark' : 'white' }} shadow" style="max-width: 75%;">
                                <!-- Muestra el contenido del mensaje y la hora de creación -->
                                <strong>{{ $message->is_admin_message ? 'Admin' : 'Tú' }}:</strong> {{ $message->content }}
                                <div class="text-muted small text-end">{{ $message->created_at->format('H:i') }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Formulario para enviar nuevos mensajes -->
                <form action="{{ route('Message.store') }}" method="POST" class="d-flex">
                    @csrf <!-- Incluir el token CSRF para la protección del formulario -->
                    <!-- Campos ocultos para almacenar la información del mensaje -->
                    <input type="hidden" name="is_admin_message" value="0">
                    <input type="hidden" name="is_read" value="0">
                    <input type="hidden" name="role_id" value="2">
                    <!-- Campo de texto donde el usuario escribe el mensaje -->
                    <input type="text" name="content" id="content" class="form-control me-2" placeholder="Escribe un mensaje..." required>
                    <!-- Botón para enviar el mensaje -->
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Sección de contacto con información adicional -->
    <section class="contact-section py-5">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <!-- Cada columna contiene una card con información de contacto -->
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card shadow-sm rounded-3 border-0" style="max-height: 250px;">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-map-marked-alt text-primary mb-2" style="font-size: 2rem;"></i>
                            <h5 class="text-uppercase m-0 mb-2">Dirección</h5>
                            <hr class="my-3 mx-auto" style="border-color: rgba(0, 0, 0, 0.1);" />
                            <div class="small text-muted">Por ahora no tenemos</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card shadow-sm rounded-3 border-0" style="max-height: 250px;">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-envelope text-primary mb-2" style="font-size: 2rem;"></i>
                            <h5 class="text-uppercase m-0 mb-2">Correo electrónico</h5>
                            <hr class="my-3 mx-auto" style="border-color: rgba(0, 0, 0, 0.1);" />
                            <div class="small text-muted"><a href="mailto:hello@yourdomain.com" class="text-decoration-none text-primary">Desas3@gmail.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card shadow-sm rounded-3 border-0" style="max-height: 250px;">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-mobile-alt text-primary mb-2" style="font-size: 2rem;"></i>
                            <h5 class="text-uppercase m-0 mb-2">Teléfono</h5>
                            <hr class="my-3 mx-auto" style="border-color: rgba(0, 0, 0, 0.1);" />
                            <div class="small text-muted">+57 3052251193</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer small text-center text-white-50 py-4" style="background-color: rgb(0, 0, 0);">
        <div class="container px-4 px-lg-5">
            Copyright &copy; Desas3 2025-2026
        </div>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script adicional (si lo tienes) -->
    <script src="js/scripts.js"></script>
    <!-- Script para formularios -->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
