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
        <h1>Editar Producto</h1>
        <form action="<?= base_url('actualizar_producto'); ?>" method="post" enctype="multipart/form-data">
            <?php foreach ($producto as $pro) : ?>
                <input type="hidden" name="producto_id" id="producto_id" value="<?= $pro['Producto_id']; ?>">
                <input type="text" name="producto_nombre" id="producto_nombre" placeholder="Nombre" value="<?= $pro['Producto_nombre']; ?>"><br>
                <input type="text" name="producto_descripcion" id="producto_descripcion" placeholder="Descripcion" value="<?= $pro['Producto_descripcion']; ?>"><br>
                <input type="text" name="producto_precio" id="producto_precio" placeholder="Precio" value="<?= $pro['Producto_precio']; ?>"><br>
                <input type="text" name="producto_stock" id="producto_stock" placeholder="Stock" value="<?= $pro['Producto_stock']; ?>"><br>
                <input type="file" name="producto_foto" id="producto_foto"><br>
                <select name="categoria_id" id="categoria_id">
                    <option value="<?= $pro['Categoria_id']; ?>"><?= $pro['Categoria_nombre']; ?></option>

                <?php endforeach; ?>

                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?= $categoria['Categoria_id']; ?>"><?= $categoria['Categoria_nombre']; ?></option>
                <?php endforeach; ?>
                </select><br>
                <input type="submit" value="Registrar">
        </form>
    </center>
</body>

</html>