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
        <h1>Editar Categoria Producto</h1>
        <form action="<?= base_url('actualizar_categoria_producto'); ?>" method="post">
            <?php foreach ($categoria as $cat): ?>
            <input type="hidden" name="categoria_id" id="categoria_id" value="<?= $cat['Categoria_id']; ?>">
            <input type="text" name="categoria_nombre" id="categoria_nombre" value="<?= $cat['Categoria_nombre']; ?>"><br>
            <?php endforeach; ?>
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>

</html>