<?= $this->extend('layout/base_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row" style="margin-top: 50px; margin-left: 90px;">
    <div class="col-md-7">
        <table class="table" style="margin-top: 125px;">
            <thead class="thead-dark">
                <tr>
<!--                     <th scope="col">Nombre</th> -->
                    <th scope="col">Area</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                </tr>
            </thead>
            <?php foreach ($contacto as $c) : ?>
                <tbody>
                    <tr>
                        <!-- <th><?= $c['Usuario_nombre']; ?></th> -->
                        <td><?= $c['Contacto_nombre']; ?></td>
                        <td><?= $c['Contacto_email']; ?></td>
                        <td><?= $c['Contacto_telefono']; ?></td>
                        <td>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="col-md-5">
        <img src="<?= base_url(); ?>/img/contacto.jpeg" width="400px" height="400px" alt="">
    </div>
</div>
<?= $this->endSection(); ?>