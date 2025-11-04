document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.carousel input[type="radio"][name="slides"]');
        const totalSlides = slides.length;
        const intervalTime = 6000; //
        let currentSlide = 0;

        // Función para pasar a la siguiente slide automáticamente
        function nextSlide() {
            slides[currentSlide].checked = false;
            currentSlide = (currentSlide + 1) % totalSlides;
            slides[currentSlide].checked = true;
        }

        // Iniciar carrusel automático
        setInterval(nextSlide, intervalTime);
    });