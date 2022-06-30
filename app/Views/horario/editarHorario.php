<?= $this->extend('layout/admin_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row" style="margin-top: 30px;">
    <div class="col-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Editar Horario</h2>
            </div>
            <div class="card-body">
                <form action="<?= base_url('actualizar_horario'); ?>" method="post">
                    <?php foreach ($horario as $h): ?>
                        <div class="row">
                            <input type="hidden" name="horario_id" id="horario_id" class="form-control" value="<?= $h['Horario_id']; ?>">
                            <div class="col-6">
                                <label for="horario_inicio"><b>Horario Inicio</b></label>
                                <input type="time" name="horario_inicio" id="horario_inicio" class="form-control" value="<?= $h['Horario_inicio']; ?>">
                                <?php if ($errores->getError('horario_inicio')) : ?>
                                    <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                        <?= $errores->getError('horario_inicio'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-6">
                                <label for="horario_fin"><b>Horario Termino</b></label>
                                <input type="time" name="horario_fin" id="horario_fin" class="form-control" value="<?= $h['Horario_fin']; ?>">
                                <?php if ($errores->getError('horario_fin')) : ?>
                                    <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                        <?= $errores->getError('horario_fin'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?> 
            </div>
            <div class="card-footer text-muted">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 offset-md-4">
                            <input type="submit" value="Actualizar" class="btn btn-lg btn-block text-light" style="width: 250px; height: 50px; background-color: #3A0CA3;">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>