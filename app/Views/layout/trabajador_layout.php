<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($titulo)) : ?>
        <title><?= $titulo; ?></title>
    <?php endif; ?>

    <link rel="stylesheet" href="<?= base_url(); ?>/css/eirapp.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" style="background-color: #0094ba;">
                <div class="row justify-content-center align-items-center minh-100">
                    <div class="col-sm-1">
                        <a href="<?= base_url() ?>/"><img src="<?= base_url(); ?>/img/lefufulogo.png" width="150px" height="150px" alt="..."></a>
                    </div>
                    <div class="col-sm-10">
                        <h1 class="text-center">LE FUFU</h1>
                    </div>
                    <div class="col-sm-1">
                        <a href="<?= base_url() ?>/ver_datos" style="text-decoration:none">
                            <img src="<?= base_url(); ?>/img/usuario.png" width="30px" height="30px" alt="..." class="iniciar_sesion">
                            <p class="text-dark" style="margin-left: 23px;">Perfil</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12" style="padding: 0px; background-color: #00A5CF;">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav">
                            <a class="nav-link text-light text-center" aria-current="page" href="<?= base_url(); ?>/usuario_inicio">Inicio</a>
                            <a class="nav-link text-light text-center" href="<?= base_url(); ?>/listar_instalaciones">Instalaciones</a>
                            <a class="nav-link text-light text-center" href="<?= base_url(); ?>/listarPublicacion">Publicaciones</a>

                        </div>
                        <div class="navbar-nav ms-auto">
                            <a class="nav-link text-light text-center" href="<?= base_url(); ?>/salir">Cerrar Sesion</a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-12" style="min-height: 100vh;">
                <?= $this->renderSection('contenido'); ?>
            </div>
            <div class="col-12" style="padding: 0;">
                <footer class="page-footer font-small teal pt-4 text-center text-white" style="background-color: #00A5CF;">
                    <div class="container p-4 pb-0">
                        <section class="mb-4">
                            <a class="btn btn-outline-light btn-floating m-1" href="https://www.google.com/webhp?hl=es-419&sa=X&ved=0ahUKEwjO2v3817T0AhVzI7kGHb_7BgEQPAgI" role="button"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
                        </section>
                    </div>
                    <div class="text-center p-3" style="padding: 0px; background-color: #0094ba ;">
                        Copyright © 2021
                        <a class="text-white" href="https://mdbootstrap.com/">LeFufu.com.</a>
                        All Rights Reserved
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="<?= base_url(); ?>/js/lefufuapp.js"></script>
    <script src="<?= base_url(); ?>/js/bootstrap/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>