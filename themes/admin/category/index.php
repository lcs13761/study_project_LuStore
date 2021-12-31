<?php $v->layout("admin/template/layout"); ?>

<?php $v->start("styles"); ?>

<!-- JQuery DataTable Css -->
<link href="<?= theme('assets/datatables/dataTables.bootstrap4.css',CONF_VIEW_ADMIN) ?>" rel="stylesheet">
<style>
    .dtflex{
        display: flex !important;
        justify-content: space-between !important;
    }

    .btn-center a{
        margin: 0px 1px;
    }
    .btn-add  li  a {
        margin-top: -10px;
        margin-right: 20px;
    }

    .th-action{
        position: static !important;
        padding: 0px 0px 10px 0px !important;
    }



</style>

<?php $v->end(); ?>

<?= $v->insert('admin/includes/dialog-remove'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 header row">
            <h2 class="col-md-6"><b>Categorias</b></h2>
            <ul class="col-md-6 text-md-right list-inline">
                <li>
                    <a class='btn btn-primary' href="<?= url('/admin/category/create'); ?>">
                        <i class="fa fa-plus"></i>
                        Nova Categoria
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover jsDataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Categoria</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($categories):?>
                        <?php
                        $i = 0;
                        foreach($categories as $category):?>
                            <tr>
                                <td><?= $i+1; ?></td>
                                <td><?= $category->name ?></td>
                                <td>  <div class="text-center btn-center">
                                        <a href="<?= url('category.edit',['id'=> $category->id]) ?>" class="btn btn-success waves-effect" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar">
                                            <i class="fas fa-pen px-2 py-1"></i>
                                        </a>
                                        <a onclick="remove(this,'<?= url('category.destroy',['id'=> $category->id]) ?>')" class="btn btn-danger waves-effect" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Excluir">
                                            <i class="fas fa-trash px-2 py-1"></i>
                                        </a>
                                    </div></td>
                            </tr>
                        <?php $i++;  endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<?php $v->start("scripts"); ?>


<!-- Page level plugins -->
<script src="<?= theme('assets/datatables/jquery.dataTables.js', CONF_VIEW_ADMIN) ?>"></script>
<script src="<?= theme('assets/datatables/dataTables.bootstrap4.js', CONF_VIEW_ADMIN) ?>"></script>


<!-- Page level custom scripts -->
<script src="<?= theme('assets/js/demo/datatables-demo.js', CONF_VIEW_ADMIN) ?>"></script>


<?php $v->end(); ?>


