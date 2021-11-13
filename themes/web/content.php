<?php $v->layout("_theme"); ?>

<div class="container1 mt-5">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="<?= url(""); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product</li>
        </ol>
    </nav>
    <div class="bg-body shadow-sm flx rounded" style="margin-bottom: 3rem;">
        <div class="p-4 h-100 w-100">
            <?php foreach ($product as $product) : ?>
                <div class="bg-body d-sm-flex border-0 h-25 w-100 float-start mb-4">
                    <!----------->
                    <?php if (!empty($product->imagem1)) : ?>
                        <img id="imagem1" onclick="mudaImagem(1)" class="rounded-3 bdhv w-250 " src="<?= image($product->imagem1,500,null); ?>" class="float-start" alt="...">
                    <?php endif; ?>
                    <!----------->
                    <?php if (!empty($product->imagem2)) : ?>
                        <img id="imagem2" onclick="mudaImagem(2)" class="bdhv rounded-3 w-250 ms-1" src=" <?= image($product->imagem2,400,null);?>" class=" float-start" alt="...">
                    <?php endif; ?>
                    <!----------->
                    <?php if (!empty($product->imagem3)) : ?>
                        <img id="imagem3" onclick="mudaImagem(3)" class="bdhv rounded-3 w-250 ms-1" src=" <?= image($product->imagem3,400,null); ?>" class=" float-start" alt="...">
                    <?php endif; ?>
                    <!----------->
                    <?php if (!empty($product->imagem4)) : ?>
                        <img id="imagem4" onclick="mudaImagem(4)" class="bdhv rounded-3 w-250 ms-1" src=" <?= image($product->imagem4,400,null); ?>" class=" float-start" alt="...">
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            <div class="text-center">
                <img id="imagem0" class="rounded border-0 w-75 himagem" src=" <?= image($product->imagem1,400,400); ?>" alt="...">
                
            </div>
            
        </div>
        <div class="shadow bord-l">
            <div class=" r">
                <div class="pot c">
                    <h4 class = "h4"><?= $title;?></h4>
                    <h4 class = "h4 mt-4 text-muted"><?= $value;?></h4>
                    <p class = "h6 mt-4"><?= $description;?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>