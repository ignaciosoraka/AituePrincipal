document.addEventListener('DOMContentLoaded', function () {
    var whiteLogo = document.getElementById('whiteLogo');
    var darkLogo = document.getElementById('darkLogo');

    function toggleLogos() {
        var screenWidth = window.innerWidth;

        if (screenWidth <= 786) {
            // Si la pantalla es de 786px o menos, muestra el logo oscuro y oculta el logo blanco
            darkLogo.style.display = 'block';
            whiteLogo.style.display = 'none';
        } else {
            // Si la pantalla es más grande que 786px, asegúrate de que solo se muestre el logo blanco y oculte el logo oscuro
            darkLogo.style.display = 'none';
            whiteLogo.style.display = 'block';
        }
    }

    // Ejecuta la función al cargar la página
    toggleLogos();

    // Escucha el evento de redimensionamiento de la ventana
    window.addEventListener('resize', function() {
        toggleLogos();
    });

    // Escucha el evento de desplazamiento de la ventana
    window.addEventListener('scroll', function () {
        var screenWidth = window.innerWidth;

        if (screenWidth <= 786) {
            // Si la pantalla es de 786px o menos, muestra siempre el logo oscuro y oculta el logo blanco
            darkLogo.style.display = 'block';
            whiteLogo.style.display = 'none';
        } else {
            // Si la pantalla es más grande que 786px, cambia la visibilidad de los logotipos según la posición de desplazamiento
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                whiteLogo.style.display = 'none';
                darkLogo.style.display = 'block';
            } else {
                whiteLogo.style.display = 'block';
                darkLogo.style.display = 'none';
            }
        }
    });
});
