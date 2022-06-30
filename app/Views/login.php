<?= $this->extend('layout/base_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <div class="card" style="margin-top: 100px;">
            <div class="card-header">
                <h5 class="text-center">Iniciar Sesion</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('iniciar_sesion'); ?>" class="form-control" method="post">
                    <input type="email" name="usuario_correo" id="usuario_correo" class="form-control" placeholder="Correo"><br>
                    <?php if ($errores->getError('usuario_correo')) : ?>
                        <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                            <?= $errores->getError('usuario_correo'); ?>
                        </div>
                    <?php endif; ?>
                    <input type="password" name="usuario_contrasena" id="usuario_contrasena" class="form-control" placeholder="********"><br>
                    <?php if ($errores->getError('usuario_contrasena')) : ?>
                        <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                            <?= $errores->getError('usuario_contrasena'); ?>
                        </div>
                    <?php endif; ?>
                    <input type="submit" value="Ingresar" class="form-control bg-dark text-light">
                </form>
            </div>
        </div>
    </div>
    <div class="col-4"></div>
</div>
<?= $this->endSection(); ?>