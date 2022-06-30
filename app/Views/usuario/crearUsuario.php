<?= $this->extend('layout/admin_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row" style="margin-top: 60px;">
    <div class="col-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Formulario Agregar Usuario</h1>
            </div>
            <div class="card-body">
                <form action="<?= base_url('guardar_usuario'); ?>" method="post" style="margin-top: 50px;" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6" style="padding-bottom: 15px;">
                        <h5 class="text-center">Ingrese Nombre del Usuario</h5>
                            <input type="text" name="usuario_nombre" id="usuario_nombre" class="form-control" placeholder="Nombre" value="<?= old('usuario_nombre'); ?>" onkeypress="return soloLetras(event)">
                            <?php if ($errores->getError('usuario_nombre')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('usuario_nombre'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6" style="padding-bottom: 15px;">
                        <h5 class="text-center">Ingrese Correo del Usuario</h5>
                        <input type="email" name="usuario_correo" id="usuario_correo" class="form-control" placeholder="Correo" value="<?= old('usuario_correo'); ?>">
                            <?php if ($errores->getError('usuario_correo')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('usuario_correo'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6" style="padding-bottom: 15px;">
                        <h5 class="text-center">Ingrese Direccion del Usuario</h5>
                            <input type="text" name="usuario_direccion" id="usuario_direccion" class="form-control" placeholder="Direccion" value="<?= old('usuario_direccion'); ?>">
                            <?php if ($errores->getError('usuario_direccion')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('usuario_direccion'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6" style="padding-bottom: 15px;">
                        <h5 class="text-center">Ingrese Numero del Usuario</h5>
                            <input type="text" name="usuario_telefono" id="usuario_telefono" class="form-control" placeholder="Telefono" value="<?= old('usuario_telefono'); ?>" onkeypress="return soloNumeros(event)">
                            <?php if ($errores->getError('usuario_telefono')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('usuario_telefono'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6" style="padding-bottom: 15px;">
                        <h5 class="text-center">Ingrese una Contraseña</h5>
                            <input type="password" name="usuario_contrasena1" id="usuario_contrasena1" class="form-control" placeholder="Contraseña">
                            <?php if ($errores->getError('usuario_contrasena1')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('usuario_contrasena1'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6" style="padding-bottom: 15px;">
                        <h5 class="text-center">Repita la Contraseña</h5>
                            <input type="password" name="usuario_contrasena2" id="usuario_contrasena2" class="form-control" placeholder="Contraseña">
                            <?php if ($errores->getError('usuario_contrasena2')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('usuario_contrasena2'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-6" style="padding-bottom: 15px;">
                        <h5 class="text-center">Ingrese una Foto del Usuario</h5>
                            <input type="file" name="usuario_foto" id="usuario_foto" class="form-control" accept=".png, .jpg, .jpeg">
                        </div>
                        <div class="col-6" style="padding-bottom: 15px;">
                        <h5 class="text-center">Seleccione el rol para Usuario</h5>
                            <select name="rol_id" id="rol_id" class="form-select">
                                <option value="0">Seleccion un rol</option>
                                <?php foreach ($roles as $rol) : ?>
                                    <option value="<?= $rol['Rol_id']; ?>"><?= $rol['Rol_nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if ($errores->getError('rol_id')) : ?>
                                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                    <?= $errores->getError('rol_id'); ?>
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