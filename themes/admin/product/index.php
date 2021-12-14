<?php $v->layout("admin/template/layout"); ?>

<div class="col-12 text-right">
    <a class='btn btn-primary' href="/admin/product/create">
        <i class="fa fa-plus"></i>
        Novo Produto
    </a>
</div>

<section>
    <div class='container'>
        <div class='row my-4'>
            <?php foreach ($products as $product): ?>
                <div class='col-sm-6 col-lg-4 col-xl-3 my-1'>
                    <div class=' card-deck'>
                        <div class="card  mb-2">
                            <img class="card-img-top img-fluid" src="//placehold.it/500x180" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>