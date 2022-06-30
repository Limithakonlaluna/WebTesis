<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?= $errores->listErrors(); ?>

    <h1>Editar Usuario</h1>
    <form action="<?= base_url('actualizar_usuario'); ?>" method="post">
        <?php foreach ($usuario as $usu) : ?>
            <input type="hidden" name="usuario_id" id="usuario_id" value="<?= $usu['Usuario_id']; ?>">
            <input type="text" name="usuario_nombre" id="usuario_nombre" placeholder="Nombre" value="<?= $usu['Usuario_nombre']; ?>"><br>
            <input type="email" name="usuario_correo" id="usuario_correo" placeholder="Correo" value="<?= $usu['Usuario_correo']; ?>"><br>
            <input type="text" name="usuario_direccion" id="usuario_direccion" placeholder="Direccion" value="<?= $usu['Usuario_direccion']; ?>"><br>
            <input type="tel" name="usuario_telefono" id="usuario_telefono" placeholder="Telefono" value="<?= $usu['Usuario_telefono']; ?>"><br>
            <select name="horario_id" id="horario_id">
                <option value="0">Asignar Horario</option>
                <?php foreach ($horarios as $horario) : ?>
                    <option value="<?= $horario['Horario_id']; ?>"><?= $horario['Horario_inicio'] . ' - ' . $horario['Horario_fin']; ?></option>
                <?php endforeach; ?>
            </select><br>
            <select name="rol_id" id="rol_id">
                <option value="<?= $usu['Rol_id']; ?>"><?= $usu['Rol_nombre']; ?></option>
            <?php endforeach; ?>

            <?php foreach ($roles as $rol) : ?>
                <option value="<?= $rol['Rol_id']; ?>"><?= $rol['Rol_nombre']; ?></option>
            <?php endforeach; ?>
            </select><br>
            <input type="submit" value="Registrar">

    </form>
</body>

</html>