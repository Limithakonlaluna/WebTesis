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

    <center>
        <h1>Editar Instalacion</h1>
        <form action="<?= base_url('actualizar_instalacion'); ?>" method="post">
            <?php foreach ($instalacion as $ins) : ?>
                <input type="text" name="instalacion_id" id="instalacion_id" value="<?= $ins['Instalacion_id']; ?>">    
            <?php endforeach; ?>
                <select name="usuario_id" id="usuario_id">
                    <option value="0">Seleccione un Tecnico</option>
                <?php foreach ($tecnicos as $tecnico) : ?>
                    <option value="<?= $tecnico['Usuario_id']; ?>"><?= $tecnico['Usuario_nombre']; ?></option>
                <?php endforeach; ?>
                </select><br>
                <input type="submit" value="Registrar">
        </form>
    </center>
</body>

</html>