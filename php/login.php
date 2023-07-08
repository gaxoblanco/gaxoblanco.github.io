<?php
// user
$userData = array(
    'name' => 'Gaston',
    'lastname' => 'blanco',
    'userLevel' => 'admin',
    'email' => 'gas@example.com',
    'pass' => '123456'
);

$name = $userData['name'] + ' ' + $userData['lastname'];

// Verificar el nivel de usuario y mostrar la información correspondiente
if ($userLevel === 'admin') {
    ?>
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">La web esta a su servicio administrador
                <?php echo $name; ?>
            </h5>
            <a href="#" class="btn btn-primary">Comenzar a administrar</a>
        </div>
    </div>
    <?php
} elseif ($userLevel === 'invitado') {
    $mensaje = 'Bienvenido, invitado. Puedes acceder a algunas funciones limitadas.';
} elseif ($userLevel === 'usuario') {
    $mensaje = 'Bienvenido, usuario. Tienes acceso a ciertas funciones.';
} else {
    $mensaje = 'Nivel de usuario desconocido. No se puede determinar la información.';
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Información según el nivel de usuario</title>
</head>

<body>
    <h1>Información según el nivel de usuario</h1>
    <p>
        <?php echo $mensaje; ?>
    </p>
</body>

</html>