<?= $this->extend('layout/admin_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row" style="margin-top: 50px; margin-bottom: 20px;">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Formulario Datos Empresa</h3>
            </div>
            <div class="card-body">
                <form action="<?= base_url('guardar_datos_empresa'); ?>" method="post">
                    <div class="row">
                        <div class="col-12" style="padding-bottom: 15px;">
                        <h5 class="text-center">Mision Empresa</h5>
                            <textarea name="datos_mision" id="datos_mision" cols="30" class="form-control" rows="5" placeholder="Mision"></textarea>
                            <?php if ($errores->getError('datos_mision')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('datos_mision'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-12" style="padding-bottom: 15px;">
                        <h5 class="text-center">Vision Empresa</h5>
                            <textarea name="datos_vision" id="datos_vision" cols="30" class="form-control" rows="5" placeholder="Vision"></textarea>
                            <?php if ($errores->getError('datos_vision')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('datos_vision'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-12" style="padding-bottom: 15px;">
                        <h5 class="text-center">Quienes Somos</h5>
                            <textarea name="datos_comentario" id="datos_comentario" cols="30" class="form-control" rows="5" placeholder="Sobre Nosotros"></textarea>
                            <?php if ($errores->getError('datos_comentario')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('datos_comentario'); ?>
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