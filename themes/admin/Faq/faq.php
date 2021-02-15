<?php $v->layout("_admin"); ?>


<section class="faq pt-5" style="background-color: aliceblue; flex-grow: 1;">
    <div class="">
        <header class="text-center mb-sm-4">
            <h3 class="mb-md-4">Perguntas frequentes:</h3>
            <p>Confira as principais dúvidas e repostas.</p>
        </header>
        <div class="d-flex flex-wrap align-itesstart justify-content-center">
            <?php if (!empty($about)) : ?>
                <?php $v->insert("Faq/Editar", ["about" => $about]); ?>
            <?php else : ?>
                <div class="text-center mb-sm-2">
                    <div class=" pt-4 mt-sm-5">
                        <h3 class="h2 fw-bold">Ooops, não temos conteúdo aqui :/</h3>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div>
        <div class="text-center" style = "padding-bottom: 30px;padding-top: 50px;">
            <button type = "button" class = "d1" style="margin-bottom: 0px;" data-bs-toggle="modal" data-bs-target="#staticBackdrop0">Adicionar</button>
            <div class="modal fade" id="staticBackdrop0" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" class="" action="<?= url("/admin/perguntas-respostas/adicionar"); ?>" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <label class="pb-sm-3" style="Color:#000;width:100%">Pergunta</label>
                                    <input name="perguntas" type="text" value="" class="form-control">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="pb-sm-3" style="Color:#000;width:100%">Resposta</label>
                                    <textarea style="resize: none; height:120px; border: 0.1px solid #cccc" name="resposta" type="text" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="bt1" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="bt1">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>