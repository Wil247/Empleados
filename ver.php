<?php
$file = "datos.txt";

// Verifica si el archivo existe
if (!file_exists($file)) {
    echo "<h2>El archivo no existe.</h2>";
    $valores = array_fill(0, 1, ''); // Inicializa con valores vacíos
} else {
    $data = file($file);

    // Verifica si el archivo está vacío
    if (empty($data) || empty(trim($data[0]))) {
        echo "<h2>El archivo está vacío.</h2>";
        $valores = array_fill(0, 1, ''); // Rellena el array con valores vacíos
    } else {
        $valores = []; // Inicializa el array para los valores de los datos

        // Carga todos los datos desde el archivo
        foreach ($data as $line) {
            $lineData = explode(",", trim($line)); // Divide los datos en un array
            $valores[] = [
                $lineData[0] ?? '',  // Primer Nombre
                $lineData[1] ?? '',  // Segundo Nombre
                $lineData[2] ?? '',  // Primer Apellido
                $lineData[3] ?? '',  // Segundo Apellido
                $lineData[4] ?? '',  // Cédula
                $lineData[5] ?? '',  // No. de Cuenta
                $lineData[6] ?? '',  // Sexo
                $lineData[7] ?? '',  // Correo Personal
                $lineData[8] ?? '',  // Correo Minerd
                $lineData[9] ?? '',  // Correo educación.edu.do
                $lineData[10] ?? '', // Rol / Cargo
                $lineData[11] ?? '', // Teléfono
                $lineData[12] ?? '', // Centro Educativo
                $lineData[13] ?? '', // Código de Plantel
                $lineData[14] ?? '', // Código de Centro
                $lineData[15] ?? '', // Jornada/Tanda
                $lineData[16] ?? '', // Regional
                $lineData[17] ?? '', // Distrito
                $lineData[18] ?? ''  // Zona
            ];
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí se pueden procesar los datos y guardar cambios
    if (isset($_POST['cotejos'])) {
        // Manejar los datos del formulario si se envió
        // En este caso solo se necesita verificar la selección de campos a ocultar
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Datos</title>
    <link rel="stylesheet" href="styleDatos.css">
    <style>

h2 {
    text-align: center; /* Centra el texto horizontalmente */
    margin: 20px 0; /* Espacio vertical alrededor del encabezado */
}


        table {
            border-collapse: collapse;
            width: 100%; /* La tabla ocupará todo el ancho disponible */
        }
        td {
            border: 1px solid #ccc;
            padding: 8px;
            cursor: pointer; /* Cursor de puntero para indicar que se puede seleccionar */
            text-align: left; /* Alineación del texto */
            color: black; /* Cambiar el color del texto a negro */
        }
        th {
            background-color: #08ca5b; /* Color de fondo verde para encabezados */
            color: black; /* Color del texto en los encabezados */
        }
        .selected {
            background-color: #add8e6; /* Color de fondo para celdas seleccionadas */
        }
        /* Estilo del buscador */
        #buscador {
            margin-bottom: 20px; /* Espacio debajo del buscador */
            padding: 10px; /* Espacio interno para el buscador */
            width: calc(100% - 20px); /* Ancho completo menos márgenes */
            font-size: 16px; /* Tamaño de fuente */
            border: 1px solid #ccc; /* Borde del buscador */
            border-radius: 4px; /* Bordes redondeados */
        }
        /* Estilo de los checkboxes */
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px; /* Espacio entre checkboxes */
        }
        .checkbox-item {
            flex: 1 1 30%; /* Flexibilidad de los elementos */
            display: flex;
            align-items: center; /* Centra el contenido verticalmente */
        }
        /* Estilo del botón */
        .submit-button {
            padding: 10px 20px; /* Espacio interno del botón */
            background-color: #08ca5b; /* Color de fondo verde */
            border: none; /* Sin borde */
            color: white; /* Color del texto */
            border-radius: 4px; /* Bordes redondeados */
            cursor: pointer; /* Cursor de puntero al pasar el mouse */
        }
        .submit-button:hover {
            background-color: #06b94d; /* Color al pasar el mouse */
        }
        /* Contenedor de la tabla */
        .table-container {
            overflow-x: auto; /* Habilitar desplazamiento horizontal */
            margin-top: 20px; /* Espacio superior */
            border: 1px solid #ccc; /* Borde alrededor del contenedor */
            border-radius: 4px; /* Bordes redondeados */
        }
    </style>
</head>
<body>

<header>
    <h2>Ver Datos</h2>
    <nav>
        <ul>
            <li><a href="index.php">INICIO</a></li>
            <li><a href="agregar.php">AGREGAR DATOS</a></li>
            <li><a href="inicioSeccion.php">EDITAR DATOS</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <h2>Selecciona los campos a ocultar:</h2>
    <form method="post" action="">
            <div class="checkbox-group">
                <?php 
                foreach ($encabezados as $key => $label): ?>
                    <div class="checkbox-item">
                        <label>
                        <input type="checkbox" class="mi-checkbox" name="cotejos[]" value="<?php echo $key; ?>" 
                            <?php echo (isset($_POST['cotejos']) && in_array($key, $_POST['cotejos'])) ? 'checked' : ''; ?>>

                            <?php echo $label; ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        
            <br>
            <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                <input type="submit" value="Guardar Cambios" class="submit-button" style="margin-right: 20px;"> <!-- Espacio a la derecha del botón -->
                <button type="submit" type="button" id="limpiarChecks" class="submit-button" style="margin-left: 20px; white-space: nowrap;">Quitar Cotejos</button>
                <input type="text" id="buscador" placeholder="Buscar..." style="margin-left: 40px;">
                
            </div>

            
        <h2 style="text-align: center; margin: 20px 0;">Datos a Mostrar</h2>

            <div class="table-container"> <!-- Contenedor de la tabla -->
            <table>
                <tr>
                    <?php
                    // Recorre los encabezados y crea celdas para los encabezados
                    foreach ($encabezados as $key => $label) {
                        // Verifica si el campo está marcado para ocultar
                        if (!isset($_POST['cotejos']) || !in_array($key, $_POST['cotejos'])) {
                            echo "<th>$label</th>"; // Crea un encabezado
                        }
                    }
                    ?>
                </tr>
                <tbody id="data-table">
                <?php
                // Muestra los valores correspondientes
                foreach ($valores as $row) {
                    echo "<tr>"; // Abre una fila
                    foreach ($encabezados as $key => $label) {
                        // Verifica si el campo está marcado para ocultar
                        if (!isset($_POST['cotejos']) || !in_array($key, $_POST['cotejos'])) {
                            // Encuentra el índice del valor correspondiente
                            $index = array_search($key, array_keys($encabezados)); // Busca la clave en el array
                            echo "<td>" . htmlspecialchars($row[$index]) . "</td>"; // Escapa y muestra el valor
                        }
                    }
                    echo "</tr>"; // Cierra la fila
                }
                ?>
                </tbody>
            </table>
        </div>
        <footer>
            <div class="footer-content">
                <h3>CREADO POR PROF. WILFRAN L DECENA</h3>
            </div>
        </footer>

        </div>
        
    </form>
   
<script>
    // Función de búsqueda
    document.getElementById('buscador').addEventListener('input', function() {
        const filter = this.value.toLowerCase(); // Convierte el valor a minúsculas
        const rows = document.querySelectorAll('#data-table tr'); // Selecciona todas las filas
        rows.forEach(row => {
            const cells = row.querySelectorAll('td'); // Selecciona todas las celdas de la fila
            let found = false; // Inicializa variable de búsqueda
            cells.forEach(cell => {
                if (cell.textContent.toLowerCase().includes(filter)) { // Verifica si el contenido incluye el filtro
                    found = true; // Marca como encontrado
                }
            });
            row.style.display = found ? '' : 'none'; // Muestra u oculta la fila
        });
    });
</script>

<script>
    // Función para limpiar los checkboxes
    document.getElementById('limpiarChecks').addEventListener('click', function() {
        const checkboxes = document.querySelectorAll('.mi-checkbox');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = false; // Desmarcar cada checkbox
        });
    });
</script>
</div>
</body>
</html>
