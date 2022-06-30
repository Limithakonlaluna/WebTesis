<?= $this->extend('layout/admin_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row" style="margin-top: 30px; margin-bottom: 25px;">
    <?php if (isset($mensaje)) : ?>
        <div class="col-md-4 offset-md-8" style="margin-top: 25px;">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $mensaje ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <h2 class="text-center">Agregar un Tipo de Cultivo</h2>
            <div class="card-body">
                <form action="<?= base_url('guardar_tipo_cultivo'); ?>" method="post">
                    <div class="row">
                        <div class="col-sm-8" style="padding-bottom: 15px;">
                            <input type="text" name="tipo_nombre" id="tipo_nombre" class="form-control" placeholder="Nombre" value="<?= old('tipo_nombre'); ?>" onkeypress="return soloLetras(event)">
                            <?php if ($errores->getError('tipo_nombre')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('tipo_nombre'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-4">
                            <input type="submit" value="Registrar" class="btn btn-lg btn-block text-light" style="width: 250px; background-color: #3A0CA3;">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8 offset-md-2" style="margin-top: 30px;">
        <h2 class="text-center">Lista Tipos Cultivo</h2>
        <table class="table" style="margin-top: 20px;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col" class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tipo_cultivo as $tc) : ?>
                    <tr>
                        <th><?= $tc['Tipo_nombre']; ?></th>
                        <td class="text-end"><a href="<?= base_url('editar_tipo_cultivo/' . $tc['Tipo_id']); ?>"><img src="<?= base_url(); ?>/img/directorio.png" width="40px" height="40px" alt=""></a>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#mimodal<?= $tc['Tipo_id']; ?>"><img src="<?= base_url(); ?>/img/basura.png" width="40px" height="40px" alt=""></a>
                            <div class="modal fade" id="mimodal<?= $tc['Tipo_id']; ?>" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title" id="modalTitle">¿Eliminar <?= $tc['Tipo_nombre']; ?>?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Desea eliminarlo?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="<?= base_url(); ?>/eliminar_tipo_cultivo/<?= $tc['Tipo_id']; ?>" class="btn btn-lg btn-block text-light" style="background-color: #3A0CA3;">Eliminar</a>
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
<?= $this->endSection(); ?>