<nav class="navbar navbar-expand-lg navbar-dark nav-natura-dark fixed-top" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand text-light fw-bold text-uppercase" href="#page-top">
            <i class="fas fa-leaf me-2 icon-accent"></i>TuApp
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarResponsive">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link nav-link-dark" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link nav-link-dark" href="{{ route('login') }}">Publicar</a></li>
                <li class="nav-item"><a class="nav-link nav-link-dark" href="{{ route('login') }}">Chat</a></li>
                <li class="nav-item"><a class="nav-link nav-link-dark" href="#">Conócenos</a></li>
                <li class="nav-item"><a class="nav-link nav-link-dark" href="{{ route('login') }}">Iniciar sesión</a></li>
            </ul>
        </div>
    </div>
</nav>

<style>
.nav-natura-dark {
    background: linear-gradient(145deg, #0a0a0a 50%, #1a1a1a 50%);
    padding: 1rem 0.5rem;
    backdrop-filter: blur(6px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
    z-index: 999;
}

.navbar-brand {
    color: #ffffff !important;
    font-size: 1.3rem;
    text-shadow: 0 0 6px rgba(129, 251, 184, 0.2);
}

.icon-accent {
    color: #81fbb8;
    transition: transform 0.3s ease, color 0.3s ease;
}

.navbar-brand:hover .icon-accent {
    transform: scale(1.15);
    color: #4caf50;
}

.nav-link-dark {
    color: #f1f1f1 !important;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease-in-out;
}

.nav-link-dark:hover {
    color: #81fbb8 !important;
    background-color: rgba(129, 251, 184, 0.05);
    border-radius: 0.5rem;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(129, 251, 184, 0.15);
}

.navbar-toggler {
    outline: none;
}

.navbar-toggler-icon {
    filter: brightness(1.2);
}

@media (max-width: 992px) {
    .nav-link-dark {
        text-align: center;
    }
}
</style>
