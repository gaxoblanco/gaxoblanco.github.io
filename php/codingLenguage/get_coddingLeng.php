<?php
require_once './config.php'; // Incluye el archivo de configuración de la base de datos

$sql = "SELECT * FROM codingLenguage";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $codingLenguage = array(); // Array para almacenar los datos de los lenguajes de programación

    // Recorre cada fila de resultados
    while ($row = $result->fetch_assoc()) {
        // Agrega cada fila al array de lenguajes de programación
        $codingLenguage[] = $row;
    }

    // Devuelve los datos de los lenguajes de programación en formato JSON
    echo json_encode($codingLenguage);
} else {
    echo "No se encontraron resultados en la tabla 'codingLenguage'.";
}

$conn->close();
?>