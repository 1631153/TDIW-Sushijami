const wrapper = document.querySelector('.wrapper')
const loginLink  = document.querySelector('.login-link')
const registerLink = document.querySelector('.register-link')
const btnInici  = document.querySelector('.btnLogin')
const iconClose  = document.querySelector('.icon-close')

registerLink.addEventListener('click', ()=> {
    wrapper.classList.add('active');
});

loginLink.addEventListener('click', ()=> {
    wrapper.classList.remove('active');
});

btnInici.addEventListener('click', ()=> {
    wrapper.classList.add('active-login');
});

iconClose.addEventListener('click', ()=> {
    wrapper.classList.remove('active-login');
});

document.addEventListener('DOMContentLoaded', function() {
    var loginLink = document.getElementById('loginLink');
    loginLink.addEventListener('click', ocultar_slider);
    loginLink.addEventListener('click', ocultar_Imagenes);
    loginLink.addEventListener('click', ocultar_QuiSom);
});
function ocultar_slider(){
    var slider = document.getElementById('sliderContainer');
    slider.style.display = 'none';
}
function ocultar_Imagenes(){
    var galeriaImagenes2 = document.querySelector('.formDiv');
    galeriaImagenes2.style.display = 'none';
}

function ocultar_QuiSom(){
    var QuiSom = document.querySelector('.container');
    QuiSom.style.display = 'none';
}

async function mostrarProducto(){
    var tagSelect = document.getElementById("fcategorias");
    var resposta = await fetch("Controller/productes.php?categoria="+tagSelect.value);
    var respostaTxt = await resposta.text();
    document.getElementById("dproductes").innerHTML = respostaTxt;
}

// Menu desplegable
function myFunction() {
    $("#myDropdown").toggleClass("show");
}

function actualizarCantidad(index, accion) {
    $.ajax({
        url: '/../carrito.php',
        method: 'POST',
        data: { index: index, accion: accion },
        success: function(response) {
            var data = JSON.parse(response);
            if (data.success) {
                // Actualizar la cantidad y el precio total
                $('#cantidad_' + index).text(data.cantidad);
                $('#precio_total_' + index).text(data.precioTotal + '€');

                // Recalcular y mostrar el precio total de todos los productos
                var precioTotalTodos = 0;
                var cantidad_total_productos = 0;
                $('.precio_total_individual').each(function() {
                    precioTotalTodos += parseFloat($(this).text());
                });
                $('#precio_total_todos').text('Precio Total: ' + precioTotalTodos + '€');

                $('.cantidad_prod').each(function() {
                    cantidad_total_productos += parseInt($(this).text());
                });
                $('#cantidad_total_productos').text('Cantidad total de productos: ' + cantidad_total_productos);
                // Ocultar la fila si la cantidad es cero
                if (data.cantidad <= 0) {
                    $('#fila_' + index).hide();
                } else {
                    $('#fila_' + index).show();
                }
            } else {
                console.error('Error al actualizar cantidad del carrito:', data.message);
            }
        },
        error: function(error) {
            console.error('Error al actualizar cantidad del carrito:', error);
        }
    });
}

function vaciarCarrito() {
    console.log('Vaciar carrito llamado');
    $.ajax({
        url: 'carrito.php',
        method: 'POST',
        data: { vaciar_carrito: true },
        success: function(response) {
            var data = JSON.parse(response);
            if (data.success) {
                alert(data.message);
                location.reload();
            } else {
                console.error('Error al vaciar el carrito:', data.message);
            }
        },
        error: function(error) {
            console.error('Error al vaciar el carrito:', error);
        }
    });
}

function finalizarCarrito() {
    console.log('Finalizar carrito llamado');
    $.ajax({
        url: 'carrito.php',
        method: 'POST',
        data: { finalizarCompra: true },
        success: function(response) {
            var data = JSON.parse(response);
            if (data.success) {
                alert(data.message);
                location.reload();
            } else {
                console.error('Error al finalizar el carrito:', data.message);
            }
        },
        error: function(error) {
            console.error('Error al finalizar el carrito:', error);
        }
    });
}



