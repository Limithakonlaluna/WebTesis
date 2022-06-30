<?php if (session('rol_id') == 1) : ?>
    <?= $this->extend('layout/admin_layout'); ?>
<?php endif; ?>
<?php if (session('rol_id') == 4) : ?>
    <?= $this->extend('layout/trabajador_bodega_layout'); ?>
<?php endif; ?>
<?= $this->section('contenido'); ?>
<!-- <div class="col-sm-12 productos"> -->
<div class="row" style="margin-top: 35px; margin-bottom: 25px;">
    <h2 class="text-center">Listado de Productos</h2>
</div>
<div class="row">
    <div class="col-md-6 offset-md-2" style="margin-top: 30px;">
        <div class="row">
            <?php if (session('rol_id') == 1) : ?>
                <div class="col-4 offset-md-2">
                    <a href="<?= base_url(); ?>/listar_categoria_producto" class="btn btn-lg text-light" style="background-color: #3A0CA3;">Ver Categorias</a>
                </div>
            <?php endif; ?>
            <div class="col-4">
                <a href="<?= base_url(); ?>/crear_producto" class="btn btn-lg text-light" style="background-color: #3A0CA3;">Crear Producto</a>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-2" style="margin-top: 35px;">
        <h5 class="text-center">Seleccione una Categoria</h5>
    </div> -->
    <div class="col-2" style="margin-top: 35px;">
        <form action="<?= base_url() ?>/listar_producto" method="POST">
            <select name="Categoria_id" id="Categoria_id" class="form-control" onchange="this.form.submit()">
                <option value="0" class="text-center">Seleccione una Categoria</option>
                <option value="-1" class="text-center">Quitar Filtro</option>
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?= $categoria['Categoria_id']; ?>" class="text-center"><?= $categoria['Categoria_nombre']; ?></option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>
    <?php if (isset($mensaje)) : ?>
        <div class="col-md-4 offset-md-6" style="margin-top: 25px;">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $mensaje ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>
</div>
<div class="row">
    <div class="col-md-8 offset-md-2" style="margin-top: 15px;">
        <table class="table" style="margin-top: 25px;">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php foreach ($productos as $producto) : ?>
                    <tr>
                        <td><?= $producto['Producto_nombre']; ?></td>
                        <td><?= $producto['Categoria_nombre']; ?></td>
                        <td>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#mimodalvista<?= $producto['Producto_id']; ?>"><img src="<?= base_url(); ?>/img/ojo.png" width="40px" height="40px" alt=""></a>
                            <div class="modal fade" id="mimodalvista<?= $producto['Producto_id']; ?>" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title" id="modalTitle">Datos</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <img src="<?= base_url(); ?>/uploads/kits/<?= $producto['Producto_foto'] ?>" width="500px" height="500px" alt="">
                                                </div>
                                                <div class="col-4">
                                                    <p><?= '<b>Nombre: </b>' . $producto['Producto_nombre']; ?></p>
                                                    <p><?= '<b>Categoria: </b>' . $producto['Categoria_nombre']; ?></p>
                                                    <p><?= '<b>Cantidad: </b>' . $producto['Producto_stock']; ?></p>
                                                    <p><?= '<b>Descripcion: </b>' . $producto['Producto_descripcion']; ?></p>
                                                    <p><?= '<b>Precio: </b>' . '$' . $producto['Producto_precio']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="<?= base_url('editar_producto/' . $producto['Producto_id']); ?>" class="btn btn-lg btn-block text-light" style="background-color: #3A0CA3;">Editar</a>
                                            <!-- <a href="<?= base_url('editar_producto/' . $producto['Producto_id']); ?>"><img src="<?= base_url(); ?>/img/directorio.png" width="40px" height="40px" alt=""></a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a type="button" data-bs-toggle="modal" data-bs-target="#mimodal<?= $producto['Producto_id']; ?>"><img src="<?= base_url(); ?>/img/basura.png" width="40px" height="40px" alt=""></a>
                            <div class="modal fade" id="mimodal<?= $producto['Producto_id']; ?>" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title" id="modalTitle">¿Eliminar <?= $producto['Producto_nombre']; ?>?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Desea eliminarlo?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="<?= base_url('eliminar_producto/' . $producto['Producto_id']); ?>" class="btn btn-lg btn-block text-light" style="background-color: #3A0CA3;">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</div>
<?= $this->endSection(); ?>