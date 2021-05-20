addEventListener("DOMContentLoaded", () => {
    const menu = document.getElementById('menu');
    const animaMen = document.getElementById('men-click');
    const flecha = document.getElementById('flecha');
    const link = document.getElementById('link');
    if (menu) {
        menu.addEventListener('click', () => {
            animaMen.classList.toggle('anima-men');
            flecha.classList.toggle('anima-chevron');
            flecha.style.transition = "all 1s ease-in";
        });
    }
    if (link) {
        link.addEventListener('click', () => {
            animaMen.classList.toggle('anima-men');
            flecha.classList.toggle('anima-chevron');
            flecha.style.transition = "all 1s ease-in";
        });
    }
    /* Validar formulario */
    $('#enviar').click(function () {
        var nombre, correo, mensaje, expresionEmail, exito, error, mensajeAlerta, enviar;
        nombre = document.getElementById('nombre').value;
        correo = document.getElementById('correo').value;
        mensaje = document.getElementById('mensaje').value;
        exito = document.getElementById('exito');
        error = document.getElementById('error');
        mensajeAlerta = document.getElementById('mensaje-alerta');
        enviar = document.getElementById('enviar-correo');

        expresionEmail = /\w+@\w+\.+[a-z]/;

        if (nombre === '' || correo === '' || mensaje === '') {
            error.style.opacity = "1";
            error.style.transform = "none";
            mensajeAlerta.innerHTML = "Todos los campos son obligatorios.";
            setTimeout(function () {
                error.style.transform = "translate(120%)";
            }, 5000);
            return false;
        } else if (nombre.length > 20) {
            error.style.opacity = "1";
            error.style.transform = "none";
            mensajeAlerta.innerHTML = "EL nombre es demasiado largo.";
            setTimeout(function () {
                error.style.transform = "translate(120%)";
            }, 5000);
            return false;
        } else if (!expresionEmail.test(correo)) {
            error.style.opacity = "1";
            error.style.transform = "none";
            mensajeAlerta.innerHTML = "El formato del correo, no es valido.";
            setTimeout(function () {
              error.style.transform = "translate(120%)";

            }, 5000);
            return false;
        } else if (mensaje.length > 60) {
            error.style.opacity = "1";
            error.style.transform = "none";
            mensajeAlerta.innerHTML = "El mensaje es demasiado largo.";
            setTimeout(function () {
                error.style.transform = "translate(120%)";
            }, 5000);
            return false;
        } else {
            $.ajax({
                url: '../correo.php',
                type: 'POST',
                data: $('#enviar-correo').serialize(),
                success: function () {
                    exito.style.opacity = "1";
                    exito.style.transform = "none";
                    enviar.reset();
                    setTimeout(function () {
                        exito.style.transform = "translate(120%)";
                    }, 4000);
                }
            });
        }
    });
});
/* Filtro por categorias */
function filtroCategorias() {
    const categorias = document.getElementById('categoria');
    const cajaBicis = document.getElementById('caja-bicis');
    const cajaAccesorios = document.getElementById('caja-accesorios');
    const categoriaSeleccionada = categorias.value;
    if (categoriaSeleccionada === 'todos') {
        cajaBicis.style.display = "inline-flex";
        cajaAccesorios.style.display = "inline-flex";
    } else if (categoriaSeleccionada === 'bicicletas') {
        cajaBicis.style.display = "inline-flex";
        cajaAccesorios.style.display = "none";

    } else if (categoriaSeleccionada === 'accesorios') {
        cajaAccesorios.style.display = "inline-flex";
        cajaBicis.style.display = "none";
    }

}