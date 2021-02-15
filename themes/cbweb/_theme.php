<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= theme2("node_modules/bootstrap/compiler/bootstrap.css"); ?>">
  <!--  <link rel="stylesheet" href="<?= theme2("node_modules/bootstrap/compiler/bootstrap-grid.css"); ?>">
    <link rel="stylesheet" href="<?= theme2("node_modules/bootstrap/compiler/bootstrap-utilities.css"); ?>">--->
    <link rel="stylesheet" href="<?= theme2("node_modules/bootstrap-icons/font/bootstrap-icons.css"); ?>">
    <link rel="stylesheet" href="<?= theme("assets/css/styles.css"); ?>">
    <?= $head; ?>
</head>

<body class="bg-cod">



    <!-------------- nav --------------------------------->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">

            <a class="navbar-brand h1 d mb-0" href="<?= url(""); ?>">Site Modelo</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSite">
                    <form name="search" method="POST" class="d-flex w-5 m-auto" action="<?= url("/buscar"); ?>" enctype="multipart/form-data" >
                        <input class=" form-control me-2 " name="search" type="s" placeholder="Search" aria-label="Search">
                        <button class="btn btn-secondary d1">Search</button>
                    </form>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link d text-white" href="<?= url(""); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d text-white" href="<?= url("/sobre"); ?>">Sobre</a>
                    </li>

                </ul>
            </div>
        </div>
        </div>
    </nav>

    <!-----------------------content------------------------>
    <div class = "h">
    <?= $v->section("content"); ?>
    </div>
    <!-----------------footer------------------------------->

    <div class="card-footer text-center">
        <div class=" mt-5 mb-sm-4" style="color:#fff;">
            <div class="">
                <ul class="list-group1 list-group-flush me-sm-5">
                    <li class="list-group-item h4 fw-bolder">Mais</li>
                    <a class="btn-link1 " href="<?= url(""); ?>">
                        <li class="list-group-item d border-0 ">Home</li>
                    </a>
                    <a class="btn-link1 " href="<?= url("/sobre"); ?>">
                        <li class="list-group-item d border-0">Sobre</li>
                    </a>
                </ul>
                <ul class="list-group1 list-group-flush ms-sm-5 me-sm-5 ">
                    <li class="list-group-item h4 fw-bolder">Contato</li>
                    <li class="list-group-item border-0 bi-telephone-fill"> Telefone
                        <p class="mb-md-0">+555</p>
                    </li>
                    <a target="_blank" class="btn-link1 " href="https://api.whatsapp.com/">
                        <li class="list-group-item border-0 d bi-whatsapp"> Whatsapp</li>
                    </a>
                    <li class="list-group-item border-0 bi-at"> Email
                        <p class="mb-md-0">Lucasdevjr@lucasdevjr.com.br</p>
                    </li>
                    <li class="list-group-item border-0 bi-geo"> Endereco
                        <p class="mb-md-0">Altamira,PA/Brasil</p>
                    </li>

                </ul>
                <ul class="list-group1 list-group-flush ms-sm-4">
                    <li class="list-group-item   h4 fw-bolder">Social</li>
                    <a target="_blank" class="btn-link1" href="http://www.facebook.com">
                        <li class="list-group-item border-0 d bi-facebook"> /Lucasdevjr</li>

                    </a>
                    <a target="_blank" class="btn-link1 " href="http://www.twitter.com">
                        <li class="list-group-item border-0 d  bi-twitter"> @Lucasdevjr</li>
                    </a>
                    <a target="_blank" class="btn-link1 " href="http://www.youtube.com">
                        <li class="list-group-item border-0 d bi-youtube"> /Lucasdevjr</li>
                    </a>
                </ul>
            </div>

        </div>

        <a target="_blank" href="https://api.whatsapp.com" class=" bi-whatsapp position-fixed wht-fix"></a>

        <!-- scripts ------------------------------------------------------->
        
        <script src="<?= theme2("node_modules/popper.js/dist/umd/popper.js"); ?>"></script>
        <script src="<?= theme2("node_modules/bootstrap/dist/js/bootstrap.js"); ?>"></script>
        <script src="<?= theme2("node_modules/@popperjs/core/dist/umd/popper.js"); ?>"></script>
        <?= $v->section("scripts"); ?>
        <script src="<?= theme("/assets/js/script.js"); ?>"></script>

</body>


</html>