<?php $v->layout("_theme"); ?>




<?php if (!empty($search)) : ?>
    <div class="container mt-5">
        <div class="text-center ">
            <?php foreach ($search as $search) : ?>
                <div class="card ms-2 mb-5 " style="width: 18rem; display:inline-block; ">
                    <a class="text-decoration-none" style="color:black;" href="<?= url("/content/$search->title"); ?>">
                        <img style="width:286px; height:286px;" src="<?= image($search->imagem1,286,null); ?>" class="card-img-top mt-4" alt="...">
                        <div class="card-body border-top">
                            <h5 class="card-title"><?= $search->title; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $search->value_product; ?></h6>
                            <p class="card-text"><?= $search->description; ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <?= $paginator; ?>
    </div>
<?php else : ?>
    <div class="text-center w-100 pt-5 mb-sm-5">
        <div class="pt-4 mt-sm-5">
            <h3 class="h2 fw-bold">Ooops, Produto não encontrado </h3>
        </div>
    </div>
<?php endif; ?>