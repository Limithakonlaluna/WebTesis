<?= $this->extend('layout/admin_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row" style="margin-top: 50px;">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Editar Contacto</h2>
            </div>
            <div class="card-body">
                <form action="<?= base_url('actualizar_tipo_cultivo'); ?>" method="post">
                    <?php foreach ($tipo_cultivo as $tc) : ?>
                        <div class="row">
                            <input type="hidden" name="tipo_id" id="tipo_id" value="<?= $tc['Tipo_id']; ?>">
                            <div class="col-sm-12" style="padding-bottom: 15px;">
                                <h2 class="text-center">Ingrese el tipo de Cultivo</h2>
                                <input type="text" name="tipo_nombre" id="tipo_nombre" class="form-control" placeholder="Nombre" value="<?= $tc['Tipo_nombre']; ?>" onkeypress="return soloLetras(event)">
                                <?php if ($errores->getError('tipo_nombre')) : ?>
                                    <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                        <?= $errores->getError('tipo_nombre'); ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="col-md-4 offset-md-4">
                            <input type="submit" value="Actualizar" class="btn btn-lg btn-block text-light" style="width: 250px; background-color: #3A0CA3;">

                            </div>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>