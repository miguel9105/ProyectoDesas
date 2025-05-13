<nav class="navbar navbar-expand-lg navbar-dark natura-navbar fixed-top" id="mainNav">
  <div class="container px-4 px-lg-5">
    <a class="d-flex align-items-center text-decoration-none" href="{{ route('home') }}">
      <img src="{{ asset('img/logo.jpg') }}" alt="Logo" class="navbar-logo me-2">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
      aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarResponsive">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link natura-link" href="{{ route('home') }}"><i class="fas fa-house"></i>Inicio</a></li>
        <li class="nav-item"><a class="nav-link natura-link" href="{{ route('login') }}"><i class="fas fa-inbox"></i>Buzón</a></li>
        <li class="nav-item"><a class="nav-link natura-link" href="{{ route('publications.index') }}"><i class="fas fa-upload"></i>Publicar</a></li>
        <li class="nav-item"><a class="nav-link natura-link" href="{{ route('Message.enviar') }}"><i class="fas fa-comments"></i>Chat</a></li>
        <li class="nav-item"><a class="nav-link natura-link" href="{{ route('conocenos.index') }}"><i class="fas fa-users"></i>Conócenos</a></li>
        <li class="nav-item"><a class="nav-link natura-link" href="{{ route('login') }}"><i class="fas fa-right-from-bracket"></i>Salir</a></li>
      </ul>
    </div>
  </div>
</nav>

<style>
  .natura-navbar {
    background: linear-gradient(145deg, #0a0a0a 60%, #2e2e2e 40%);
    border-bottom: 1px solid rgba(129, 251, 184, 0.1);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    padding-top: 0.3rem;
    padding-bottom: 0.3rem;
  }

  .navbar-brand {
    font-weight: bold;
    font-size: 1.2rem;
    color: #81fbb8;
    text-shadow: 0 0 4px #81fbb880, 0 0 8px #81fbb850;
    display: flex;
    align-items: center;
  }

  .navbar-logo {
    height: 40px;
    width: auto;
    border-radius: 8px;
    box-shadow: 0 0 8px rgba(129, 251, 184, 0.3);
  }

  .navbar-brand i {
    margin-right: 8px;
    font-size: 1.2rem;
  }

  .natura-link {
    color: #e6fbe9 !important;
    font-weight: 500;
    padding: 0.5rem 0.75rem;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    transition: all 0.3s ease;
  }

  .natura-link i {
    margin-right: 6px;
  }

  .natura-link:hover {
    color: #4caf50 !important;
    background-color: rgba(129, 251, 184, 0.08);
    border-radius: 0.5rem;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(129, 251, 184, 0.2);
  }

  .navbar-toggler {
    border: none;
  }

  .navbar-toggler-icon {
    filter: brightness(1.1);
  }

  @media (max-width: 991px) {
    .natura-link {
      justify-content: center;
      margin: 0.5rem 0;
    }

    .navbar-logo {
      height: 36px;
    }

    .navbar-brand {
      font-size: 1rem;
    }
  }
</style>
