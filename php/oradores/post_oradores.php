<?php
require_once __DIR__ . '/../config.php';

// Obtener los valores enviados desde el formulario
$name = $_POST['name'];
$topic = $_POST['topic'];
$codingLenguages = $_POST['codingLenguage'];

// Procesar la imagen
$targetDir = "uploads/"; // Directorio de destino para guardar las imágenes
$targetFile = $targetDir . basename($_FILES["img"]["name"]); // Ruta completa del archivo de imagen
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Verificar si el archivo de imagen es válido
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if ($check !== false) {
        echo "El archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }
}

// Verificar si ya existe un archivo con el mismo nombre
if (file_exists($targetFile)) {
    echo "Lo siento, el archivo ya existe.";
    $uploadOk = 0;
}

// Verificar el tamaño máximo del archivo (opcional)
if ($_FILES["img"]["size"] > 500000) {
    echo "Lo siento, el tamaño del archivo es demasiado grande.";
    $uploadOk = 0;
}

// Permitir solo ciertos formatos de imagen (puedes ajustarlos según tus necesidades)
$allowedFormats = array("jpg", "jpeg", "png", "gif");
if (!in_array($imageFileType, $allowedFormats)) {
    echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
    $uploadOk = 0;
}

// Verificar si $uploadOk es 0 debido a un error
if ($uploadOk == 0) {
    echo "Lo siento, el archivo no se pudo subir.";
} else {
    // Si todo está bien, intentar subir el archivo
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
        echo "El archivo " . basename($_FILES["img"]["name"]) . " ha sido subido correctamente.";

        // Insertar los datos en la tabla "oradores"
        $sql = "INSERT INTO oradores (name, topic, img) VALUES ('$name', '$topic', '$targetFile')";
        if ($conn->query($sql) === TRUE) {
            $lastInsertedId = $conn->insert_id;

            // Insertar las relaciones en la tabla "oradores_codingLenguage"
            foreach ($codingLenguages as $codingLenguage) {
                $sqlRel = "INSERT INTO oradores_codingLenguage (orador_id, codingLenguage_id) VALUES ($lastInsertedId, '$codingLenguage')";
                $conn->query($sqlRel);
            }

            echo "Los datos se han guardado correctamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Lo siento, hubo un error al subir el archivo.";
    }
}

$conn->close();
?>