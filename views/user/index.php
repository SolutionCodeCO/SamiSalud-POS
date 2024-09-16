<?php 
    $user = $this->data['user']; // Recogemos el objeto usuario desde el controlador
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER</title>
</head>
<body>

<h1>Bienvenido, <?php echo ($user->getNombre() != '')? $user->getNombre() : $user->getUsuario();?></h1>



<form action="<?php echo constant('URL'); ?>/login/logout" method="POST">
    <button type="submit">Cerrar sesión</button>
</form>

    <form action="<?php echo constant('URL') . '/user/updateName'; ?>" method="POST">
        <div>
            <label for="name">Nombre</label><br>
            <input type="text" name="nombre" id="nombre" autocomplete="off" required value="<?php echo $user->getNombre(); ?>">
            <input type="submit" value="Cambiar nombre">
        </div>
    </form>
</body>
</html>
