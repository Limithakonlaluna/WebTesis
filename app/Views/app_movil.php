<?= $this->extend('layout/base_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row">
    <div class="col-12" style="margin-top: 25px;">
        <h1 class="text-center">Descarga Nuestra Aplicacion Movil</h1>
    </div>
    <div class="col-md-3 offset-md-3" style="margin-top: 50px;">
        <div id="qrcode">
            <img src="https://www.codigos-qr.com/qr/php/qr_img.php?d=https%3A%2F%2Fdrive.google.com%2Ffile%2Fd%2F17w6cnrGm9A2q5-8PM6hdTjbjrL2v6-2w%2Fview%3Fusp%3Dsharing&s=6&e=m" alt="" />
        </div>
    </div>
    <div class="col-md-5">
        <img src="<?= base_url(); ?>/img/contacto.jpeg" width="400px" height="400px" alt="">
    </div>

</div>
<?= $this->endSection(); ?>