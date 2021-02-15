<?php $i = 1;
foreach ($about as $faq) : ?>
    <article class="faq0 bg-blu " style="width: 285px;flex-basis:auto;padding-bottom: 13px;padding-top: 13px;">
        <div class="j_collapse">
            <h4 class="j_collapse_icon bi-caret-right-fill"><?= $faq->perguntas; ?></h4>
            <div class="j_collapse_box collapse">
                <p><?= $faq->resposta; ?></p>
            </div>
        </div>
        <div class="text-center">
        <form method="POST" style = "display:inline-flex;" action="<?= url("/admin/perguntas-respostas/delete"); ?>" enctype="multipart/form-data">
            <button name="deletar" value="<?= $faq->id; ?>" class="d1">
                Deletar
            </button>
        </form>
            <button data-bs-toggle="modal" data-bs-target=<?php echo "#staticBackdrop$i" ?> class="d1">
                Editar
            </button>
        </div>
        <!------------------------------------------------->
        <div class="modal fade" id=<?php echo "staticBackdrop$i" ?> data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" class="" action="<?= url("/admin/perguntas-respostas/update"); ?>" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <label class="pb-sm-3" style="Color:#000;width:100%">Pergunta</label>
                                <input name="perguntas" type="text" value="<?= $faq->perguntas; ?>" class="form-control">
                            </div>
                            <div class="input-group mb-3">
                                <label class="pb-sm-3" style="Color:#000;width:100%">Resposta</label>
                                <textarea style="resize: none; height:120px; border: 0.1px solid #cccc" name="resposta" type="text" class="form-control"><?= $faq->resposta; ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="bt1" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" name="editar" value="<?= $faq->id; ?>" class="bt1">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!----------------------------------------------------------------------->
    </article>
<?php $i++;
endforeach; ?>