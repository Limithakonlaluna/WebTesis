<?= $this->extend('layout/admin_layout'); ?>
<?= $this->section('contenido'); ?>

<div class="row" style="margin-top: 30px;">
    <div class="col-md-6 offset-md-3">
    <h1 class="text-center">Formulario Agregar Producto</h1>
        <table class="table" style="margin-top: 25px;">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php foreach ($categorias as $categoria) : ?>
                    <tr class="text-center">
                        <td class="text-center"><?= $categoria['Categoria_nombre']; ?></td>
                        <td>
                            <!-- <a href="<?= base_url('editar_categoria_producto/' . $categoria['Categoria_id']); ?>"><img src="<?= base_url(); ?>/img/directorio.png" width="40px" height="40px" alt=""></a> -->
                            <a type="button" data-bs-toggle="modal" data-bs-target="#mimodalEditar<?= $categoria['Categoria_id']; ?>"><img src="<?= base_url(); ?>/img/directorio.png" width="40px" height="40px" alt=""></a>
                            <div class="modal fade" id="mimodalEditar<?= $categoria['Categoria_id']; ?>" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title" id="modalTitle">Editar Categoria?<!-- <?= $categoria['Categoria_nombre']; ?> --></h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('actualizar_categoria_producto'); ?>" class="form-control" method="post">
                                                <input type="hidden" name="categoria_id" class="form-control" id="categoria_id" value="<?= $categoria['Categoria_id'] ?>">
                                                <input type="text" name="categoria_nombre" class="form-control" id="categoria_nombre" placeholder="Nombre Categoria" value="<?= $categoria['Categoria_nombre'] ?>">
                                                <div class="text-center">
                                                    <input type="submit" value="Editar" class="btn btn-lg btn-block text-light" style="width: 250px;  background-color: #3A0CA3; margin-top: 5px;">
                                                </div>
                                            </form>
                                        </div>
                                        <!-- <div class="modal-footer">

                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            <a type="button" data-bs-toggle="modal" data-bs-target="#mimodalEliminar<?= $categoria['Categoria_id']; ?>"><img src="<?= base_url(); ?>/img/basura.png" width="40px" height="40px" alt=""></a>
                            <div class="modal fade" id="mimodalEliminar<?= $categoria['Categoria_id']; ?>" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h2>¿Desea eliminarlo?</h2>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="<?= base_url('eliminar_categoria_producto/' . $categoria['Categoria_id']); ?>" class="btn btn-lg btn-block text-light" style="background-color: #3A0CA3;">Eliminar</a>
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
    <div class="col-sm-12" style="margin-top: 25px;">
        <div class="row">
            <div class="col-md-3 offset-md-9">
                <!-- <a href="<?= base_url(); ?>/crear_categoria_producto" class="btn btn-lg text-light" style="background-color: #3A0CA3;">Crear Categoria Producto</a> -->
                <a type="button" data-bs-toggle="modal" data-bs-target="#mimodalRegistro" class="btn btn-lg text-light" style="background-color: #3A0CA3;">Crear Categoria Producto</a>
                <div class="modal fade" id="mimodalRegistro" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title" id="modalTitle">Agregue una Categoria de Producto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('guardar_categoria_producto'); ?>" class="form-control" method="post">
                                    <input type="text" name="categoria_nombre" class="form-control" id="categoria_nombre" placeholder="Nombre Categoria" value="<?= old('usuario_telefono'); ?>">
                                    <div class="text-center">
                                        <input type="submit" value="Registrar" class="btn btn-lg btn-block text-light" style="width: 250px;  background-color: #3A0CA3; margin-top: 5px;">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <?php if ($errores->getError('categoria_nombre')) : ?>
                                    <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                        <p><?= $errores->getError('categoria_nombre'); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>