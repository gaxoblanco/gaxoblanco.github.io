<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/styles.css">
    <title>TP integrado Front End</title>
</head>

<body>
    <header class=" header_container">
        <div class="container">
            <nav class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="/TP-integrador-frontEnd"
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <img class="logo_s" src="./assets/img/codoacodo.png" alt="logo de codo a codo" />
                    <span class="fs-4 header_nav-title">Conf Bs As</span>
                </a>

                <ul class="nav">
                    <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">La conferencia</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Los oradores</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">El lugar y la fecha</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Conviértete en orador</a></li>
                    <li class="nav-item"><a href="/TP-integrador-frontEnd/tickets.php"
                            class="nav-link color-action">Comprar tickets</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- section one -->
    <section class="section_one-container">
        <div class="section_one-container_text">
            <h1>Conf Bs As</h1>
            <p>Bs As llega por primera vez a Argentina. Un evento para compartir con nuestra comunidad el conocimiento
                y experiencia de los expertos que están creando el futuro de internet. Ven a conocer a miembros del
                evento,
                a otros estudiantes de Codo a Codo y los oradores de primer nivel que tenemos para ti. Te experamos!
            </p>
            <div class="button_container">
                <a type="button" class="btn btn-trasparent" href="#orador_section">Quiero ser
                    orador</a>
                <a href="/TP-integrador-frontEnd/tickets.php">
                    <button type="button" class="btn btn-success">Comprar tickets</button>
                </a>
            </div>
        </div>
    </section>

    <!-- section two -->
    <section class="section_two">
        <div class="section-title">
            <span>CONOCE A LOS</span>
            <P>ORADORES</P>
        </div>
        <!-- Aquí se generarán las tarjetas de los oradores -->
        <div id="carouselOradores" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner continer">
                <?php
                // Realizar la conexión a la base de datos
                $conexion = mysqli_connect("localhost", "gaston", "blanco", "codoacodo");

                if (mysqli_connect_error()) {
                    echo "Error de conexión: " . mysqli_connect_error();
                    exit;
                }

                // Consulta para obtener los oradores
                $query = "SELECT * FROM oradores";
                $result = mysqli_query($conexion, $query);

                // Verificar si hay resultados
                if (mysqli_num_rows($result) > 0) {
                    // Obtener el número total de oradores
                    $totalOradores = mysqli_num_rows($result);

                    // Calcular el número de elementos por slide
                    $elementosPorSlide = 3;

                    // Calcular el número de slides necesarios
                    $numSlides = ceil($totalOradores / $elementosPorSlide);

                    $active = true;
                    $contador = 0;
                    // Iterar sobre los resultados y generar las tarjetas de los oradores
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = $row['name'];
                        $topic = $row['topic'];
                        $img = $row['img'];

                        // Si el contador es igual a 0, abrimos un nuevo slide
                        if ($contador == 0) {
                            echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">';
                            echo '<div class="row">';
                        }
                        ?>

                        <div class="col-md-4" style="display: flex; place-content: center;">
                            <div class="card" style="width: 18rem;">
                                <?php
                                echo '<img src="' . $img . '" class="card-img-top" alt="img no encontrada">';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">' . $name . '</h5>';
                                echo '<p class="card-text">' . $topic . '</p>';
                                ?>
                            </div>
                        </div>
                    </div>

                    <?php
                    $contador++;

                    // Si el contador es igual al número de elementos por slide, cerramos el slide actual
                    if ($contador == $elementosPorSlide) {
                        echo '</div>';
                        echo '</div>';

                        $contador = 0;
                        $active = false;
                    }
                    }

                    // Si quedan elementos sin cerrar el último slide
                    if ($contador > 0) {
                        echo '</div>';
                        echo '</div>';
                    }
                }


                mysqli_close($conexion);
                ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselOradores" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselOradores" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>


    </section>

    <!-- section tree -->
    <section class="section_tree">
        <img src="./assets/img/honolulu.jpg" alt="imagen de una playa" />
        <div class="section_tree-right">
            <h3>Bs As - Octubre</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse odit voluptatum tempore minus ducimus
                accusamus deserunt dolores facere eos reiciendis voluptate est autem ullam alias quisquam, fugit
                veritatis quas at!</p>
            <button type="button" class="btn btn-trasparent">Conocé más</button>
        </div>
    </section>

    <!-- section fourth -->
    <section class="section_fourth" id='orador_section'>
        <div class="section-title">
            <span>CONVIERTETE EN UN</span>
            <P>ORADOR</P>
            <h5>Anótate como orador para dar una charla. Cuéntanos de qué quieres hablar!</h5>
        </div>
        <form class="form" id="formOrador" action="./php/post-orador.php" method="post">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="img">URL de la imagen:</label>
                <input type="text" class="form-control" id="img" name="img" required>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="JavaScript">
                <label class="form-check-label" for="inlineCheckbox1">JavaScript</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Python">
                <label class="form-check-label" for="inlineCheckbox2">Python</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Java">
                <label class="form-check-label" for="inlineCheckbox3">Java</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Java">
                <label class="form-check-label" for="inlineCheckbox3">IA</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Java">
                <label class="form-check-label" for="inlineCheckbox3">Cripto</label>
            </div>
            <div class="form-group">
                <label for="topic">Tema:</label>
                <!-- <input type="text" class="form-control" id="topic" name="topic" required> -->
                <textarea type="text" class="form-control" id="topic" name="topic" required></textarea>
            </div>
            <button type="submit" class="btn btn-form_submit">Enviar</button>
        </form>
    </section>
    <!-- footer -->
    <footer class="py-3 footer_bg">
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
<script src="./js/oradores.js"></script>

<!-- Resto del código HTML -->
<script>
    // Obtener los datos de la API
    fetch('URL_DE_LA_API')
        .then(response => response.json())
        .then(data => {
            // Llamar a la función displayRandomImages con los datos de la API
            displayRandomImages(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });

    // Función para mostrar las imágenes recibidas por la API
    function displayRandomImages(images) {
        const container = document.getElementById('image-container');
        container.innerHTML = '';
        const groupElement = document.createElement('div');
        groupElement.classList.add('image-group');
        images.forEach(image => {
            const linkElement = document.createElement('a');
            linkElement.href = image.url;
            const imgElement = document.createElement('img');
            imgElement.src = image.img;
            imgElement.classList.add('image');
            linkElement.appendChild(imgElement);
            groupElement.appendChild(linkElement);
        });
        container.appendChild(groupElement);
        groupElement.classList.add('groupElement');
        groupElement.setAttribute('data-aos', 'fade-left');
    }
</script>
<!-- Resto del código HTML -->


</html>