<?php
// Realizar la conexión a la base de datos
$conexion = mysqli_connect("localhost", "gaston", "blanco", "codoacodo");

if (mysqli_connect_error()) {
  echo "Error de conexión: " . mysqli_connect_error();
  exit;
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los valores del formulario
  $nombre = $_POST["inputNombre"];
  $apellido = $_POST["inputApellido"];
  $correo = $_POST["inputEmail"];
  $cantidad = $_POST["inputCantidad"];
  $categoria = $_POST["inputCategoria"];

  // Insertar los datos en la tabla tickets
  $query = "INSERT INTO tickets (nombre, apellido, correo, cantidad, categoria) VALUES ('$nombre', '$apellido', '$correo', $cantidad, '$categoria')";
  mysqli_query($conexion, $query);
}


?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/styles.css">
  <link rel="stylesheet" href="./styles/tickets.css">
  <title>Document</title>
</head>

<body>
  <header class=" header_container">
    <div class="container">
      <nav class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
          <img class="logo_s" src="./assets/img/codoacodo.png" alt="logo de codo a codo" />
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
  <main>
    <section class="container mt-5">
      <div class="row">
        <article class="col">
          <div class="card border-info border-4 mb-3" style="max-width: 18rem;">
            <div class="card-body text-primary ">
              <h5 class="card-title">Estudiante</h5>
              <p class="card-text">Descuento</p>
              <h4>80%</h4>
              <p>presentar documentación</p>
            </div>
          </div>
        </article>
        <article class="col">
          <div class="card border-success border-4 mb-3" style="max-width: 18rem;">
            <div class="card-body text-primary">
              <h5 class="card-title">Trainer</h5>
              <p class="card-text">Descuento</p>
              <h4>50%</h4>
              <p>presentar documentación</p>
            </div>
          </div>
        </article>
        <article class="col">
          <div class="card border-warning border-4 mb-3" style="max-width: 18rem;">
            <div class="card-body text-primary">
              <h5 class="card-title">Junior</h5>
              <p class="card-text">Descuento</p>
              <h4>15%</h4>
              <p>presentar documentación</p>
            </div>
          </div>
        </article>
      </div>
    </section>
    <section class="container mt-5 section_ticket_form">
      <h3 class="section-form formulario-oculto">Venta</h3>
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="formulario-oculto">
        <h2>Valor del Ticket $200</h2>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputNombre">Nombre</label>
            <input name="inputNombre" type="text" class="form-control required" id="inputNombre" placeholder="Nombre"
              required>
            <div class="invalid-feedback">
              Por favor, ingresa tu nombre.
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="inputApellido">Apellido</label>
            <input name="inputApellido" type="text" class="form-control required" id="inputApellido"
              placeholder="Apellido" required>
            <div class="invalid-feedback">
              Por favor, ingresa tu apellido.
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail">Correo</label>
          <input name="inputEmail" type="email" class="form-control required" id="inputEmail" placeholder="Correo"
            required>
          <div class="invalid-feedback">
            Por favor, ingresa una dirección de correo válida.
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCantidad">Cantidad</label>
            <input name="inputCantidad" type="number" class="form-control required" id="inputCantidad"
              placeholder="Cantidad" required>
            <div class="invalid-feedback">
              Por favor, ingresa la cantidad.
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="inputCategoria">Categoría</label>
            <select name="inputCategoria" id="inputCategoria" class="form-control required" required>
              <option selected>Elige una categoría...</option>
              <option>Estudiante</option>
              <option>Trainer</option>
              <option>Junior</option>
            </select>
            <div class="invalid-feedback">
              Por favor, selecciona una categoría.
            </div>
          </div>
        </div>
        <div class="form-row submit-container">
          <button type="reset" class="btn btn-warning">Borrar</button>
          <button type="submit" class="btn btn-success">Agregar</button>
        </div>
      </form>

      <!-- Consulta para obtener los tickets guardados -->
      <?php
      // Realizar la conexión a la base de datos y ejecutar la consulta
      $consultaTickets = mysqli_query($conexion, "SELECT * FROM tickets ORDER BY id DESC LIMIT 1");

      // Verificar si hay resultados
      if ($_SERVER["REQUEST_METHOD"] == "POST" || mysqli_num_rows($consultaTickets) === 0) {
        // Iterar sobre los resultados y generar las tarjetas de los tickets
        while ($row = mysqli_fetch_assoc($consultaTickets)) {
          $nombreTicket = $row['nombre'];
          $apellidoTicket = $row['apellido'];
          $correoTicket = $row['correo'];
          $cantidadTicket = $row['cantidad'];
          $categoriaTicket = $row['categoria'];
          ?>
          <!-- // Generar la tarjeta del ticket -->
          <span class="span_container">
            <div class="card mb-3">
              <h4 class=card_p>Entrada a nombre de:</h4>
              <div class="card-body">
                <?php
                echo '<h5 class="card-title">' . $nombreTicket . ' ' . $apellidoTicket . '</h5>';
                echo '<p class="card-text">Correo: ' . $correoTicket . '</p>';
                echo '<p class="card-text">Cantidad: ' . $cantidadTicket . '</p>';
                echo '<p class="card-text">Categoría: ' . $categoriaTicket . '</p>';
                ?>
              </div>
              <a href="/TP-integrador-frontEnd" class="btn btn-success">volver al Home</a>
            </div>
          </span>
          <?php
        }
        // Agregar estilo para ocultar el formulario
        echo '<style>.formulario-oculto { display: none; }</style>';
      }
      mysqli_close($conexion);
      ?>
    </section>
    <!-- tickes cards -->
    <div class="container mt-5">
      <div class="row " id="ticketsContainer">
        <!-- Los <div class='ticket-card'> se agregarán aquí -->
      </div>
    </div>
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
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="./js/tickets.js"></script>
</body>

</html>