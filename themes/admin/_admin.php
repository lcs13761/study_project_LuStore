<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= theme2("node_modules/bootstrap/compiler/bootstrap.css"); ?>">
    <link rel="stylesheet" href="<?= theme2("node_modules/bootstrap/compiler/bootstrap-grid.css"); ?>">
    <link rel="stylesheet" href="<?= theme2("node_modules/bootstrap/compiler/bootstrap-utilities.css"); ?>">
    <link rel="stylesheet" href="<?= theme("assets/css/styles.css"); ?>">
    <?= $head; ?>
</head>

<body>
    <div class="posicao">
        <nav class="navbar-expand-lg navbar-dark  painel">
            <button class="navbar-toggler navbar " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" float-md-start painel">
                <div class="collapse navbar-collapse " id="navbarSite">
                    <div class="ms-sm-1 ">
                        <ul class="text-center ">
                            <li class=" list-group-item border-0 text-white ">
                                <img data-bs-toggle="modal" data-bs-target="#staticBackdrop" src=" <?= (!empty($imgUsuario) ? image($imgUsuario, 200, null) : ""); ?>"  class="p-0 border-0 img-thumbnail imagemw">
                            </li>
                            <form method="POST" action="<?= url("/admin/painel/home/userimagem"); ?>" enctype="multipart/form-data">
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <input name="imagem" type="file" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="bt1" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" value="1" name="<?= (!empty($imgUsuario) ? "Deletar" : ""); ?>" class="bt1 <?= (!empty($imgUsuario) ? "" : "d-none"); ?>"><?= (!empty($imgUsuario) ? "Deletar" : ""); ?></button>
                                                <button type="submit" class="bt1" value="1" name="<?= (!empty($imgUsuario) ? "Editar" : "Salvar"); ?>">Salvar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </ul>
                        <ul class="text-center mt-4">
                            <li class="list-group-item border-0">
                                <a href="<?= url("admin/painel/home"); ?>" class="text-decoration-none text-white d">
                                    Painel
                                </a>
                            </li>
                            <li class="list-group-item border-0 mt-3 text-center">
                                <a href="<?= url("admin/painel/home/adicionar"); ?>" class="text-decoration-none text-white d">
                                    Adicionar Produtos
                                </a>
                            </li>
                            <li class="list-group-item border-0 mt-3 text-center">
                                <a href="<?= url("admin/painel/home/banner"); ?>" class=" text-decoration-none text-white d">
                                    Mudar Banner
                                </a>
                            </li>
                            <li class="list-group-item border-0 mt-3 text-center">
                                <a href="<?= url("admin/perguntas-respostas"); ?>" class="text-decoration-none text-white d">
                                    Perguntas é Respostas
                                </a>
                            </li>
                            <li class="list-group-item border-0 pb-5  mt-3 text-center">
                                <a href="<?= url("admin/painel/home/logout"); ?>" class="text-decoration-none text-white d">
                                    SAIR
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>



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
                        <p class="mb-md-0">LuVariedade@Luvariedade.com</p>
                    </li>
                    <li class="list-group-item border-0 bi-geo"> Endereco
                        <p class="mb-md-0">Altamira,PA/Brasil</p>
                    </li>

                </ul>
                <ul class="list-group1 list-group-flush ms-sm-4">
                    <li class="list-group-item   h4 fw-bolder">Social</li>
                    <a target="_blank" class="btn-link1" href="http://www.facebook.com">
                        <li class="list-group-item border-0 d bi-facebook"> /LuVariedades</li>

                    </a>
                    <a target="_blank" class="btn-link1 " href="http://www.twitter.com">
                        <li class="list-group-item border-0 d  bi-twitter"> @LuVariedades</li>
                    </a>
                    <a target="_blank" class="btn-link1 " href="http://www.youtube.com">
                        <li class="list-group-item border-0 d bi-youtube"> /LuVariedades</li>
                    </a>
                </ul>
            </div>

        </div>

        <!---scritps---------------------------->
        <script src="<?= theme2("node_modules/jquery/dist/jquery.js"); ?>"></script>
        <script src="<?= theme2("node_modules/bootstrap/dist/js/bootstrap.js"); ?>"></script>
        <script src="<?= theme("/assets/js/script.js"); ?>"></script>
        <?= $v->section("script"); ?>

</body>

</html>