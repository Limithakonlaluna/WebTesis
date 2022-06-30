<?php if (session('rol_id') == 3) : ?>
    <?= $this->extend('layout/trabajador_layout'); ?>
<?php endif; ?>
<?= $this->section('contenido'); ?>
<div class="row" style="margin-top: 50px;">
    <div class="col-md-6 offset-md-3" style="text-align: center;">
        <h1>Bienvenido <?= session('usuario_nombre'); ?></h1>
    </div>
    <div class="col-md-6 offset-md-3" style="margin-top: 40px;">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Crear Publicacion</h1>
            </div>
            <div class="card-body">
                <form action="<?= base_url(); ?>/guardar_publicacion" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6" style="padding-bottom: 15px;">
                            <h5 class="text-center">Agrega un Titulo</h5>
                            <input type="text" name="publicacion_nombre" id="publicacion_nombre" class="form-control" placeholder="Titulo Publicacion">
                            <?php if ($errores->getError('publicacion_nombre')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('publicacion_nombre'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-6" style="padding-bottom: 15px;">
                            <h5 class="text-center">Agrega una Descripcion</h5>
                            <input type="text" name="publicacion_descripcion" id="publicacion_descripcion" class="form-control" placeholder="Descripcion Publicacion">
                            <?php if ($errores->getError('publicacion_descripcion')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('publicacion_descripcion'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-12" style="padding-bottom: 15px; margin-top: 15px;">
                            <h5 class="text-center">Selecciona una Imagen para la Publicacion</h5>
                            <input type="file" name="publicacion_imagen" id="publicacion_imagen" class="form-control" accept=".png, .jpg, .jpeg">
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Publicar" class="btn btn-lg btn-block text-light" style="width: 250px; height: 50px; background-color: #3A0CA3;">
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