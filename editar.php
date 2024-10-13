<?php
$file = "datos.txt";
$alertMessage = '';

// Verifica si el archivo existe
if (!file_exists($file)) {
    $alertMessage = "El archivo no existe.";
    $valores = array_fill(0, 1, ''); // Inicializa con valores vacíos
} else {
    $data = file($file);

    // Verifica si el archivo está vacío
    if (empty($data) || empty(trim($data[0]))) {
        $alertMessage = "El archivo está vacío.";
        $valores = array_fill(0, 1, ''); // Rellena el array con valores vacíos
    } else {
        $valores = [];

        // Carga todos los datos desde el archivo
        foreach ($data as $line) {
            $lineData = explode(",", trim($line));
            $valores[] = array_map('trim', $lineData); // Usar array_map para limpiar espacios
        }
    }
}

// Encabezados de los campos
$encabezados = [
    'primer_nombre' => 'Primer Nombre',
    'segundo_nombre' => 'Segundo Nombre',
    'primer_apellido' => 'Primer Apellido',
    'segundo_apellido' => 'Segundo Apellido',
    'cedula' => 'Cédula',
    'numero_cuenta' => 'No. de Cuenta',
    'sexo' => 'Sexo',
    'correo_personal' => 'Correo Personal',
    'correo_minerd' => 'Correo Minerd',
    'correo_educacion' => 'Correo educación.edu.do',
    'rol_cargo' => 'Rol / Cargo',
    'telefono' => 'Teléfono',
    'centro_educativo' => 'Centro Educativo',
    'codigo_plantel' => 'Código de Plantel',
    'codigo_centro' => 'Código de Centro',
    'jornada_tanda' => 'Jornada/Tanda',
    'regional' => 'Regional',
    'distrito' => 'Distrito',
    'zona' => 'Zona'
];

// Procesar el formulario al enviar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevosDatos = $_POST['datos'];
    $cedulasInput = $_POST['cedulas'];

    // Divide las cédulas por comas o espacios y elimina espacios en blanco
    $cedulas = preg_split('/[\s,]+/', $cedulasInput);

    $actualizado = false;

    foreach ($valores as &$row) {
        foreach ($cedulas as $cedula) {
            if (trim($cedula) === trim($row[4])) {
                // Actualiza los datos de la fila correspondiente
                foreach ($nuevosDatos as $key => $value) {
                    if (!empty($value)) {
                        $row[array_search($key, array_keys($encabezados))] = $value;
                    }
                }

                // Guardar los cambios en el archivo
                $newData = array_map(function ($row) {
                    return implode(",", $row);
                }, $valores);
                file_put_contents($file, implode(PHP_EOL, $newData) . PHP_EOL);
                
                $actualizado = true;
                break;
            }
        }
    }

    // Establecer mensaje de alerta
    $alertMessage = $actualizado ? "Datos actualizados correctamente." : "Número de cédula incorrecta.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Datos</title>
    <link rel="stylesheet" href="styleDatos.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .cedulas, input[type="submit"] { /* Asegúrate de usar el selector correcto para el botón */
        margin-bottom: 20px; /* Espacio debajo del buscador */
        background-color: lightgreen; /*
        padding: 10px; /* Espacio interno para el buscador */
        width: calc(100% - 20px); /* Ancho completo menos márgenes */
        font-size: 16px; /* Tamaño de fuente */
        font:strong;
        border: 1px solid #ccc; /* Borde del buscador */
        border-radius: 4px; /* Bordes redondeados */
        height: 40px; /* Ajusta el alto sin espacio adicional */
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        .table-container {
            overflow-x: auto; /* Permite el deslizamiento horizontal */
            margin: 20px;
        }

        table {
            width: 100%; /* Para que la tabla ocupe el 100% del contenedor */
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            width: 100%; /* Asegura que los inputs ocupen todo el ancho */
            box-sizing: border-box; /* Incluye padding y border en el ancho total */
        }

        input[type="submit"] {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<header>
    <h1>Edición de Datos</h1>
    <nav>
        <ul>
            <li><a href="index.php">INICIO</a></li>
            <li><a href="ver.php">VER DATOS</a></li>
            <li><a href="agregar.php">AGREGAR DATOS</a></li>
        </ul>
    </nav>
</header>

<?php if ($alertMessage): ?>
    <script>
        alert('<?php echo addslashes($alertMessage); ?>');
    </script>
<?php endif; ?>


<div class="container">
<div class="table-container">
<form method="POST" action="">
    <label for="cedulas"></label><br>
    <input type="text" id="cedulas" name="cedulas" class="cedulas" placeholder="Ingrese las cédulas (separadas por comas o espacios):" required><br>
    <br>
    <h3>Ingrese los nuevos datos (dejar en blanco si no desea cambiar):</h3>
    <table>
        <thead>
            <tr>
                <?php foreach ($encabezados as $label): ?>
                    <th><?php echo htmlspecialchars($label); ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php foreach ($encabezados as $key => $label): ?>
                    <td>
                        <label for="<?php echo $label; ?>"><?php echo htmlspecialchars($label); ?>:</label><br>
                        <input type="text" id="<?php echo $label; ?>" name="datos[<?php echo htmlspecialchars($key); ?>]" value="<?php echo htmlspecialchars($valores[0][$key] ?? ''); ?>">
                    </td>
                <?php endforeach; ?>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="Actualizar Datos">
</form>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <?php foreach ($encabezados as $label): ?>
                    <th><?php echo $label; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($valores as $row): ?>
                <tr>
                    <?php foreach ($row as $cell): ?>
                        <td><?php echo htmlspecialchars($cell); ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>
