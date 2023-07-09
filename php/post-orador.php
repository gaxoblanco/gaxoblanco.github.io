<?php
$conexion = mysqli_connect("localhost", "gaston", "blanco", "codoacodo");

if (mysqli_connect_error()) {
    echo "Error de conexión: " . mysqli_connect_error();
    exit;
}

// Recibir los valores del formulario
$name = $_POST['name'];
$topic = $_POST['topic'];
$img = $_POST['img'];
$codingLanguages = $_POST['codingLenguage'];

// Insertar los valores en la tabla 'oradores'
$query = "INSERT INTO oradores (name, topic, img) VALUES ('$name', '$topic', '$img')";

?>



<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

</html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles/post-orador.css">
    <title>TP integrado Front End</title>
</head>

<body>
    <header class=" header_container">
        <div class="container">
            <nav class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <img class="logo_s" src="../assets/img/codoacodo.png" alt="logo de codo a codo" />
                    <span class="fs-4 header_nav-title">Conf Bs As</span>
                </a>

                <ul class="nav">
                    <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">La conferencia</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Los oradores</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">El lugar y la fecha</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Conviértete en orador</a></li>
                    <li class="nav-item"><a href="/tickets.html" class="nav-link color-action">Comprar tickets</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container post_container">
        <!-- php -->
        <?php
        if (mysqli_query($conexion, $query)) {
            ?>

            <!-- HTML -->
            <div class="card card_sussces">
                <div class="card-body">
                    <h5 class="card-title">Felicidades ya eres un orador</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">Te estaremos enviando un email con mas informacion de como seguir</p>

                    <a href="/TP-integrador-frontEnd" class="btn btn-info">Volver al Home</a>
                </div>
            </div>

            <!-- PHP -->
            <?php
        } else {
            echo "Error al guardar los datos: " . mysqli_error($conexion);
        }

        mysqli_close($conexion);
        ?>

        <!-- HTLM -->
    </div>
    <!-- footer -->
    <footer class="py-3 footer_bg footer">
        <ul class="nav footer_container pb-3 mb-3">
            <li class="nav-item"><a href="#" class="footer_li">Preguntas <br> frecuentes</a></li>
            <li class="nav-item"><a href="#" class="footer_li">Contáctanos</a></li>
            <li class="nav-item"><a href="#" class="footer_li">Prensa</a></li>
            <li class="nav-item"><a href="#" class="footer_li">Conferencias</a></li>
            <li class="nav-item"><a href="#" class="footer_li">Términos y <br> condiciones</a></li>
            <li class="nav-item"><a href="#" class="footer_li">Privacidad</a></li>
            <li class="nav-item"><a href="#" class="footer_li">Estudiantes</a></li>
        </ul>
    </footer>
</body>
<!-- js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</html>