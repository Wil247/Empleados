<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Datos</title>
    <link rel="stylesheet" href="styleDatos.css">

    <style>
        .form-style {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .submit-btn {
            grid-column: span 4;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }
        </style>
   
</head>
<body>


    <div class="container">
        <header>
            <h2>Agregar Datos</h2>
            <nav>
                <ul>
                    <li><a href="index.php">INICIO</a></li>
                    <li><a href="ver.php">VER DATOS</a></li>
                    <li><a href="inicioSeccion.php">EDITAR DATOS</a></li>
                </ul>
            </nav>
        </header>

            <form method="post" class="form-style">
                <div class="form-group">
                    <label for="primer_nombre">Primer Nombre:</label>
                    <input type="text" id="primer_nombre" name="primer_nombre" required>
                </div>

                <div class="form-group">
                    <label for="segundo_nombre">Segundo Nombre:</label>
                    <input type="text" id="segundo_nombre" name="segundo_nombre">
                </div>

                <div class="form-group">
                    <label for="primer_apellido">Primer Apellido:</label>
                    <input type="text" id="primer_apellido" name="primer_apellido" required>
                </div>

                <div class="form-group">
                    <label for="segundo_apellido">Segundo Apellido:</label>
                    <input type="text" id="segundo_apellido" name="segundo_apellido">
                </div>

                <div class="form-group">
                    <label for="cedula">Cédula:</label>
                    <input type="text" id="cedula" name="cedula" required>
                </div>

                <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <select id="sexo" name="sexo" required>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="acceso_correo">Correo Personal:</label>
                    <input type="text" id="acceso_correo" name="acceso_correo">
                </div>

                <div class="form-group">
                    <label for="correo_minerd">Correo Minerd:</label>
                    <input type="email" id="correo_minerd" name="correo_minerd">
                </div>

                <div class="form-group">
                    <label for="correo_educacion">Correo Educación:</label>
                    <input type="email" id="correo_educacion" name="correo_educacion">
                </div>

                <div class="form-group">
                    <label for="rol_cargo">Rol/Cargo:</label>
                    <select id="rol_cargo" name="rol_cargo" required>
                        <option value="Director">Director (a)</option>
                        <option value="Coordinador TIC">Coordinador (a) TIC</option>
                        <option value="Adm/Secretario Auxiliar">Adm/Secretario (a) Auxiliar</option>
                        <option value="Adm/Coordinador de Registro A">Adm/Coordinador (a) de Registro A</option>
                        <option value="Docente">Docente</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="serial_dispositivo">Serial de Dispositivo:</label>
                    <input type="text" id="serial_dispositivo" name="serial_dispositivo">
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono">
                </div>

                <div class="form-group">
                    <label for="centro_educativo">Centro Educativo:</label>
                    <input type="text" id="centro_educativo" name="centro_educativo">
                </div>

                <div class="form-group">
                    <label for="codigo_plantel">Código de Plantel:</label>
                    <input type="text" id="codigo_plantel" name="codigo_plantel">
                </div>

                <div class="form-group">
                    <label for="codigo_centro">Código de Centro:</label>
                    <input type="text" id="codigo_centro" name="codigo_centro">
                </div>

                <div class="form-group">
                    <label for="jornada_tanda">Jornada/Tanda:</label>
                    <input type="text" id="jornada_tanda" name="jornada_tanda">
                </div>

                <div class="form-group">
                    <label for="regional">Regional:</label>
                    <input type="text" id="regional" name="regional">
                </div>

                <div class="form-group">
                    <label for="distrito">Distrito:</label>
                    <input type="text" id="distrito" name="distrito">
                </div>

                <div class="form-group">
                    <label for="zona">Zona:</label>
                    <input type="text" id="zona" name="zona">
                </div>

                <div class="form-group">
                    <label for="numero_cuenta">No. de Cuenta:</label>
                    <input type="text" id="numero_cuenta" name="numero_cuenta">
                </div>
            </form>
            <br>
            <div class="form-group">
                    <input type="submit" value="Guardar datos" class="submit-btn">
                </div>
            <br><br>
                
        <div>
            <img src="agregarDatos.webp" alt="">
        </div>


        <footer>
            <div class="footer-content">
                <h3>CREADO POR PROF. WILFRAN L DECENA</h3>
            </div>
        </footer>
    </div>

</body>
</html>
