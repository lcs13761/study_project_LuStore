<?php $v->layout("web/template/layout"); ?>


<?php $v->insert("web/template/menu"); ?>
<!-- Slider Area -->
<section class="hero-slider">
  <!-- Single Slider -->
  <div class="single-slider">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-lg-9 offset-lg-3 col-12">
          <div class="text-inner">
            <div class="row">
              <div class="col-lg-7 col-12">
                <div class="hero-text">
                  <h1><span>ATÉ 50% OFF </span>Bolsas para Mulheres</h1>
                  <p>Maboriosam in a nesciung eget magnae <br> dapibus disting tloctio in the find it pereri <br> odiy maboriosm.</p>
                  <div class="button">
                    <a href="#" class="btn">Compre agora!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ End Single Slider -->
</section>

<section class="small-banner pb-3 section">
  <div class="container-fluid">
    <div class="row">
      <!-- Single Banner  -->
      <div class="col-lg-4 col-md-6 col-12">
        <div class="single-banner">
          <img style="filter: grayscale(50%);" src="/storage/image/man.png" alt="#">
          <div class="content">
            <p class = 'text-dark' >Coleção Masculina</p>
            <a href="<?= url('category.show.web', ["category" => "Roupa-Masculina"]) ?>">Descubra agora</a>
          </div>
        </div>
      </div>
      <!-- /End Single Banner  -->
      <!-- Single Banner  -->
      <div class="col-lg-4 col-md-6 col-12">
        <div class="single-banner">
          <img style = 'filter: grayscale(50%);' src="/storage/image/fem.png" alt="#">
          <div class="content">
            <p>Coleção Feminina</p>
            <a href="<?= url('category.show.web', ["category" => "Roupa-Feminina"]) ?>">Descubra agora</a>
          </div>
        </div>
      </div>
      <!-- /End Single Banner  -->
      <!-- Single Banner  -->
      <div class="col-lg-4 col-12">
        <div class="single-banner tab-height">
          <img style = 'filter: grayscale(50%);'  src="/storage/image/bolsa.png" alt="#">
          <div class="content">
            <p>Coleção de Bolsas</p>
            <a href="#">Descubra agora</a>
          </div>
        </div>
      </div>
      <!-- /End Single Banner  -->
    </div>
  </div>
</section>
<!-- End Small Banner -->

