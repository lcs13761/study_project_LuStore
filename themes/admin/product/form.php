<?php $v->layout("admin/template/layout");
$errors = errors();
?>

<section class="content">
    <div class="container-lg">
        <div class="card mb-3 p-3">
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
                              action="<?= url('product.update',['id' => $product->id]) ?>">
                            <input type="hidden" name="_method" value="PUT"/>
                            <?php else: ?>
                            <form role="form" id="form_cliente" method="POST"
                                  action="/admin/product/store" enctype="multipart/form-data">
                                <?php endif; ?>
                                <?= csrf_field(); ?>
                                <div class="row ">
                                    <div class="col-4">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input"
                                                   id="imageUpload">
                                            <label class="btn btn-secondary" for="imageUpload"
                                                   data-browse="Imagem">Imagem</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 my-3">
                                            <div style="max-height:230px;max-width:250px;"  class="card card-img">
                                                <img  style="max-height:230px;max-width:250px;" id = 'photo' src="<?= $product->image ?? '' ?>">
                                            </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group  form-float input-group">
                                            <label class="col-form-label">Produto<i>*</i></label>
                                            <div class="form-line">
                                                <input name="product" type="text" class="form-control  border-0"
                                                       value="<?= $product->product ?? '' ?>"/>
                                            </div>
                                            <?php if (isset($errors->product)): ?>
                                                <div class="col-sm-12 p-0">
                                                     <span class="invalid-feedback d-block col-blue">
                                                         <strong><?= $errors->product[0]; ?></strong>
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
                                                <input name="description" type="text" class="form-control  border-0"
                                                       value="<?= $product->description ?? '' ?>">
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
                                    <div class="col-sm-3">
                                        <div class="form-group form-float input-group">
                                            <label class="col-form-label">Valor do Produto<i>*</i></label>
                                            <div class="form-line">
                                                <input id="currency" name="value" type="text"
                                                       class="form-control  border-0"
                                                       value="<?= isset($product->value) ? money($product->value) : '' ?>"
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
                                    <div class="col-sm-3">
                                        <div class="form-group form-float input-group">
                                            <label class="col-form-label"><i>Quantidade*</i></label>
                                            <div class="form-line">
                                                <input autocomplete="off" name="qts" type="text"
                                                       class="form-control  border-0"
                                                       value="<?= $product->qts ?? '' ?>"
                                                       required>
                                            </div>
                                            <?php if (isset($errors->qts)): ?>
                                                <div class="col-sm-12 p-0">
                                                     <span class="invalid-feedback d-block col-blue">
                                                         <strong><?= $errors->qts[0]; ?></strong>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-float input-group">
                                            <label class="col-form-label"><i>Tamanho*</i></label>
                                            <div class="form-line">
                                                <input autocomplete="off" name="size" type="text"
                                                       class="form-control border-0"
                                                       value="<?= $product->size ?? '' ?>" required>
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
                                    <div class="col-sm-3">
                                        <div class="form-group form-float input-group form-line">
                                            <label class="col-form-label"><i>Categoria*</i></label>
                                            <select data-placement="......"
                                                    class=" form-control border-0 form-select filter-option"
                                                    name="category_id">
                                                <option value="">Nada selecionado</option>
                                                <?php foreach ($categories as $category): ?>
                                                    <option <?= isset($product) && $category->id == $product->category_id ? 'selected' : ''; ?>
                                                            value="<?= $category->id ?>"><?= $category->category ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if (isset($errors->category_id)): ?>
                                                <div class="col-sm-12 p-0">
                                                     <span class="invalid-feedback d-block col-blue">
                                                         <strong><?= $errors->category_id[0]; ?></strong>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary waves-effect">Salvar</button>
                                    <a href="<?= url('product.index') ?>" type="button"
                                       class="btn bg-grey waves-effect">Cancelar</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $v->start("scripts"); ?>


<scrit src="<?= theme('assets/jquery-maskMoney/dist/jquery.maskMoney.js',CONF_VIEW_ADMIN) ?>"></scrit>
<script>

    $('#currency').maskMoney('mask');

   $('#imageUpload').change(function (e){
       var image =  $('#imageUpload');
       if(image.length <= 0){
            return;
       }
       let file = image[0].files[0]
       console.log(file);
        let reader = new FileReader();
       reader.onload = ()=>{
           $('#photo').attr('src',reader.result);
       }
       reader.readAsDataURL(file);

    });


</script>

<?php $v->end(); ?>
