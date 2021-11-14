<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link rel="stylesheet" href="<?= theme("assets/css/styles.css"); ?>">
    <?= $head; ?>
</head>

<body id="page-top">

    <!-- Navigation-->
    <header class="header shop bg-dark">
        <div class="py-3 middle-inner">
            <div class="container ">
                <div class="d-flex flex-wrap align-items-center">
                    <a class="navbar-brand col-lg-2 col-md-2 col-12" style="width:100px" href="#">
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
                                        <button class="btnn"><i class="ti-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-2 col-md-3 col-12">
                        <ul class="navbar-nav ms-auto d-flex flex-row">
                            <li class="nav-item mx-1"><a class="nav-link text-light" href="#about">About</a></li>
                            <li class="nav-item mx-1"><a class="nav-link text-light" href="#projects">Projects</a></li>
                            <?php if (auth()) : ?>
                                <li class="nav-item mx-1 align-self-lg-center"><a class=" btn-primary nav-link p-2 rounded text-light" href="<?= url("/logout") ?>">SingOut</a></li>
                            <?php else : ?>
                                <li class="nav-item align-self-lg-center mx-1"><a class=" btn-primary nav-link text-light p-2 rounded" href="<?= url("/login") ?>">SinIn</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class=" bg-dark border-top">
        <div class="container" style = "max-width:1170px">
            <div class="row">
                <div class="col-lg-3  px-2">
                    <div class = "bg-warning h-100">
                        <h3 class='pt-3 text-center h5 fw-bolde'>CATEGORIAS</h3>
                    </div>
                    <ul></ul>
                </div>
                <div class="col-lg-9 col-12">
                    <div class = "">
                        <nav class="navbar navbar-expand-lg p-0">
                            <div class="navbar-collapse ">
                                <div class="float-sm-start ">
                                    <ul class="nav main-menu menu navbar-nav">
                                        <li class="active ms-2 "><a class = "p-4 nav-link text-white fs-6" href="#">Home</a></li>
                                        <li class="nav-item"><a class = "p-4 nav-link text-white fs-6" href="#">Product</a></li>
                                        <li class=" "><a class = "p-4 nav-link text-white fs-6" href="#">Service</a></li>
                                        <li class=""><a class = "p-4 nav-link text-white fs-6" href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                            <!-- <ul class="dropdown">
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                            </ul> -->
                                        </li>
                                        <li class=""><a class = "p-4 nav-link text-white fs-6" href="#">Pages</a></li>
                                        <li class=""><a class = "p-4 nav-link text-white fs-6" href="#">Blog<i class="ti-angle-down"></i></a>
                                            <!-- <ul class="dropdown">
                                                <li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
                                            </ul> -->
                                        </li>
                                        <li class=""><a class = "p-4 nav-link text-white fs-6" href="contact.html">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?= $v->section("content"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?= theme('js/scripts.js'); ?>"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>