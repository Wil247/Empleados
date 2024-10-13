<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Datos</title>
    <link rel="stylesheet" href="styleDatos.css">
    <style>
        nav ul {
            list-style: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 10px;
        }
        .container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .login-form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin: 0 20px;
        }
        .login-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-form button {
            background-color: #08ca5b;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
       
        /* Filtro de fondo oscuro */
        .alert-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none; /* Oculto por defecto */
        }

    </style>
    <script>
        // Mostrar la alerta personalizada
        function mostrarAlerta(mensaje) {
            document.querySelector('.alert-overlay').style.display = 'block';
            document.querySelector('.custom-alert').style.display = 'block';
            document.querySelector('.custom-alert p').textContent = mensaje;
        }

        // Ocultar la alerta personalizada
        function ocultarAlerta() {
            document.querySelector('.alert-overlay').style.display = 'none';
            document.querySelector('.custom-alert').style.display = 'none';
            document.querySelector('input[name="username"]').value = "";  // Borrar usuario
            document.querySelector('input[name="password"]').value = "";  // Borrar contraseña
        }

        // Validar usuario y contraseña en el lado del cliente
        function validarLogin(event) {
            event.preventDefault(); // Evitar que el formulario se envíe

            var usuario = document.querySelector('input[name="username"]').value.trim().toLowerCase();
            var contraseña = document.querySelector('input[name="password"]').value.trim();

            // Usuario y contraseña correctos (solo para prueba; la validación real debe ser del lado del servidor)
            if (usuario === 'gaston' && contraseña === 'GASTON0305'.toLowerCase()) {
                window.location.href = 'editar.php'; // Redirigir si las credenciales son correctas
            } else {
                mostrarAlerta("Usuario o contraseña incorrectos.");
            }
        }
    </script>
</head>
<body>

<header>
    <h2>INICIAR SESIÓN PARA PODER EDITAR</h2>
    <nav>
        <ul>
            <li><a href="index.php">INICIO</a></li>
            <li><a href="editar.php">VER DATOS</a></li>
            <li><a href="agregar.php">AGREGAR DATOS</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <div class="login-form">
        <h3>Iniciar Sesión</h3>
        <form onsubmit="validarLogin(event)"> <!-- Llamar a la función JavaScript al enviar el formulario -->
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <div id="message"></div> <!-- Mensaje de error -->
    </div>
</div>

<!-- Alerta personalizada -->
<div class="alert-overlay"></div>
<div class="custom-alert">
    <p></p>
    <button onclick="ocultarAlerta()">Okay</button>
</div>

<footer>
    <div class="footer-content">
        <h3>CREADO POR PROF. WILFRAN L DECENA</h3>
    </div>
</footer>
</body>
</html>
