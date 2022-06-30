<?php if (session('rol_id') == 3) : ?>
    <?= $this->extend('layout/trabajador_layout'); ?>
<?php endif; ?>
<?php if (session('rol_id') == 1) : ?>
    <?= $this->extend('layout/admin_layout'); ?>
<?php endif; ?>
<?= $this->section('contenido'); ?>

<div class="row" style="margin-top: 25px; margin-bottom: 25px;">
    <h2 class="text-center">Listado de Instalaciones</h2>
</div>
<div class="col-md-8 offset-md-2" style="margin-top: 20px;">
    <table class="table" style="margin-top: 25px;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($ordenes as $orden) : ?>
                <tr>
                    <th><?= $orden['Usuario_nombre']; ?></th>
                    <td><?= $orden['Usuario_direccion']; ?></td>
                    <td><?= $orden['Usuario_telefono']; ?></td>
                    <td><?= $orden['Orden_Fecha']; ?></td>
                    <td><?php if($orden['Orden_estado'] == 1){
                        echo"preparando instalacion";
                    }else{
                        echo"instalacion en proceso";
                    } ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div><div class="row">
    <div class="col-3 offset-9">
        <a href="<?= base_url(); ?>/listar_instalaciones" class="btn btn-lg text-light" style="background-color: #3A0CA3;"> Instalaciones del Dia</a>
    </div>
</div>

<?= $this->endSection(); ?>