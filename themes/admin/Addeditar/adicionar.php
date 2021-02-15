<?php $v->layout("_admin"); ?>

<div class=" painel" style="background-color: aliceblue; flex-grow: 1;">
    <div class="">
        <div class="text-center ">
            <div class="">
                <!------------->
                <?php if (!empty($editar)) : ?>
                    <?php if (!empty($imagem)) : ?>
                        <?php $i = 1;
                        foreach ($imagem as $image => $value) : ?>
                            <div class=" card ms-2 mb-5 test fst shadow-lg" style="width: 13rem; display:inline-block;" data-bs-toggle="modal" data-bs-target=<?php echo "#staticBackdrop$i" ?>>
                                <img style="height:250px;" class="card-img-top mt-1" src="<?= image($value, 180, null); ?>" class="float-start" alt="...">
                            </div>
                            <div class="modal fade" id=<?php echo "staticBackdrop$i" ?> data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" class="" action="<?= url("/admin/painel/home/editar/imagem"); ?>" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <input name="imagem" type="file" class="form-control">
                                                    <input name="id" value="<?= $idimage ?>" type="text" style="display: none">
                                                    <input name="produto" value="<?= $update['id'] ?>" type="text" style="display: none">
                                                    <input name="title" value="<?= $update['title'] ?>" type="text" style="display: none">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="bt1" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" name="delete" value="<?= $image; ?>" class="bt1">Deletar</button>
                                                <button type="submit" name="update" value="<?= $image; ?>" class="bt1">Editar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php $i++;
                        endforeach; ?>
                    <?php else : ?>
                        <div class=" fst ms-2">
                            <div class=" mb-3">
                                <p class="h5">Adicione no minimo 1 imagem é no maximo 4</p>
                            </div>
                            <div class="mb-3 ">
                                <button type="button" class="bt1" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                                    Adicionar
                                </button>
                            </div>
                            <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" class="" action="<?= url("/admin/painel/home/editar/imagem/mupltiplus"); ?>" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <input name="imagem[]" type="file" class="form-control" multiple accept="image/*">
                                                    <input name="produto" value="<?= $update['id'] ?>" type="text" style="display: none">
                                                    <input name="title" value="<?= $update['title'] ?>" type="text" style="display: none">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="bt1" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" name="id" value="<?= $idimage; ?>" class="bt1">Adicionar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <!--------------------------------->
                <form method="POST" class="" action="<?= (!empty($editar) ? url("/admin/painel/home/editar/conteudo") : url("/admin/painel/home/adicionar")); ?>" enctype="multipart/form-data">
                    <div class="<?= (!empty($editar) ? "" : "mt-5"); ?> ms-2 mb-5 " style=" display:inline-block;width: 300px;">
                        <div class="<?= (!empty($editar) ? "d-none" : ""); ?>">
                            <div class=" mb-3">
                                <p class="h5">Adicione no minimo 1 imagem é no maximo 4</p>
                            </div>
                            <div class="input-group mb-3 ">
                                <input name="imagem[]" type="file" class="form-control block" multiple <?= (!empty($editar) ? $update['title'] : ""); ?>" name="title" <?= (!empty($editar) ? "" : "required"); ?>  accept="image/*" />
                                <label class="input-group-text" for="inputGroupFile02">IMAGEM1</label>
                            </div>
                        </div>

                        <label class="d-block pt-3 ">
                            <div class="h5">
                                <span>Nome do produto:</span>
                            </div>
                            <input class="w-100 h-25 p-3 rounded-2 border-dark" type="text" value="<?= (!empty($editar) ? $update['title'] : ""); ?>" name="title" <?= (!empty($editar) ? "" : "required"); ?> />
                        </label>

                        <label class="d-block pt-3">
                            <div class="h5">
                                <span>Valor:</span>
                            </div>
                            <input class="ValoresItens w-100 h-25  p-3 rounded-2 border-dark" type="text" value="<?= (!empty($editar) ? $update['value_product'] : ""); ?>" name="value_product" <?= (!empty($editar) ? "" : "required"); ?> />
                        </label>

                        <label class="d-block pt-3">
                            <div class="h5">
                                <span>Descrição:</span>
                            </div>
                            <textarea style="resize: none; height:120px; border: 2px solid;" type="text" name="description" class="w-100  p-2 rounded-2 border-dark" aria-label="With textarea" <?= (!empty($editar) ? "" : "required"); ?>><?= (!empty($editar) ? $update['description'] : ""); ?></textarea>
                        </label>
                        <div class="mt-4">
                            <button type="submit" name="<?= (!empty($editar) ? "id" : ""); ?>" value="<?= (!empty($editar) ? $update['id'] : ""); ?>" class="btn btn-secondary w-25" data-bs-dismiss="modal"><?= (!empty($editar) ? "Editar" : "Adicionar"); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $v->start("script"); ?>
<script>
    $(document).ready(function() {
        $(".ValoresItens").maskMoney({
            prefix: "R$ ",
            decimal: ",",
            thousands: "."
        });
    });
</script>
<script src=" <?= theme2("themes/admin/assets/js/jquery.maskMoney.min.js"); ?>"></script>

<?php $v->end(); ?>