<?php if (session('rol_id') == 1) : ?>
    <?= $this->extend('layout/admin_layout'); ?>
<?php endif; ?>
<?php if (session('rol_id') == 3) : ?>
    <?= $this->extend('layout/trabajador_layout'); ?>
<?php endif; ?>
<?php if (session('rol_id') == 4) : ?>
    <?= $this->extend('layout/trabajador_bodega_layout'); ?>
<?php endif; ?>
<?= $this->section('contenido'); ?>
<div class="row justify-content-md-center" style="margin-top: 150px;">
    <div class="col-md-6">
        <?php foreach ($datos as $usuario) : ?>
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Datos Personales</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <?php if ($usuario['Usuario_foto'] != null) : ?>
                                <img class="text-start" src="<?= base_url(); ?>/uploads/trabajadores/<?= $usuario['Usuario_foto'] ?>" width="150px" height="150px" alt="">
                            <?php else : ?>
                                <img src="<?= base_url(); ?>/uploads/trabajadores/predeterminado.png" width="150px" height="150px" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="col-9">
                            <p><b>Nombre: </b> <?= $usuario['Usuario_nombre'] ?></p>
                            <p><b>Correo Electronico: </b> <?= $usuario['Usuario_correo'] ?></p>
                            <p><b>Direccion: </b> <?= $usuario['Usuario_direccion'] ?></p>
                            <p><b>Telefono: </b> <?= $usuario['Usuario_telefono'] ?></p>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-muted text-end">
                    <?php if (session('rol_id') == 1) : ?>
                        <a href="<?= base_url('editar_usuario/' . $usuario['Usuario_id']); ?>"><img src="<?= base_url(); ?>/img/directorio.png" width="40px" height="40px" alt=""></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>