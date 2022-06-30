<?= $this->extend('layout/admin_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row" style="margin-top: 25px;margin-bottom: 25px;">
    <div class="col-6" style="padding-bottom: 25px;">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Tipo de Cultivo Mas Ocupado</h3>
            </div>
            <div class="card-body">
                <table class="table" style="margin-top: 25px;">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cultivos as $cultivo) : ?>
                            <tr class="text-center">
                                <th><?= $cultivo['Tipo_nombre']; ?></th>
                                <td><?= $cultivo['Tipo_cultivo']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <a href="<?= base_url(); ?>/Reportes/imprimirCultivo" class="btn btn-lg text-light" style="background-color: #3A0CA3; float:right;">Imprimir</a>
                </table>
            </div>
        </div>
    </div>
    <div class="col-6" style="padding-bottom: 25px;">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Productos Mas Vendidos</h3>
            </div>
            <div class="card-body">
                <table class="table" style="margin-top: 25px;">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $producto) : ?>
                            <tr class="text-center">
                                <th><?= $producto['Categoria_nombre']; ?></th>
                                <td><?= $producto['Categoria_id']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <a href="<?= base_url(); ?>/Reportes/imprimirProducto" class="btn btn-lg text-light" style="background-color: #3A0CA3; float:right; ">Imprimir</a>
                </table>
            </div>
        </div>
    </div>
    <div class="col-6" style="padding-bottom: 25px;">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Instalaciones Últimos 3 Meses</h3>
            </div>
            <div class="card-body">
                <table class="table" style="margin-top: 25px;">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th scope="col">Nombre</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; ?>
                        <?php foreach ($instalaciones as $instalacion) : ?>
                            <tr class="text-center">
                                <th>Instalacion #<?= $contador;
                                                    $contador++; ?></th>
                                <td>
                                    <?php if ($instalacion['Instalacion_estado'] == 2){
                                        echo 'Completada';
                                    } else if($instalacion['Instalacion_estado'] == 1) {
                                        echo 'En Proceso';
                                    } else {
                                        echo 'Cancelada';
                                    } ?>    
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <a href="<?= base_url(); ?>/Reportes/imprimirInstalaciones" class="btn btn-lg text-light" style="background-color: #3A0CA3; float:right; ">Imprimir</a>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>