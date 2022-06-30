<?php if (session('rol_id') == 4) : ?>
    <?= $this->extend('layout/trabajador_bodega_layout'); ?>
<?php endif; ?>
<?= $this->section('contenido'); ?>
<div class="row" style="margin-top: 50px;">
    <div class="col-md-6 offset-md-4">
        <h1>Bienvenido <?= session('usuario_nombre'); ?></h1>
    </div>
    <div class="col-12" style="margin-top: 50px;">
        <div class="row">
            <div class="col-6 text-end">
                <a href="<?= base_url(); ?>/crear_producto" class="btn btn-lg text-light" style="background-color: #3A0CA3;">Crear Producto</a>
            </div>
            <div class="col-6">
                <a href="<?= base_url(); ?>/listar_producto" class="btn btn-lg text-light" style="background-color: #3A0CA3;">Listar Producto</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>