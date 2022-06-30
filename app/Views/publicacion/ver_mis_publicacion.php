<?php if (session('rol_id') == 3) : ?>
    <?= $this->extend('layout/trabajador_layout'); ?>
<?php endif; ?>
<?php if (session('rol_id') == 1) : ?>
    <?= $this->extend('layout/admin_layout'); ?>
<?php endif; ?>
<?= $this->section('contenido'); ?>

<div class="row" style="margin-top: 25px; margin-bottom: 25px;">
    <h2 class="text-center">Listado de Mis Publicaciones</h2>
</div>
<div class="col-md-10 offset-md-1" style="margin-top: 20px;">
    <table class="table" style="margin-top: 25px;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Titulo</th>
                <th scope="col-3">Descripcion</th>
                <th scope="col">Rol</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($publicaciones as $publicacion) : ?>
                <tr>
                    <th>
                        <?php if (strpos($publicacion['Publicacion_imagen'], 'firebasestorage.googleapis') !== false) : ?>
                            <img class="text-start" src="<?= $publicacion['Publicacion_imagen'] ?>" width="150px" height="150px" alt="">
                        <?php elseif ($publicacion['Publicacion_imagen'] != null) : ?>
                            <img class="text-start" src="<?= base_url(); ?>/uploads/publicaciones/<?= $publicacion['Publicacion_imagen'] ?>" width="150px" height="150px" alt="">
                        <?php else : ?>
                            <img src="<?= base_url(); ?>/uploads/publicaciones/predeterminado.png" width="150px" height="150px" alt="">
                        <?php endif; ?>
                    </th>
                    <th><?= $publicacion['Usuario_nombre']; ?></th>
                    <td><?= $publicacion['Publicacion_nombre']; ?></td>
                    <td style="overflow-wrap: anywhere;"><?= $publicacion['Publicacion_descripcion']; ?></td>
                    <td><?= $publicacion['Rol_nombre']; ?></td>
                  
                    <td>
                        <div class="col-4" style="padding-bottom: 25px;">
                            <a href="<?= base_url(); ?>/editarPublicacion/<?= $publicacion['Publicacion_id'] ?>" ><img src="<?= base_url(); ?>/img/directorio.png" width="40px" height="40px" alt=""></a>
                            <td>
                        </div>
                        <div class="col-4" style="padding-bottom: 25px;">
                            <a href="<?= base_url(); ?>/eliminarPublicacion/<?= $publicacion['Publicacion_id']; ?>"><img src="<?= base_url(); ?>/img/basura.png" width="40px" height="40px" alt=""></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>