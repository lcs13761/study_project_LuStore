<?php $v->layout("web/template/layout"); ?>


<?php if (!empty($products)) : ?>
  <section>
    <div class="container">
      <div class="py-5">
        <div class="row clearfix">
          <div class="col-sm-2 pr-1">
            <div>

            </div>
          </div>
          <div class="col-sm-10 px-2">
            <div class="row">
              <?php foreach ($products as $product) : ?>
                <div class='col-2 col-sm-5 col-lg-3 col-xl-3 col-md-4 my-1'>
                  <a class="text-decoration-none text-black" href='<?= url('product.index.web',['id'=> $product->id,"product" => $product->name]) ?>'>
                    <div class='card-deck'>
                      <div class="card mb-2">
                        <img style='height:200px;' class="card-img-top img-fluid" src="<?= $product->image ??  "https://via.placeholder.com/200x200" ?>" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title"><?= $product->name ?></h5>
                          <p class="card-text"><?= $product->description ?></p>
                          <p class="card-text">R$ <?= money($product->value) ?></p>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              <?php endforeach; ?>
            </div>
            <?= $paginator; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php else : ?>
<section class="container">
  <div class="text-center py-5 my-5">
      <h5>  Nenhum produto encontrado</h5>
  </div>
</section>
<?php endif; ?>