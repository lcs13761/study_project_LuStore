<div class=" bg-dark border-top">
    <div class="container" style="max-width:1170px">
        <div class="row">
            <div class="col-lg-3">
                <div class='d-flex  bg-warning h-100 justify-content-center dropdown'>
                    <h5 class='m-0 user-select-none fw-bolde sidebar-brand  dropdown-toggle d-flex align-items-center justify-content-center' href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CATEGORIAS</h5>
                    <div class="dropdown-menu dropdown-menu-right shadow " aria-labelledby="userDropdown">
                        <?php foreach ($categories as $category): ?>
                        <a class="dropdown-item px-5" href="<?= url('category.show.web', ['category' => str_replace(' ', '',$category->name),'id' => $category->id]) ?>">
                            <?= $category->name ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <ul></ul>
            </div>
            <div class="col-lg-9 col-12">
                <div class="">
                    <nav class="navbar navbar-expand-lg p-0">
                        <div class="navbar-collapse ">
                            <div class="float-sm-start ">
                                <ul class="nav main-menu menu navbar-nav">
                                    <li class="active ms-2 "><a class="p-4 nav-link text-white fs-6" href="<?= url('/') ?>">Home</a></li>
                                    <li class="nav-item"><a class="p-4 nav-link text-white fs-6" href="#">Produtos</a></li>
                                    <li class=""><a class="p-4 nav-link text-white fs-6" href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                        <!-- <ul class="dropdown">
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                        </ul> -->
                                    </li>
                                    <li class=""><a class="p-4 nav-link text-white fs-6" href="contact.html">Entre em contato conosco</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>