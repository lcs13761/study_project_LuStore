<?php $v->layout("admin/template/layout"); ?>
<?= $v->insert('admin/includes/dialog-remove'); ?>

<section>
    <div class='container'>
        <div class="text-right">
            <a class='btn btn-primary' href="<?= url('user.create') ?>">
                <i class="fa fa-plus"></i>
                Novo Administrado
            </a>
        </div>
        <div class='row my-4'>
            <?php if ($users): ?>
                <?php $i = 0; foreach ($users as $user): ?>
                    <div class='col-sm-6 col-lg-4 col-xl-3 my-1 remove<?= $i; ?>'>
                        <div class=' card-deck'>
                            <div class="card mb-2">
                                <img style='height:200px;' class="card-img-top img-fluid" src="<?= $user->photo ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $user->name ?></h5>
                                    <p class="card-text"><?= $user->email ?></p>
                                    <div class="text-center">
                                        <a href="<?= url('user.edit',['id' => $user->id]) ?>" class="btn btn-success waves-effect" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar">                                            <i class="fas fa-pen px-2 py-1"></i>
                                        </a>
                                        <a onclick="remove('.remove<?= $i; ?>','<?= url('user.destroy',['id' => $user->id]) ?>','div')" class="btn btn-danger waves-effect" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Excluir">
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