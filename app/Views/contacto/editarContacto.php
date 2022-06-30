<?= $this->extend('layout/admin_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row" style="margin-top: 50px;">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Editar Contacto</h2>
            </div>
            <div class="card-body">
                <form action="<?= base_url(); ?>/actualizar_contacto" method="post">
                    <?php foreach ($contacto as $c) : ?>
                        <div class="row">
                            <input type="hidden" name="contacto_id" id="contacto_id" class="form-control" value="<?= $c['Contacto_id']; ?>">
                            <div class="col-sm-6" style="padding-bottom: 15px;">
                            <h5 class="text-center">Nombre del Area</h5>
                                <input type="text" name="contacto_nombre" id="contacto_nombre" class="form-control" placeholder="Nombre Area" value="<?= $c['Contacto_nombre']; ?>" onkeypress="return soloLetras(event)">
                                <?php if ($errores->getError('contacto_nombre')) : ?>
                                    <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                        <?= $errores->getError('contacto_nombre'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-6" style="padding-bottom: 15px;">
                            <h5 class="text-center">Seleccione un Encargado</h5>
                                <select name="usuario_id" id="usuario_id" class="form-select">
                                    <option value="<?= $c['Usuario_id']; ?>"><?= $c['Usuario_nombre']; ?></option>
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
                            <h5 class="text-center">Telefono de Contacto</h5>
                                <input type="email" name="contacto_email" id="contacto_email" class="form-control" placeholder="Correo" value="<?= $c['Contacto_email']; ?>">
                                <?php if ($errores->getError('contacto_email')) : ?>
                                    <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                        <?= $errores->getError('contacto_email'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-6" style="padding-bottom: 15px;">
                            <h5 class="text-center">Numero de Contacto</h5>
                                <input type="text" name="contacto_telefono" id="contacto_telefono" class="form-control" placeholder="Telefono" value="<?= $c['Contacto_telefono']; ?>" onkeypress="return soloNumeros(event)">
                                <?php if ($errores->getError('contacto_telefono')) : ?>
                                    <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                        <?= $errores->getError('contacto_telefono'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6 offset-md-4">
                                        <input type="submit" value="Actualizar" class="btn btn-lg btn-block text-light" style="width: 250px; height: 50px; background-color: #3A0CA3;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>