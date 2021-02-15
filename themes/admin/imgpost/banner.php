<?php $v->layout("_admin"); ?>


<div class="painel" style="background-color: aliceblue;flex-grow: 1;">
    <div class=" ms-sm-5 ">
        <div class="text-center">
            <?php if (!empty($banner)) : ?>
                <?php $i = 1; foreach ($banner as $ban => $value) : ?>
                    <!----------->
                        <div data-bs-toggle="modal" data-bs-target= <?php echo "#staticBackdrop$i" ?> class="fst card ms-2 mb-5 w-75 test shadow-lg" style="width: 13rem; display:inline-block; cursor: pointer;" >
                            <img style="height:250px;" class="card-img-top " src="<?= image($value, 180, null); ?>" class="float-start" alt="...">
                        </div>           
                        <form method="POST" action="<?= url("/admin/painel/home/banner/update"); ?>" enctype="multipart/form-data">
                            <div class="modal fade" id= <?php echo "staticBackdrop$i" ?> data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group mb-3">
                                                <input name="imagem" type="file" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="bt1" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" name = "delete" value= "<?= $ban ;?>" class="bt1">Deletar</button>
                                            <button type="submit" name = "update" value= "<?= $ban;?>" class="bt1">Editar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                <?php $i++; endforeach; ?>
            <?php else : ?>
                <div class="text-center w-100 pt-5 mb-sm-5">
                    <div class=" pt-4 mt-sm-5">
                        <h3 class="h2 fw-bold">Ooops, nenhuma imagem foi adicionado ao seu banner</h3>
                        <button type="button" class="bt1" data-bs-toggle="modal" data-bs-target="#staticBackdrop0">
                            Adicionar
                        </button>
                        <form method="POST" action="<?= url("/admin/painel/home/banner/insert"); ?>" enctype="multipart/form-data">
                            <div class="modal fade" id="staticBackdrop0" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group mb-3">
                                                <input name="imagem[]" type="file" class="form-control" multiple>
                                                <label class="input-group-text" for="inputGroupFile02">Banner</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="bt1" data-bs-dismiss="modal">Não</button>
                                            <button type="submit" class="bt1">Sim</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>