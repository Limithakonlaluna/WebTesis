<?= $this->extend('layout/base_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row align-items-center justify-content-center">
    <div class="col-12" style="margin-top: 10px;">
        <h1 class="text-center">Productos</h1>
    </div>
    <div class="row">
    <div class="col-2" style="margin-top: 15px;">
        <form action="<?= base_url() ?>/productos_invitado" method="POST">
            <select name="Categoria_id" id="Categoria_id" class="form-control" onchange="this.form.submit()">
                <option value="0" class="text-center">Seleccione una Categoria</option>
                <option value="-1" class="text-center">Quitar Filtro</option>
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?= $categoria['Categoria_id']; ?>" class="text-center"><?= $categoria['Categoria_nombre']; ?></option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>
    </div>
    <?php foreach ($productos as $p) : ?>
        <div class="col-4" style="margin-top: 25px; margin-bottom: 25px;">
            <div class="card">
                <div class="card-header">
                    <img src="<?= base_url(); ?>/uploads/kits/<?= $p['Producto_foto'] ?>" width="450px" height="400px" alt="...">
                </div>
                <div class="card-body">
                    <h4 class="card-title"><?= $p['Producto_nombre'] ?></h4>
                    <p class="card-text"><?= 'Precio: $' . $p['Producto_precio'] ?></p>
                    <p class="card-text"><?= 'Categoria: ' . $p['Categoria_nombre'] ?></p>
                    <a href="<?= base_url(); ?>/productos_invitado/ver_detalles/<?= $p['Producto_id'] ?>" class="btn btn-lg btn-block text-light" style="width: 250px; 
                        background-color: #3A0CA3;">
                        ver detalles
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>