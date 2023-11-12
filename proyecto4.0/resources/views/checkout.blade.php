@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}"> <!-- Enlace al archivo CSS externo -->

    <div class="container">
        <h1 class="text-center">Checkout de Compra</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Resumen del Carrito</h2>
                <ul id="carrito-container" class="list-group">
                    <!-- Aquí se mostrarán los productos del carrito -->
                </ul>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <p class="text-center">
                            <a href="{{ route('cart') }}" class="btn btn-primary">Ir al Carrito</a>
                        </p>
            
                        <button onclick="finalizarCompra()" class="btn btn-primary">Finalizar Compra y Pagar con PayPal</button>
                    </div>
                </div>
            </div>
            

    <script>
        // Cargar el carrito del LocalStorage
        var carrito = JSON.parse(localStorage.getItem('carrito')) || [];

        // Obtener el elemento donde se mostrarán los productos del carrito
        var carritoContainer = document.getElementById('carrito-container');

        // Función para mostrar los productos del carrito
        function mostrarProductosDelCarrito() {
            if (carrito.length === 0) {
                carritoContainer.innerHTML = '<p>El carrito está vacío</p>';
            } else {
                carritoContainer.innerHTML = ''; // Limpiar contenido previo

                carrito.forEach(function(producto, index) {
                    var listItem = document.createElement('li');
                    listItem.className = 'list-group-item d-flex justify-content-between align-items-center lh-sm';

                    var nombreProducto = document.createElement('div');
                    nombreProducto.innerHTML = '<h4 class="my-0">' + producto.nombre +
                        '</h4><small class="text-body-secondary"><h5 class="my-0">Cantidad: ' + producto.cantidad +
                        '</h5></small>';

                    var precioProducto = document.createElement('span');
                    precioProducto.className = 'text-body-secondary';
                    precioProducto.innerHTML = '<h5 class="my-0">$' + (producto.precio * producto.cantidad).toFixed(2) +
                        '</h5>';

                    var eliminarButton = document.createElement('button');
                    eliminarButton.className = 'eliminar-button';
                    eliminarButton.innerHTML = 'Eliminar de la lista';
                    eliminarButton.onclick = function() {
                        eliminarProducto(index);
                    };

                    listItem.appendChild(nombreProducto);
                    listItem.appendChild(precioProducto);
                    listItem.appendChild(eliminarButton);

                    carritoContainer.appendChild(listItem);
                });

                var totalVenta = carrito.reduce(function(total, producto) {
                    return total + producto.precio * producto.cantidad;
                }, 0);

                var totalVentaRedondeado = totalVenta.toFixed(2);

                var totalItem = document.createElement('li');
                totalItem.className = 'list-group-item d-flex justify-content-between';
                totalItem.innerHTML = '<span><h4 class="my-0">Total (USD)</h4></span><strong><h4 class="my-0">$' +
                    totalVentaRedondeado + '</h4></strong>';

                carritoContainer.appendChild(totalItem);
            }
        }

        function eliminarProducto(index) {
            carrito.splice(index, 1);
            localStorage.setItem('carrito', JSON.stringify(carrito));
            mostrarProductosDelCarrito();
        }

        // Función para finalizar la compra y pagar con PayPal
        function finalizarCompra() {
            // Construir la URL de PayPal con los parámetros necesarios
            var usuarioId = "{{ auth()->user()->id }}";
            var token = "{{ csrf_token() }}";
            var carritoJson = JSON.stringify(carrito);
            var total = calcularTotal().toFixed(2);;

            var paypalUrl = "{{ route('processPaypal') }}" +
                "?usuario=" + usuarioId +
                "&_token=" + token +
                "&carrito=" + encodeURIComponent(carritoJson) +
                "&total=" + total;

            // Limpiar el carrito en el LocalStorage
            localStorage.removeItem('carrito');

            // Redirigir a PayPal
            window.location.href = paypalUrl;
        }

        // Cargar y mostrar productos del carrito al cargar la página
        mostrarProductosDelCarrito();

        // Función para calcular el total del carrito
        function calcularTotal() {
            var totalVenta = carrito.reduce(function(total, producto) {
                return total + producto.precio * producto.cantidad;
            }, 0);

            return totalVenta;
        }
    </script>
@endsection
