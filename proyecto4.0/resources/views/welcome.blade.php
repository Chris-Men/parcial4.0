<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafetería</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Enlace al archivo CSS externo -->
</head>

<body>
    <div class="header">
        <div>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
        <a href="#">
            <link rel="stylesheet" href="{{ asset('css/animado.css') }}"> <!-- Enlace al archivo CSS externo -->

            <div class="loader"><i class="fas fa-coffee" style="font-size: 20px;"></i></div>

            
        </a>
    </div>

    <h2>
        <center>Bebidas</center>
    </h2>

    <div class="container">
        <div class="card">
            <img src="{{ asset('imagenes/cafe con crema batida.jpg') }}" alt="" height="300em">
            <div class="card-body">
                <h5 class="card-title">cafe con crema batida</h5>
                <button type="button" class="btn btn-price">$2.00</button>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('imagenes/cafe espeso.jpg') }}" alt="" height="300em">
            <div class="card-body">
                <h5 class="card-title">Café espeso</h5>
                <button type="button" class="btn btn-price">$2.00</button>

            </div>
        </div>

        <div class="card">
            <img src="{{ asset('imagenes/capuchino.jpg') }}" alt="" height="300em">
            <div class="card-body">
                <h5 class="card-title">Capuchino</h5>
                <button type="button" class="btn btn-price">$2.00</button>

            </div>
        </div>

        <div class="card">
            <img src="{{ asset('imagenes/cafe negro.jpg') }}" alt="" height="300em">
            <div class="card-body">
                <h5 class="card-title">Café Negro</h5>
                <button type="button" class="btn btn-price">$2.00</button>
            </div>
        </div>
    </div>

        <h2>
            <center>Postres</center>
        </h2>
        <div class="container">

        <div class="card">
            <img src="{{ asset('imagenes/cheesecake.jpg') }}" alt="" height="300em">
            <div class="card-body">
                <h5 class="card-title">cheesecake </h5>
                <button type="button" class="btn btn-price">$3.00</button>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('imagenes/crema pastelera.jpg') }}" alt="" height="300em">
            <div class="card-body">
                <h5 class="card-title">crema pastelera</h5>
                <button type="button" class="btn btn-price">$2.00</button>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('imagenes/pastel de mora.jpg') }}" alt="" height="300em">
            <div class="card-body">
                <h5 class="card-title">Pastel de mora</h5>
                <button type="button" class="btn btn-price">$2.00</button>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('imagenes/stuffed.jpg') }}" alt="" height="300em">
            <div class="card-body">
                <h5 class="card-title">Stuffed</h5>
                <button type="button" class="btn btn-price">$3.00</button>
            </div>
        </div>
        </div>

        <h2>
            <center>Local</center>
        </h2>
        <div class="container">

        <div class="card">
            <img src="{{ asset('imagenes/mesas1.jpg') }}" alt="100em" height="300em">
            <div class="card-body">
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('imagenes/mesas2.jpg') }}" alt="100em" height="300em">
            <div class="card-body">
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('imagenes/mesas3.jpg') }}" alt="100em" height="300em">
            <div class="card-body">
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('imagenes/mesas4.jpg') }}" alt="100em" height="300em">
            <div class="card-body">
            </div>
        </div>
        </div>
    
</body>

</html>
