<?php $v->layout("_theme"); ?>

<?php if (!empty($banner)) : ?>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <?php foreach ($banner as $banner) : ?>
            <div class="carousel-inner" style="height:300px">
                <?php if (!empty($banner->imagem1)) : ?>
                    <div class="carousel-item active">
                        <img class="d-block w-100 " src="<?= image($banner->imagem1, 800, null); ?> " alt="Primeiro Slide">
                    </div>
                <?php endif; ?>
                <?php if (!empty($banner->imagem2)) : ?>
                    <div class="carousel-item">
                        <img class="d-block w-100 " src="<?= image($banner->imagem2, 800, null); ?>" alt="Segundo Slide">
                    </div>
                <?php endif; ?>
                <?php if (!empty($banner->imagem3)) : ?>
                    <div class="carousel-item">
                        <img class="d-block w-100 " src="<?= image($banner->imagem3, 800, null); ?>" alt="Terceiro Slide">
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>

    </div>
<?php endif; ?>

<div class="container">
    <div class=" text-center">
        <div class="h2 mt-5  mb-5 font-monospace text-uppercase">
            <p>CONFIRA NOSSOS PROTUDOS ABAIXO</p>
        </div>
    </div>
</div>

<?php if (!empty($product)) : ?>
    <div class="container">
        <div class="text-center ">
            <?php foreach ($product as $product) : ?>
                <div class="card ms-2 mb-5 test shadow-lg" style="width: 18rem; display:inline-block; ">
                    <a class="text-decoration-none " style="color:black;" href="<?= url("/content/$product->title"); ?>">
                        <img style="" src="<?= image($product->imagem1, 286, 286);  ?>" class="card-img-top mt-4" alt="...">
                        <div class="card-body border-top">
                            <h5 class="card-title over"><?= $product->title; ?></h5>
                            <h4 class=" card-subtitle mb-2  text-muted"><?= $product->value_product; ?></h4>
                            <p class="card-text fort"><?= $product->description; ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
            <div>
                <?= $paginator; ?>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="text-center w-100 pt-5 mb-sm-5">
        <div class=" pt-4 mt-sm-5">
            <h3 class="h2 fw-bold">Ooops, não temos conteúdo aqui :/</h3>
            <p class="h5 pt-3">Ainda estamos trabalhando, em breve teremos novidades para você :)</p>
        </div>
    </div>
<?php endif; ?>