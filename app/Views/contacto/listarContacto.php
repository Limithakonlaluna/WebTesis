<?= $this->extend('layout/admin_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row" style="margin-top: 30px; margin-bottom: 25px;">            
    <h2 class="text-center">Apartado Contacto</h2>
    <div class="col-md-6 offset-md-2">
        <div class="row">
            <div class="col-md-4" style="margin-top: 25px;">
                <a href="<?= base_url(); ?>/agregar_contactos" class="btn btn-lg text-light" style="background-color: #3A0CA3;">Crear Contacto</a>
            </div>
            <?php if (isset($mensaje)) : ?>
                <div class="col-md-4 offset-md-6" style="margin-top: 25px;">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $mensaje; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-8 offset-md-2">
        <div class="card" style="margin-top: 25px;">
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Area</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <?php foreach ($contacto as $c) : ?>
                        <tbody>
                            <tr>
                                <th><?= $c['Usuario_nombre']; ?></th>
                                <td><?= $c['Contacto_nombre']; ?></td>
                                <td><?= $c['Contacto_email']; ?></td>
                                <td><?= $c['Contacto_telefono']; ?></td>
                                <td>
                                    <a href="<?= base_url('editar_contactos/' . $c['Contacto_id']); ?>"><img src="<?= base_url(); ?>/img/directorio.png" width="40px" height="40px" alt=""></a>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#mimodal<?= $c['Contacto_id']; ?>"><img src="<?= base_url(); ?>/img/basura.png" width="40px" height="40px" alt=""></a>
                                    <div class="modal fade" id="mimodal<?= $c['Contacto_id']; ?>" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title" id="modalTitle">¿Eliminar <?= $c['Contacto_nombre']; ?>?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Desea eliminarlo?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="<?= base_url(); ?>/eliminar_contactos/<?= $c['Contacto_id']; ?>" class="btn btn-lg btn-block text-light" style="background-color: #3A0CA3;">Eliminar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>