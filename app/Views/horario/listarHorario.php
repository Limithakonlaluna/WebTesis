<?= $this->extend('layout/admin_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row" style="margin-top: 30px; margin-bottom: 75px;">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Crear Horario</h2>
            </div>
            <div class="card-body">
                <form action="<?= base_url('guardar_horario'); ?>" method="post">
                    <div class="row">
                        <div class="col-6">
                            <label for="horario_inicio"><b>Horario Inicio</b></label>
                            <input type="time" name="horario_inicio" id="horario_inicio" class="form-control" placeholder="Hora de inicio"><br>
                            <?php if ($errores->getError('horario_inicio')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('horario_inicio'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-6">
                            <label for="horario_fin"><b>Horario Termino</b></label>
                            <input type="time" name="horario_fin" id="horario_fin" class="form-control" placeholder="Hora de termino"><br>
                            <?php if ($errores->getError('horario_fin')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('horario_fin'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
            </div>
            <div class="card-footer text-muted">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 offset-md-4">
                            <input type="submit" value="Registrar" class="btn btn-lg btn-block text-light" style="width: 200px; height: 60px; background-color: #3A0CA3;">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Lista de Horarios</h2>
                <table class="table" style="margin-top: 25px; margin-bottom: 25px;">
                    <tr class="text-light" style="background-color: #00A5CF;">
                        <th>Inicio Horario</th>
                        <th>Termino Horario</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach ($horarios as $horario) : ?>
                        <tr>
                            <td><?= $horario['Horario_inicio']; ?></td>
                            <td><?= $horario['Horario_fin']; ?></td>
                            <td><a href="<?= base_url('editar_horario/' . $horario['Horario_id']); ?>"><img src="<?= base_url(); ?>/img/directorio.png" width="40px" height="40px" alt=""></a>
                                <a href="<?= base_url('eliminar_horario/' . $horario['Horario_id']); ?>"><img src="<?= base_url(); ?>/img/basura.png" width="40px" height="40px" alt=""></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>