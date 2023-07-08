<?php
require_once './config.php'; // Incluye el archivo de configuración de la base de datos

$sql = "SELECT * FROM oradores";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $oradores = array(); // Array para almacenar los datos de los oradores

    // Recorre cada fila de resultados
    while ($row = $result->fetch_assoc()) {
        // Agrega cada fila al array de oradores
        $oradores[] = $row;
    }

    // Devuelve los datos de los oradores en formato JSON
    echo json_encode($oradores);
} else {
    echo "No se encontraron resultados en la tabla 'oradores'.";
}

$conn->close();
?>