<?php if (session('rol_id') == 3) : ?>
    <?= $this->extend('layout/trabajador_layout'); ?>
<?php endif; ?>
<?php if (session('rol_id') == 1) : ?>
    <?= $this->extend('layout/admin_layout'); ?>
<?php endif; ?>
<?= $this->section('contenido'); ?>

<div class="row" style="margin-top: 25px; margin-bottom: 25px;">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Instalaciones</h2>
            </div>

        </div>

    </div>
    <div class="col-4" style="margin-top: 15px; margin-left: 15px;">
        <div class="row form-control">
            <div class="col-12" style="padding-bottom: 15px; margin-left: -15px;">
                <h4 class="text-center">Listado de Instalaciones</h4>
            </div>
            <div class="col-12" style="padding-bottom: 15px; margin-left: -15px;">
                <div class="row">
                    <?php $contador = 1; ?>
                    <?php foreach ($instalaciones as $instalacion) : ?>
                        <div class="col-4" style="padding-bottom: 25px;">
                            <p style="margin-top: 15px;"><b>Instalacion Nº<?= $contador;
                                                                            $contador++; ?></b></p>
                        </div>
                        <div class="col-8" style="padding-bottom: 25px;">
                            <a href="<?= base_url(); ?>/ver_instalacion/<?= $instalacion['Instalacion_id'] ?>" class="btn btn-lg text-light" style="background-color: #3A0CA3; width: 100%;">Ver</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($datosInstalacion)) : ?>
        <div class="col-7" style="margin-top: 15px;">
            <?php foreach ($datosInstalacion as $dt) : ?>
                <div class="col-sm-12 form-control">
                    <h3 class="text-center">Datos para la instalaciones</h3>
                    <p><b>Nombre Cliente: </b> <?= $dt['Cliente'] ?></p>
                    <p><b>Direccion: </b> <?= $dt['Usuario_direccion'] ?></p>
                    <p><b>Telefono: </b> <?= $dt['Usuario_telefono'] ?></p>
                    <p><b>Fecha: </b> <?= date('d-m-Y', strtotime($dt['Orden_fecha'])); ?></p>
                    <p><b>Instalador Asignado: </b> <?= $dt['Tecnico'] ?></p>
                    <?php if (!isset($tecnicos)) : ?>
                        <div class="col-12" style="padding-bottom: 25px;">
                            <div class="row">
                                <?php if (session('rol_id') == 3) : ?>
                                    <div class="col-md-6 offset-md-4">
                                        <a href="<?= base_url(); ?>/editar_instalacion/<?= $dt['Instalacion_id'] ?>" class="btn btn-lg text-light" style="background-color: #3A0CA3; width: 250px;">Editar</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($tecnicos)) : ?>
                        <form action="<?= base_url('actualizar_instalacion'); ?>" method="post">
                            <div class="row">
                                <div class="col-5" style="padding-bottom: 25px;">
                                    <p class="text-center"><b>Asignar Nuevo Tecnico Instalador:</b> </p>
                                </div>
                                <div class="col-7" style="padding-bottom: 25px;">
                                    <select name="usuario_id" id="usuario_id" class="form-select">
                                        <option value="0">Seleccion una categoria</option>
                                        <?php foreach ($tecnicos as $tecnico) : ?>
                                            <option value="<?= $tecnico['Usuario_id']; ?>"><?= $tecnico['Usuario_nombre']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if ($errores->getError('usuario_id')) : ?>
                                        <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                            <?= $errores->getError('usuario_id'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php foreach ($instalacionSeleccionada as $ins) : ?>
                                <input type="hidden" name="instalacion_id" id="instalacion_id" value="<?= $ins['Instalacion_id']; ?>">
                            <?php endforeach; ?>
                            <div class="row" style="padding-bottom: 25px;">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Actualizar" class="btn btn-lg text-light" style="background-color: #3A0CA3; width: 250px;">
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="row" style="margin-top: 15px;">

        <div class="col-2 offset-6">
            <?php if (session('rol_id') == 3) : ?>
                <a href="<?= base_url(); ?>/crear_instalacion" class="btn btn-lg text-light" style="background-color: #3A0CA3;">Generar Instalaciones</a>
            <?php endif; ?>
        </div>
        <div class="col-2 ">
            <a href="<?= base_url(); ?>/listar_instalacionesSemana" class="btn btn-lg text-light" style="background-color: #3A0CA3;"> Instalaciones semana</a>
        </div>
        <div class="col-2 ">
        <?php if (session('rol_id') == 3) : ?>
                <a href="<?= base_url(); ?>//instalacion/listarInstalacion" class="btn btn-lg text-light" style="background-color: #3A0CA3;">Imprimir</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>