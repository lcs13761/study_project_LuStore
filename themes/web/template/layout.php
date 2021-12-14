<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <?= $v->section("styles"); ?>
    <link rel="stylesheet" href="<?= theme("assets/css/style.css"); ?>">
    <link href="<?= theme('assets/css/style.css', CONF_VIEW_ADMIN)  ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= theme("assets/css/styles.css"); ?>">
    <?= $head; ?>
</head>

<body id="page-top">

    <!-- Navigation-->
    <header class="header shop bg-dark">
        <div class="py-3 middle-inner">
            <div class="container ">
                <div class="d-flex flex-wrap align-items-center">
                    <a class="navbar-brand col-lg-2 col-md-2 col-12" style="width:100px" href="<?= url('/') ?>">
                        <img class="w-100" src="/storage/image/logo.png" />
                    </a>
                    <div class="col-lg-8 col-md-7 col-12">
                        <?php if (url() == "/") : ?>
                            <div class="search-bar-top">
                                <div class="search-bar">
                                    <select style="display: none">
                                        <option selected="selected">All Category</option>
                                        <option>watch</option>
                                        <option>mobile</option>
                                        <option>kid’s item</option>
                                    </select>
                                    <div class="nice-select">
                                        <span class="current">AllCategory</span>
                                    </div>
                                    <form>
                                        <!-- <input name="search" placeholder="Search Products Here....." type="search"> -->
                                        <button class="btnn"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-2 col-md-3 col-12">
                        <ul class="navbar-nav ms-auto d-flex flex-row">
                            <li class="nav-item mx-1"><a class="nav-link text-light" href="#about">About</a></li>
                            <!-- <li class="nav-item mx-1"><a class="nav-link text-light" href="#projects">Projects</a></li> -->
                            <?php if (auth()) : ?>
                                <li class="dropdown nav-item mx-1 align-self-lg-center">
                                    <a class="sidebar-brand  dropdown-toggle d-flex align-items-center justify-content-center" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="img-profile  icon-circle " src="<?= theme('assets/img/undraw_profile.svg', CONF_VIEW_ADMIN) ?>">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow " aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="/admin">
                                            <i class="fas fa-fw fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Dashboard
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Perfil
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Configurações
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Atividades
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="logout">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Sair
                                        </a>
                                    </div>
                                </li>
                            <?php else : ?>
                                <li class="nav-item align-self-lg-center mx-1"><a class=" btn-primary nav-link text-light p-2 rounded" href="<?= url("/login") ?>">Login</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?= $v->section("content"); ?>
    <!-- Start Footer Area -->
    <footer style="background: #222;">
        <!-- Footer Top -->
        <div class="py-5 section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer ">
                            <div class="logo mb-3 text-center">
                                <a href="index.html"><img style="height: 100px;" src="/storage/image/logo.png" alt="#"></a>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4 class='text-white h5'>Informaçãp</h4>
                            <ul class = 'ps-0'>
                                <li class='list-unstyled mb-1'><a class = ' text-white text-decoration-none' href="#">Sobre nós</a></li>
                                <li class='list-unstyled mb-1'><a class = 'text-white text-decoration-none' href="#">Perguntas frequentes</a></li>
                                <li class='list-unstyled mb-1'><a class = 'text-white text-decoration-none' href="#">termos e Condições</a></li>
                                <li class='list-unstyled mb-1'><a class = 'text-white text-decoration-none' href="#">Entre em contato conosco</a></li>
                                <li class='list-unstyled mb-1'><a class = 'text-white text-decoration-none' href="#">Ajuda</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4 class ='h5 text-white'>Atendimento ao Cliente</h4>
                            <ul class = 'ps-0'>
                                <li class='list-unstyled mb-1'><a class = ' text-white text-decoration-none' href="#">Métodos de Pagamento</a></li>
                                <li class='list-unstyled mb-1'><a class = ' text-white text-decoration-none' href="#">Dinheiro de volta</a></li>
                                <li class='list-unstyled mb-1'><a class = ' text-white text-decoration-none' href="#">Devoluções</a></li>
                                <li class='list-unstyled mb-1'><a class = ' text-white text-decoration-none' href="#">Envio</a></li>
                                <li class='list-unstyled mb-1'><a class = ' text-white text-decoration-none' href="#">Política de Privacidade</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer social">
                            <h4 class = 'h5 text-white'>Entrar em contato</h4>
                            <!-- Single Widget -->
                            <div class="contact">
                                <ul class = 'ps-0'>
                                    <li class='text-white list-unstyled mb-1'>NO. 3588 - 26 de Janeiro.</li>
                                    <li class='text-white list-unstyled mb-1'>Altamira-PA</li>
                                    <li class='text-white list-unstyled mb-1'>info@lustore.com</li>
                                    <li class='text-white list-unstyled mb-1'>+032 3456 7890</li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                            <ul class="d-flex p-0">
                                <li class=" list-unstyled"><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                <li class=" list-unstyled px-3"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li class=" list-unstyled"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <div class="copyright">
            <div class="container">
                <div class="border-top py-3">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="left">
                                <p class = 'text-white'>Copyright © 2021 - Todos os direitos reservados.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /End Footer Area -->


    <script src="<?= theme('assets/jquery/jquery.min.js', CONF_VIEW_ADMIN) ?>"></script>
    <script src="<?= theme('assets/bootstrap/js/bootstrap.bundle.min.js', CONF_VIEW_ADMIN) ?>"></script>
      <?= $v->section("scripts"); ?>
</body>

</html>