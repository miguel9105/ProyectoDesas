<nav class="navbar navbar-expand-lg navbar-dark natura-navbar fixed-top">
  <div class="container">
    <a class="d-flex align-items-center text-decoration-none" href="{{ route('home') }}">
      <img src="{{ asset('img/logo.jpg') }}" alt="Logo" class="navbar-logo me-2">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarGlass"
      aria-controls="navbarGlass" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarGlass">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link natura-link" href="{{ route('home') }}"><i class="fas fa-home me-2"></i>Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link natura-link" href="{{ route('login') }}"><i class="fas fa-inbox me-2"></i>Buzón</a>
        </li>
        <li class="nav-item">
          <a class="nav-link natura-link" href="{{ route('publications.index') }}"><i class="fas fa-upload me-2"></i>Publicar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link natura-link" href="{{ route('Message.enviar') }}"><i class="fas fa-comments me-2"></i>Chat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link natura-link" href="{{ route('conocenos.index') }}"><i class="fas fa-users me-2"></i>Conócenos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link natura-link" href="{{ route('login') }}"><i class="fas fa-sign-out-alt me-2"></i>Salir</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<style>
.natura-navbar {
  background: linear-gradient(145deg, #0a0a0a 60%, #2e2e2e 40%);
  backdrop-filter: blur(12px);
  border-bottom: 1px solid rgba(129, 251, 184, 0.1);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  transition: background 0.3s ease-in-out;
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}

.navbar-brand {
  font-weight: bold;
  font-size: 1.4rem;
  letter-spacing: 1px;
}

.navbar-logo {
  height: 40px;
  width: auto;
  border-radius: 8px;
  box-shadow: 0 0 8px rgba(129, 251, 184, 0.3);
}

.text-glow {
  color: #81fbb8;
  text-shadow: 0 0 6px #81fbb880, 0 0 12px #81fbb850;
}

.natura-link {
  color: #e6fbe9 !important;
  padding: 0.75rem 1rem;
  font-weight: 500;
  transition: all 0.3s ease;
}

.natura-link:hover {
  color: #4caf50 !important;
  background-color: rgba(129, 251, 184, 0.08);
  border-radius: 0.5rem;
  transform: translateY(-2px);
  box-shadow: 0 6px 16px rgba(129, 251, 184, 0.2);
}

.navbar-toggler {
  border: none;
}

.navbar-toggler-icon {
  filter: brightness(1.1);
}

@media (max-width: 991px) {
  .natura-link {
    text-align: center;
    margin: 0.5rem 0;
  }

  .navbar-logo {
    height: 36px;
  }

  .navbar-brand {
    font-size: 1.2rem;
  }
}
</style>
