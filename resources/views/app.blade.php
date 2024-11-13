<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title >Epi5</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
        <style>
            /* Reset de márgenes y paddings */
            /* Reset de márgenes y paddings */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Estilos generales */
body {
    background-color: #f4f9f4; /* Fondo suave verde claro */
    color: #333;
    line-height: 1.6;
}

/* Contenedor principal */
.container {
    width: 80%;
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}

/* Encabezado */
header {
    background-color: #2e7d32; /* Verde Pacay Oscuro */
    color: #fff;
    padding: 20px 0;
    text-align: center;
    border-bottom: 5px solid #66bb6a; /* Verde Medio */
}

header h1 {
    font-size: 2.5rem;
}

header p {
    font-size: 1.2rem;
}

/* Sección de Bienvenida */
.welcome-section {
    text-align: center;
    padding: 40px 0;
    background-color: #e8f5e9; /* Verde Claro */
}

.welcome-section h2 {
    font-size: 2rem;
    margin-bottom: 10px;
    color: #2e7d32; /* Verde Pacay Oscuro */
}

.welcome-section p {
    font-size: 1rem;
    color: #4caf50; /* Verde Medio */
}

/* Sección de Inicio de Sesión */
.login-section {
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding: 30px;
    margin-top: 20px;
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
}

.login-section h2 {
    text-align: center;
    color: #2e7d32; /* Verde Pacay Oscuro */
    margin-bottom: 20px;
}

.login-section form {
    display: flex;
    flex-direction: column;
}

.login-section label {
    margin-bottom: 8px;
    font-weight: bold;
}

.login-section input {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #c8e6c9; /* Verde Claro */
    border-radius: 5px;
    font-size: 1rem;
}

.login-section input:focus {
    border-color: #4caf50; /* Verde Medio */
    outline: none;
}

.login-section button {
    background-color: #2e7d32; /* Verde Pacay Oscuro */
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.login-section button:hover {
    background-color: #1b5e20; /* Verde Más Oscuro */
}

/* Pie de Página */
footer {
    text-align: center;
    padding: 15px 0;
    background-color: #2e7d32; /* Verde Pacay Oscuro */
    color: #fff;
    position: fixed;
    bottom: 0;
    width: 100%;
    font-size: 0.9rem;
}
.login{
    color: white;
}


        </style>
    </head>
    <body class="font-sans antialiased">
        @inertia
        
         <!-- Encabezado -->
    <header>
        <div class="container">
            <h1 class="login"><a class="login" href="{{ url('/admin/login') }}">Login</a></h1>
            <h1>Préstamos de Equipos Policiales</h1>
            <p>Policía Boliviana</p>
        </div>
    </header>

    <section class="login-section">
        <div class="container">
            <img src="{{ asset('image/logo.jpeg') }}" alt="">
        </div>
    </section>
    
    <!-- Sección de Bienvenida -->
    <section class="welcome-section">
        <div class="container">
            <h2>Bienvenido al Sistema de Gestión de Préstamos</h2>
            <p>Acceda al sistema para gestionar el préstamo y la devolución de equipos policiales.</p>
        </div>
    </section>




    <!-- Formulario de Inicio de Sesión -->
    

    <!-- Pie de Página -->
    <footer>
        <p>&copy; 2024 Policía Boliviana. Todos los derechos reservados.</p>
    </footer>
    </body>
</html>
