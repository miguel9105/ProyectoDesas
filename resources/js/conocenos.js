/**
 * conocenos.js - JavaScript para la página "Conócenos"
 * Este archivo contiene todo el código JavaScript necesario para la funcionalidad
 * interactiva de la página Conócenos.
 */

document.addEventListener('DOMContentLoaded', function() {
    // Inicializar efectos para las tarjetas del equipo
    initTeamCardEffects();
    
    // Inicializar efectos para tarjetas con efecto de escala en hover
    initHoverScaleEffects();
    
    // Inicializar navegación suave para anclas internas
    initSmoothScrolling();
});

/**
 * Inicializa los efectos de hover para las tarjetas del equipo
 */
function initTeamCardEffects() {
    const teamCards = document.querySelectorAll('.team-card');
    
    teamCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            const overlay = this.querySelector('.team-overlay');
            if (overlay) {
                overlay.style.opacity = '1';
            }
        });
        
        card.addEventListener('mouseleave', function() {
            const overlay = this.querySelector('.team-overlay');
            if (overlay) {
                overlay.style.opacity = '0';
            }
        });
    });
}

/**
 * Inicializa los efectos de escala para elementos con la clase hover-scale
 */
function initHoverScaleEffects() {
    const hoverCards = document.querySelectorAll('.hover-scale');
    
    hoverCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
}

/**
 * Inicializa el desplazamiento suave para los enlaces de anclaje internos
 */
function initSmoothScrolling() {
    // Seleccionar todos los enlaces que comienzan con # y que no son solo #
    const anchorLinks = document.querySelectorAll('a[href^="#"]:not([href="#"])');
    
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                // Usar scrollIntoView con comportamiento suave
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Exportar funciones para que puedan ser utilizadas por otros módulos si es necesario
export {
    initTeamCardEffects,
    initHoverScaleEffects,
    initSmoothScrolling
};