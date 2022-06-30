<?= $this->extend('layout/base_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row">
    <div class="col-md-8 offset-md-2" style="margin-top: 35px;">
    <h1 class="text-center">Productos</h1>
        <?php foreach ($productoDetalle as $p) : ?>
            <div class="card"  style="margin-top: 25px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img src="<?= base_url(); ?>/uploads/kits/<?= $p['Producto_foto'] ?>" width="400px" height="400px" alt="...">
                        </div>
                        <div class="col-6" style="margin-top: 80px;">
                            <p class="text-start"><b>Nombre: </b><?= $p['Producto_nombre'] ?></p>
                            <p class="text-start"><b>Categoria: </b><?= $p['Categoria_nombre'] ?></p>
                            <p class="text-start"><b>descripcion: </b><?= $p['Producto_descripcion'] ?></p>
                            <p><b>Precio: </b><?= '$'.$p['Producto_precio'] ?></p>
                            <p><b>Stock: </b><?= $p['Producto_stock'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>