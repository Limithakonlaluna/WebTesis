<?= $this->extend('layout/admin_layout'); ?>
<?= $this->section('contenido'); ?>

<div class="row" style="margin-top: 30px;">
    <div class="col-6 offset-md-3">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header">
                <h1 class="text-center">Editar Usuario</h1>
            </div>
            <div class="card-body">
                <form action="<?= base_url(); ?>/actualizar_usuario" method="post" style="margin-top: 30px;" enctype="multipart/form-data">
                    <?php foreach ($usuario as $usu) : ?>
                        <div class="row">
                            <input type="hidden" name="usuario_id" id="usuario_id" value="<?= $usu['Usuario_id']; ?>">
                            <div class="col-sm-6" style="padding-bottom: 15px;">
                            <h5 class="text-center"> Nombre</h5>

                                <input type="text" name="usuario_nombre" id="usuario_nombre" class="form-control" placeholder="Nombre" value="<?= $usu['Usuario_nombre']; ?>" onkeypress="return soloLetras(event)">
                                <?php if ($errores->getError('usuario_nombre')) : ?>
                                    <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                        <?= $errores->getError('usuario_nombre'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-6" style="padding-bottom: 15px;">
                            <h5 class="text-center">Correo</h5>
                            <input type="email" name="usuario_correo" id="usuario_correo" class="form-control" placeholder="Correo" value="<?= $usu['Usuario_correo']; ?>">
                                <?php if ($errores->getError('usuario_correo')) : ?>
                                    <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                        <?= $errores->getError('usuario_correo'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-6" style="padding-bottom: 15px;">
                            <h5 class="text-center">Direccion</h5>
                                <input type="text" name="usuario_direccion" id="usuario_direccion" class="form-control" placeholder="Direccion" value="<?= $usu['Usuario_direccion']; ?>">
                                <?php if ($errores->getError('usuario_direccion')) : ?>
                                    <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                        <?= $errores->getError('usuario_direccion'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-6" style="padding-bottom: 15px;">
                            <h5 class="text-center">Telefono</h5>
                                <input type="text" name="usuario_telefono" id="usuario_telefono" class="form-control" placeholder="Telefono" value="<?= $usu['Usuario_telefono']; ?>" onkeypress="return soloNumeros(event)">
                                <?php if ($errores->getError('usuario_telefono')) : ?>
                                    <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                        <?= $errores->getError('usuario_telefono'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-6" style="padding-bottom: 15px;">
                            <h5 class="text-center">Contraseña</h5>
                                <input type="password" name="usuario_contrasena1" id="usuario_contrasena1" class="form-control" placeholder="Contraseña">
                                <?php if ($errores->getError('usuario_contrasena1')) : ?>
                                    <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                        <?= $errores->getError('usuario_contrasena1'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-6" style="padding-bottom: 15px;">
                            <h5 class="text-center">Repita Contraseña</h5>
                                <input type="password" name="usuario_contrasena2" id="usuario_contrasena2" class="form-control" placeholder="Contraseña">
                                <?php if ($errores->getError('usuario_contrasena2')) : ?>
                                    <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                        <?= $errores->getError('usuario_contrasena2'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-6" style="padding-bottom: 15px;">
                            <h5 class="text-center">Seleccione una Foto</h5>

                                <input type="file" name="usuario_foto" id="usuario_foto" class="form-control" accept=".png, .jpg, .jpeg">
                            </div>
                            <?php if ($usu['Rol_id'] != 2 && session('rol_id') == 1) : ?>
                                <div class="col-6" style="padding-bottom: 15px;">
                                <h5 class="text-center">Selecione un Horario</h5>
                                    <select name="horario_id" id="horario_id" class="form-select">
                                        <option value="0<?= $usu['Horario_id'] ?>"><?= $usu['Horario_inicio'] . ' - ' . $usu['Horario_fin']; ?></option>
                                        <?php foreach ($horarios as $horario) : ?>
                                            <option value="<?= $horario['Horario_id']; ?>"><?= $horario['Horario_inicio'] . ' - ' . $horario['Horario_fin']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endif; ?>
                            <?php if (session('rol_id') == 1) : ?>
                                <div class="col-6" style="padding-bottom: 15px;">
                                <h5 class="text-center">Seleccione un Rol</h5>
                                    <select name="rol_id" id="rol_id" class="form-select">
                                        <option value="<?= $usu['Rol_id']; ?>"><?= $usu['Rol_nombre']; ?></option>
                                        <?php foreach ($roles as $rol) : ?>
                                            <option value="<?= $rol['Rol_id']; ?>"><?= $rol['Rol_nombre']; ?></option>
                                        <?php endforeach; ?>
                                    </select><br>
                                </div>
                            <?php endif; ?>
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