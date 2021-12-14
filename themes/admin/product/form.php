<?php $v->layout("admin/template/layout");
$errors = errors();
?>

<section class="content">
    <div class="container-lg">
        <div class="card p-3">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header">
                        <h2>
                            <b></b>
                            <small>Preencha as Informações abaixo:</small>
                        </h2>
                        <br>
                        <?php if (isset($product)): ?>
                        <form role="form" id="form_cliente" method="POST"
                              action="">
                            <input type="hidden" name="_method" value="PUT"/>
                            <?php else: ?>
                            <form role="form" id="form_cliente" method="POST"
                                  action="/admin/product/store">
                                <?php endif; ?>
                                <?= csrf_field(); ?>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group  form-float input-group">
                                            <label class="col-form-label">Produto<i>*</i></label>
                                            <div class="form-line">
                                                <input name="product" type="text" class="form-control"
                                                       value="" required/>
                                            </div>
                                            <?php if (isset($errors->email)): ?>
                                                <div class="col-sm-12 p-0">
                                                     <span class="invalid-feedback d-block col-blue">
                                                         <strong><?= errors('email')[0]; ?></strong>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                            <div class="help-info">Min. 3, Max. 100 Caracteres</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float input-group">
                                            <label class="col-form-label">Descrição<i>(Opicional)</i></label>
                                            <div class="form-line">
                                                <input name="description" type="text" class="form-control"
                                                       value="" required>
                                            </div>
                                            <?php if (isset($errors->description)): ?>
                                                <div class="col-sm-12 p-0">
                                                     <span class="invalid-feedback d-block col-blue">
                                                         <strong><?= $errors->description[0]; ?></strong>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-sm-4">
                                        <div class="form-group form-float input-group">
                                            <label class="col-form-label">Valor do Produto<i>*</i></label>
                                            <div class="form-line">
                                                <input autocomplete="off"  name="value" type="text"
                                                       class="form-control"
                                                       value=""
                                                       required>
                                            </div>
                                            <?php if (isset($errors->value)): ?>
                                                <div class="col-sm-12 p-0">
                                                     <span class="invalid-feedback d-block col-blue">
                                                         <strong><?= $errors->value[0]; ?></strong>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float input-group">
                                            <label class="col-form-label"><i>Quantidade*</i></label>
                                            <div class="form-line">
                                                <input autocomplete="off"  name="qts" type="text"
                                                       class="form-control"
                                                       value=""
                                                       required>
                                            </div>
                                            <?php if (isset($errors->qts)): ?>
                                                <div class="col-sm-12 p-0">
                                                     <span class="invalid-feedback d-block col-blue">
                                                         <strong><?=$errors->qts[0]; ?></strong>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float input-group">
                                            <label class="col-form-label"><i>Tamanho*</i></label>
                                            <div class="form-line">
                                                <input autocomplete="off" name="size" type="text"
                                                       class="form-control"
                                                       value="" required>
                                            </div>
                                            <?php if (isset($errors->size)): ?>
                                                <div class="col-sm-12 p-0">
                                                     <span class="invalid-feedback d-block col-blue">
                                                         <strong><?= $errors->size[0]; ?></strong>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary waves-effect">Salvar</button>
                                    <a href="" type="button"
                                       class="btn bg-grey waves-effect">Cancelar</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

