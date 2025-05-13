<section class="footer-natura position-relative overflow-hidden" style="background: linear-gradient(145deg, #0a0a0a 55%, #2e2e2e 45%); padding: 5rem 1rem 3rem;">
    <div class="container">
        <div class="row gy-5 text-center">
            <!-- Ubicación -->
            <div class="col-md-4">
                <div class="footer-card-natura">
                    <i class="fas fa-globe-americas fa-2x mb-3 icon-earth"></i>
                    <h5 class="text-uppercase fw-bold mb-2">Ubicación</h5>
                    <p class="mb-0 small">Calle 123, Medellín, Colombia</p>
                </div>
            </div>
            <!-- Correo -->
            <div class="col-md-4">
                <div class="footer-card-natura">
                    <i class="fas fa-leaf fa-2x mb-3 icon-earth"></i>
                    <h5 class="text-uppercase fw-bold mb-2">Correo</h5>
                    <p class="mb-0 small">
                        <a href="mailto:contacto@tuapp.com" class="footer-link-natura">contacto@tuapp.com</a>
                    </p>
                </div>
            </div>
            <!-- Teléfono -->
            <div class="col-md-4">
                <div class="footer-card-natura">
                    <i class="fas fa-seedling fa-2x mb-3 icon-earth"></i>
                    <h5 class="text-uppercase fw-bold mb-2">Teléfono</h5>
                    <p class="mb-0 small">+57 300 123 4567</p>
                </div>
            </div>
        </div>

        <!-- Redes -->
        <div class="d-flex justify-content-center gap-4 mt-5">
            <a href="#!" class="footer-icon-natura" title="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#!" class="footer-icon-natura" title="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#!" class="footer-icon-natura" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>

    <!-- Barra inferior -->
    <div class="footer-bar-natura mt-5 py-3 px-4 text-center small">
        <span class="text-muted">© {{ date('Y') }} TuApp — Unidos por la resiliencia, frente a la fuerza de la naturaleza 🌋🌪️🌊.</span>
    </div>
</section>

<style>
    .footer-card-natura {
        background: rgba(50, 50, 50, 0.4);
        border: 1px solid rgba(100, 100, 100, 0.3);
        backdrop-filter: blur(5px);
        border-radius: 1rem;
        padding: 2rem 1rem;
        color: #f0f0f0;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }

    .footer-card-natura:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 234, 255, 0.15);
    }

    .icon-earth {
        color: #6be48c;
        transition: transform 0.3s ease, color 0.3s ease;
    }

    .footer-card-natura:hover .icon-earth {
        transform: scale(1.15);
        color: #4caf50;
    }

    .footer-link-natura {
        color: #e6fbe9;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-link-natura:hover {
        color: #81fbb8;
    }

    .footer-icon-natura {
        color: #ccc;
        font-size: 1.5rem;
        transition: transform 0.3s, color 0.3s;
    }

    .footer-icon-natura:hover {
        color: #81fbb8;
        transform: scale(1.25);
    }

    .footer-bar-natura {
        background: rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(6px);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    @media (max-width: 768px) {
        .footer-card-natura {
            margin-bottom: 1.5rem;
        }
    }
</style>
