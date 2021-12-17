<?php $v->layout("admin/template/layout"); ?>
<?= $v->insert('admin/includes/dialog-remove'); ?>

<section>
    <div class='container'>
        <div class="text-right">
            <a class='btn btn-primary' href="/admin/product/create">
                <i class="fa fa-plus"></i>
                Novo Produto
            </a>
        </div>
        <div class='row my-4'>
            <?php if ($products): ?>
                <?php $i = 0; foreach ($products as $product): ?>
                    <div class='col-sm-6 col-lg-4 col-xl-3 my-1 remove<?= $i; ?>'>
                        <div class=' card-deck'>
                            <div class="card mb-2">
                                <img style='height:200px;' class="card-img-top img-fluid" src="<?= $product->image ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $product->product ?></h5>
                                    <p class="card-text"><?= $product->description ?></p>
                                    <p class="card-text">R$ <?= money($product->value) ?></p>
                                    <div class="text-center">
                                        <a href="<?= url('product.edit',['id' => $product->id]) ?>" class="btn btn-success waves-effect" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar">                                            <i class="fas fa-pen px-2 py-1"></i>
                                        </a>
                                        <a onclick="remove('.remove<?= $i; ?>','<?= url('product.destroy',['id' => $product->id]) ?>','div')" class="btn btn-danger waves-effect" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Excluir">
                                            <i class="fas fa-trash px-2 py-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $i++; endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>