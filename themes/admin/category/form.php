<?php $v->layout("admin/template/layout");
$errors = errors();
?>


<section>
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card p-3">
                    <div class="header">
                        <small>Preencha o campo abaixo com a categoria:</small>
                    </div>
                    <br>
                    <?php if (isset($category)): ?>
                    <form role="form" id="form_cliente" method="POST"
                          action="<?= url('category.update', ['id' => $category->id]) ?>">
                        <input type="hidden" name="_method" value="PUT"/>
                        <?php else: ?>
                        <form role="form" id="form_cliente" method="POST" action="<?= url('category.store') ?>">
                         <?php endif; ?>
                            <?= csrf_field(); ?>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Categoria<i>*</i></label>
                                        <div class="form-line">
                                            <input name="name" type="text" class="form-control border-0"
                                                   value="<?= $category->name ?? "" ?>"
                                                   required/>

                                        </div>
                                        <?php if (isset($errors->name)): ?>
                                            <div class="col-sm-12 p-0">
                                                     <span class="invalid-feedback d-block col-blue">
                                                         <strong><?= $errors->name[0]; ?></strong>
                                                    </span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="button-demo">
                                <button type="submit" class="btn btn-primary waves-effect">Salvar</button>
                                <a href="<?= url('category.index') ?>" type="button"
                                   class="btn bg-grey waves-effect">Cancelar</a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>