<?= $this->extend('layout/admin_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row" style="margin-top: 35px;">
    <h2 class="text-center">Listado de Usuarios</h2>
</div>
<div class="row" style="margin-top: 15px; margin-bottom: 15px;">
    <div class="col-md-8 offset-md-2">
        <div class="row">
            <div class="col-md-6">
                <a href="<?= base_url(); ?>/crear_usuario" class="btn btn-lg text-light" style="background-color: #3A0CA3;">Crear Usuario</a>
            </div>
            <?php if (isset($mensaje)) : ?>
                <div class="col-md-4 offset-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $mensaje; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-8 offset-md-2" style="margin-top: 20px;">
        <table class="table" style="margin-top: 25px;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <th>
                        <?php if (strpos($usuario['Usuario_foto'], 'firebasestorage.googleapis') !== false) : ?>
                                        <img class="text-start" src="<?= $usuario['Usuario_foto'] ?>" width="100px" height="100px" alt="">
                            <?php elseif ($usuario['Usuario_foto'] != null) : ?>
                                <img class="text-center" src="<?= base_url(); ?>/uploads/trabajadores/<?= $usuario['Usuario_foto'] ?>" width="100px" height="100px" alt="">
                            <?php else : ?>
                                <img src="<?= base_url(); ?>/uploads/trabajadores/predeterminado.png" width="150px" height="150px" alt="">
                            <?php endif; ?>
                        </th>
                        <th><?= $usuario['Usuario_nombre']; ?></th>
                        <td><?= $usuario['Usuario_correo']; ?></td>
                        <td><?= $usuario['Usuario_direccion']; ?></td>
                        <td><?= $usuario['Usuario_telefono']; ?></td>
                        <td><?= $usuario['Rol_nombre']; ?></td>
                        <td><a href="<?= base_url('editar_usuario/' . $usuario['Usuario_id']); ?>"><img src="<?= base_url(); ?>/img/directorio.png" width="40px" height="40px" alt=""></a>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#mimodal<?= $usuario['Usuario_id']; ?>"><img src="<?= base_url(); ?>/img/basura.png" width="40px" height="40px" alt=""></a>
                            <div class="modal fade" id="mimodal<?= $usuario['Usuario_id']; ?>" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title" id="modalTitle">¿Eliminar <?= $usuario['Usuario_nombre']; ?>?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Desea eliminarlo?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="<?= base_url(); ?>/eliminar_usuario/<?= $usuario['Usuario_id']; ?>" class="btn btn-lg btn-block text-light" style="background-color: #3A0CA3;">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>