<?php if (session('rol_id') == 1) : ?>
    <?= $this->extend('layout/admin_layout'); ?>
<?php endif; ?>
<?php if (session('rol_id') == 4) : ?>
    <?= $this->extend('layout/trabajador_bodega_layout'); ?>
<?php endif; ?>
<?= $this->section('contenido'); ?>
<div class="row" style="margin-top: 30px;">
    <div class="col-6 offset-md-3">
        <div class="card" style="margin-top: 75px;">
            <div class="card-header">
                <h1 class="text-center">Formulario Agregar Producto</h1>
            </div>
            <div class="card-body">
                <form action="<?= base_url('guardar_producto'); ?>" method="post" style="margin-top: 30px;" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6" style="padding-bottom: 15px;">
                        <h5 class="text-center">Ingrese Nombre del Producto</h5>
                            <input type="text" name="producto_nombre" id="producto_nombre" class="form-control" placeholder="Nombre Producto" value="<?= old('producto_nombre'); ?>">
                            <?php if ($errores->getError('producto_nombre')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('producto_nombre'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6" style="padding-bottom: 15px;">
                        <h5 class="text-center">Ingrese Descripcion del Producto</h5>
                            <input type="text" name="producto_descripcion" id="producto_descripcion" class="form-control" placeholder="Descripcion Producto" value="<?= old('producto_descripcion'); ?>">
                            <?php if ($errores->getError('producto_descripcion')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('producto_descripcion'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6" style="padding-bottom: 15px; margin-top: 15px;">
                        <h5 class="text-center">Ingrese Precio del Producto</h5>
                            <input type="text" name="producto_precio" id="producto_precio" class="form-control" placeholder="Precio" value="<?= old('producto_precio'); ?>" onkeypress="return soloNumeros(event)">
                            <?php if ($errores->getError('producto_precio')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('producto_precio'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6" style="padding-bottom: 15px; margin-top: 15px;">
                        <h5 class="text-center">Ingrese Stock del Producto</h5>
                            <input type="text" name="producto_stock" id="producto_stock" class="form-control" placeholder="Stock" value="<?= old('producto_stock'); ?>" onkeypress="return soloNumeros(event)">
                            <?php if ($errores->getError('producto_stock')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('producto_stock'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-6" style="padding-bottom: 15px; margin-top: 15px;">
                        <h5 class="text-center">Ingrese una Imagen del Producto</h5>
                            <input type="file" name="producto_foto" id="producto_foto" class="form-control" accept=".png, .jpg, .jpeg">
                        </div>
                        <div class="col-6" style="padding-bottom: 15px; margin-top: 15px;">
                        <h5 class="text-center">Seleccione una Categoria</h5>
                            <select name="categoria_id" id="categoria_id" class="form-select">
                                <option value="0">Seleccion una categoria</option>
                                <?php foreach ($categorias as $categoria) : ?>
                                    <option value="<?= $categoria['Categoria_id']; ?>"><?= $categoria['Categoria_nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if ($errores->getError('categoria_id')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('categoria_id'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6 offset-md-4" style="margin-top: 15px;">
                                    <input type="submit" value="Registrar" class="btn btn-lg btn-block text-light" style="width: 250px; height: 50px; background-color: #3A0CA3;">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>