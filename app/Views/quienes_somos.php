<?= $this->extend('layout/base_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row align-items-center justify-content-center" style="margin-top: 50px;">
    <?php foreach ($datos as $d) : ?>
        <div class="col-md-8">
            <h1 class="text-center">Quienes Somos</h1>
            <p class="text-center"><?= $d['Datos_comentario']; ?></p>
        </div>
        <div class="col-md-3 text-center">
            <img src="<?= base_url(); ?>/img/epreton.png" class="w-50" alt="....">
        </div>
        <div class="col-md-3 text-center" style="margin-top: 80px;">
            <img src="<?= base_url(); ?>/img/misison.png" class="w-80" alt="....">
        </div>
        <div class="col-md-8" style="margin-top: 60px;">
            <h1 class="text-center">Nuestra Mision</h1>
            <p class="text-center"><?= $d['Datos_mision']; ?></p>
        </div>
        <div class="col-md-8"style="margin-top: 80px; margin-bottom: 80px;">
            <h1 class="text-center">Nuestra Vision</h1>
            <p class="text-center"><?= $d['Datos_vision']; ?></p>
        </div>
        <div class="col-3 text-center" style="margin-top: 100px; margin-bottom: 80px;">
            <img src="<?= base_url(); ?>/img/vision.png" class="w-80" alt="....">
        </div>
    <?php endforeach; ?>

</div>

<?= $this->endSection(); ?>