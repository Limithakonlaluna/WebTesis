<?= $this->extend('layout/base_layout'); ?>
<?= $this->section('contenido'); ?>
<div class="row">
    <div class="col-12" style="margin-top: 15px;">
        <h1 class="text-center">Bienvenidos a Le Fufu</h1>
    </div>
    <div class="col-12" style="margin-top: 15px;">
        <div class="row">
            <div class="col-4">
                <img src="<?= base_url(); ?>/img/a.png" class="w-100" alt="">
            </div>
            <div class="col-4">
                <img src="<?= base_url(); ?>/img/b.png" class="w-100" alt="">
            </div>
            <div class="col-4">
                <img src="<?= base_url(); ?>/img/c.png" class="w-100" alt="">
            </div>
        </div>
    </div>
    <div class="col-11 form-control">
        <br>
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-8">
                <h1 class="text-center">Nuestra Historia</h1>

                <p>Le Fufu es una empresa de desarrollo de software enfocada en la automatización del proceso de cuidado y monitoreo de cultivos en
                    espacios reducidos o cerrados formada en agosto del año 2021, la empresa pretende entrar al mercado de Agricultura Vertical de
                    una manera fuerte para poder lidiar con la competencia, y dan una buen servicio a sus clientes, para lograr esto la empresa ha
                    decidido desarrollar un sistema que se ajuste a estas medidas además de publicitarse a través de redes sociales para así poder
                    alcanzar un mayor número de clientes.
                </p>
                <br>
                <p>
                    Le Fufu cuenta con un equipo de trabajo pequeño que consta de 2 personas, encargadas del desarrollo, administración, distribución
                    y mantención de los servicios que ofrece, para mantener un mejor orden de estas áreas de la empresa se dividió la administración
                    de ellas entre los dos integrantes de esta, Le Fufu tiene un modelo de negocios enfocado en el aseguramiento de sus servicios, la
                    calidad de estos y la satisfacción de sus clientes y/o usuarios
                </p>
            </div>
            <div class="col-2">

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a><img src="<?= base_url(); ?>/img/banner.png" class="w-100 alt=""></a>

</div>
        </div>
        <div class=" row">
                    <h1 class="text-center" style="margin-bottom: 35px;">Nuestros Valores</h1>
                    <div class="col-2"></div>
                    <div class="col-2">
                        <h2>Honestidad </h2>
                        <h6>Actuar con transparencia logrando ganar una mayor confianza con nuestros clientes, colaboradores y comunidad</h6>
                    </div>
                    <div class="col-2">
                        <h2>Compromiso</h2>
                        <h6> Estamos comprometidos con el medio ambiente y nuestro entorno trabajando a diario para el mejoramiento continuo.</h6>
                    </div>
                    <div class="col-2">
                        <h2>Generosidad </h2>
                        <h6>Brindar de la mejor manera nuestras riquezas usando de manera racional los recursos de la empresa.</h6>
                    </div>
                    <div class="col-2" style="margin-bottom: 35px;">
                        <h2>Innovación </h2>
                        <h6>Nos caracterizamos por trabajar de una manera diferente, única e inigualable, ya que nos atrevemos a hacer cosas que ya se han visto, pero esta vez con mejor calidad.</h6>
                    </div>

                    <!--  <div class="col-2">
                        <a><img src="<?= base_url(); ?>/img/valores.jpg" class="w-50, h-50 alt=""></a>

            </div> -->
            </div>


        </div>
    </div>
    <?= $this->endSection(); ?>