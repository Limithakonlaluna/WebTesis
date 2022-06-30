<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <h1>Lista de Cultivos</h1>
        <form action="<?= base_url('editar_tipo_cultivo'); ?>" method="post">
            <?php foreach ($tipo_cultivo as $tc) : ?>
            <input type="hidden" name="tipo_id" id="tipo_id" value="<?= $tc['Tipo_id']; ?>"><br>
            <input type="text" name="tipo_nombre" id="tipo_nombre" value="<?= $tc['Tipo_nombre']; ?>"><br>
            <?php endforeach; ?>
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>

</html>