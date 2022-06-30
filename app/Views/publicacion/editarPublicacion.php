<?= $this->extend('layout/Trabajador_layout'); ?>
<?= $this->section('contenido'); ?>

<div class="row" style="margin-top: 30px;">
    <div class="col-6 offset-md-3">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header">
                <h1 class="text-center">Editar Publicacion</h1>
            </div>
            <div class="card-body">
                <form action="<?= base_url(); ?>/actualizarPublicacion" method="post" style="margin-top: 30px;" enctype="multipart/form-data">
                    <?php foreach ($publicacion as $p) : ?>
                        <div class="row">
                            <input type="hidden" name="publicacion_id" id="publicacion_id" value="<?= $p['Publicacion_id']; ?>">
                            <div class="col-sm-6" style="padding-bottom: 15px;">
                            <h5 class="text-center">Agrega un Titulo</h5>
                                <input type="text" name="publicacion_nombre" id="publicacion_nombre" class="form-control" placeholder="Titulo" value="<?= $p['Publicacion_nombre']; ?>" onkeypress="return soloLetras(event)">
                                <?php if ($errores->getError('publicacion_nombre')) : ?>
                                    <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                        <?= $errores->getError('publicacion_nombre'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-6" style="padding-bottom: 15px;">
                            <h5 class="text-center">Agrega una Descripcion</h5>
                                <input type="text" name="publicacion_descripcion" id="publicacion_descripcion" class="form-control" placeholder="Descripcion" value="<?= $p['Publicacion_descripcion']; ?>">
                                <?php if ($errores->getError('publicacion_descripcion')) : ?>
                                    <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                        <?= $errores->getError('publicacion_descripcion'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-12" style="padding-bottom: 15px; margin-top: 15px;">
                            <h5 class="text-center">Selecciona una Imagen para la Publicacion</h5>
                                <input type="file" name="publicacion_imagen" id="Publicacion_imagen" class="form-control" accept=".png, .jpg, .jpeg">
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