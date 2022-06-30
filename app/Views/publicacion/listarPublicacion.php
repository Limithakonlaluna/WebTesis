<?php if (session('rol_id') == 3) : ?>
    <?= $this->extend('layout/trabajador_layout'); ?>
<?php endif; ?>
<?php if (session('rol_id') == 1) : ?>
    <?= $this->extend('layout/admin_layout'); ?>
<?php endif; ?>
<?= $this->section('contenido'); ?>

<div class="row" style="margin-top: 25px; margin-bottom: 25px;">
    <div class="col-12">
        <div class="row">
            <div class="col-md-3 offset-md-4">
                <h2 class="text-center">Publicaciones</h2>
            </div>
        </div>
    </div>
    <div class="col-4" style="margin-top: 15px; margin-left: 15px;">
        <div class="row form-control">

            <div class="col-12" style="padding-bottom: 15px; margin-left: -15px;">
                <h4 class="text-center">Listado de Publicaciones</h4>
            </div>
            <div class="col-12" style="padding-bottom: 25px;">
                <a href="<?= base_url(); ?>/ver_mis_publicacion/" class="btn btn-lg text-light" style="background-color: #3A0CA3; width: 100%;">Mis Publicaciones</a>
            </div>
            <div class="col-12" style="padding-bottom: 15px; margin-left: -15px; text-align: center;">
                <div class="row">
                    <?php $contador = 1; ?>
                    <?php foreach ($publicaciones as $publicacion) : ?>
                        <div class="col-8" style="padding-bottom: 25px;">
                            <p style="margin-top: 15px;"><b>Publicacion <?= $contador;
                                                                        $contador++; ?></b></p>
                        </div>
                        <div class="col-4" style="padding-bottom: 25px;">
                            <a href="<?= base_url(); ?>/ver_publicacion/<?= $publicacion['Publicacion_id'] ?>" class="btn btn-lg text-light" style="background-color: #3A0CA3; width: 100%;">Ver</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($datosPublicacion)) : ?>
        <div class="col-7" style="margin-top: 15px;">
            <?php foreach ($datosPublicacion as $dp) : ?>
                <div class="col-sm-12 form-control">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Publicacion</h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <?php if (strpos($dp['Publicacion_imagen'], 'firebasestorage.googleapis') !== false) : ?>
                                        <img class="text-start" src="<?= $dp['Publicacion_imagen'] ?>" width="200px" height="200px" alt="">
                                    <?php elseif ($dp['Publicacion_imagen'] != null) : ?>
                                        <img class="text-start" src="<?= base_url(); ?>/uploads/publicaciones/<?= $dp['Publicacion_imagen'] ?>" width="150px" height="150px" alt="">
                                    <?php else : ?>
                                        <img src="<?= base_url(); ?>/uploads/publicaciones/predeterminado.png" width="150px" height="150px" alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="col-8 offset-md-1">
                                    <p><b>Nombre Usuario: </b> <?= $dp['Usuario_nombre'] ?></p>
                                    <p><b>Rol: </b> <?= $dp['Rol_nombre'] ?></p>
                                    <p><b>Titulo: </b> <?= $dp['Publicacion_nombre'] ?></p>
                                    <p><b>Descripcion: </b></p>
                                    <p><?= $dp['Publicacion_descripcion'] ?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <?= $this->endSection(); ?>