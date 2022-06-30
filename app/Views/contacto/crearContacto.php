<?= $this->extend('layout/admin_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row" style="margin-top: 50px;">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Agregar Nuevo Contacto</h2>
            </div>
            <div class="card-body">
                <form action="<?= base_url('guardar_contacto'); ?>" method="post">
                    <div class="row">
                        <div class="col-sm-6" style="padding-bottom: 15px;">
                        <h5 class="text-center">Ingrese Nombre del Area</h5>
                            <input type="text" name="contacto_nombre" id="contacto_nombre" class="form-control" placeholder="Nombre Area" value="<?= old('contacto_nombre'); ?>" onkeypress="return soloLetras(event)">
                            <?php if ($errores->getError('contacto_nombre')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('contacto_nombre'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6" style="padding-bottom: 15px;">
                        <h5 class="text-center">Seleccione Encargado</h5>
                            <select name="usuario_id" id="usuario_id" class="form-select">
                                <option value="0">Seleccione un Trabajador</option>
                                <?php foreach ($usuarios as $u) : ?>
                                    <option value="<?= $u['Usuario_id']; ?>"><?= $u['Usuario_nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if ($errores->getError('usuario_id')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('usuario_id'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6" style="padding-bottom: 15px;">
                        <h5 class="text-center">Ingrese Correo de Contacto</h5>
                            <input type="email" name="contacto_email" id="contacto_email" class="form-control" placeholder="Correo" value="<?= old('contacto_email'); ?>">
                            <?php if ($errores->getError('contacto_email')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('contacto_email'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6" style="padding-bottom: 15px;">
                        <h5 class="text-center">Ingrese Telefono de Contacto</h5>
                            <input type="text" name="contacto_telefono" id="contacto_telefono" class="form-control" placeholder="Telefono" value="<?= old('contacto_telefono'); ?>" onkeypress="return soloNumeros(event)">
                            <?php if ($errores->getError('contacto_telefono')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('contacto_telefono'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6 offset-md-4">
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