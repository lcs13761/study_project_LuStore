<?php $v->layout("_admin"); ?>

<div class="painel" style="background-color: aliceblue;flex-grow: 1;">
    <div class="">
        <div class="text-center ">
            <div class="">
                <form name="search" method="POST" class="d-inline-flex w-seach pt-5" action="<?= url("/admin/painel/home/search"); ?>" enctype="multipart/form-data">
                    <input class=" form-control w-75 me-2" name="s" type="text" placeholder="Search" aria-label="Search">
                    <button class=" d1">Search</button>
                </form>
            </div>
            <?php if (!empty($product)) : ?>
                <?php $i = 1;
                foreach ($product as $product) : ?>
                        <div class="mt-5 card ms-2 mb-5 test shadow-lg" style="width: 13rem; display:inline-block; ">
                            <img style="width:180px; height:180px;" src="<?= image($product->imagem1, 180, null); ?>" class="card-img-top mt-1" alt="...">
                            <div class="card-body border-top">
                                <h5 class="card-title over" style="font-size: 1rem;"><?= $product->title; ?></h5>
                                <h4 class=" card-subtitle mb-2  text-muted" style="font-size: 1rem;"><?= $product->value_product; ?></h4>
                                <p class="card-text over"><?= $product->description; ?></p>
                                <a name="id" class="d1" value="<?= $product->id; ?>" href="<?= url("/admin/painel/home/editar/$product->id/$product->title"); ?>">Editar</a>
                                <button type="button" class="d1" data-bs-toggle="modal" data-bs-target=<?php echo "#staticBackdrop$i" ?>>
                                    Excluir
                                </button>
                                <!-- Modal -->
                                <form method="POST" action="<?= url("/admin/painel/home/delete"); ?>" enctype="multipart/form-data">
                                    <div class="modal fade" id= <?php echo "staticBackdrop$i" ?> data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Deseja Realmente Excluir?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="bt1 " data-bs-dismiss="modal">Não</button>
                                                    <button type="submit" name="id" value="<?= $product->idimagem; ?>" class="bt1">Sim</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php $i++;
                endforeach; ?>
                <div>
                    <?= $paginator; ?>
                </div>
            <?php else : ?>
                <div class="text-center w-100 pt-5 mb-sm-5">
                    <div class=" pt-4 mt-sm-5">
                        <h3 class="h2 fw-bold">Ooops, não temos conteúdo aqui :/</h3>
                        <p class="h5 pt-3">Ainda estamos trabalhando, em breve teremos novidades para você :)</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>