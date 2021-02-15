<?php $v->layout("_theme"); ?>


<section class="container  mt-5 pt-sm-3">
    <div class="">
        <header class="text-center ">
            <h1 class="mt-5">É simples, fácil e Informativo!</h1>
            <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus placerat tincidunt condimentum. Proin convallis eros vel enim tincidunt, nec ultrices quam molestie.
                Nam cursus diam et ante tincidunt maximus. Ut dapibus et nisl venenatis accumsan. .</p>
        </header>
</section>
<!--FEATURES-->
<section class="faq pt-5 pb-5 mb-lg-5">
    <div class="container">
        <header class="text-center mb-md-5">
            <h3 class="mb-md-4">Perguntas frequentes:</h3>
            <p>Confira as principais dúvidas e repostas.</p>
        </header>
        <?php if (!empty($about)) : ?>
            <div class="d-lg-flex flex-wrap align-itesstart justify-content-center">
                <?php foreach ($about as $faq) : ?>
                    <article class="faq0 bg-blu j_collapse">
                        <h4 class="j_collapse_icon bi-caret-right-fill"><?= $faq->perguntas; ?></h4>
                        <div class="j_collapse_box collapse">
                            <p><?= $faq->resposta; ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="text-center mb-sm-2">
                <div class=" pt-3 mt-sm-5">
                    <h3 class="h2 fw-bold">Ooops, não temos conteúdo aqui :/</h3>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php $v->start("scripts"); ?>
<script src="<?= theme2("node_modules/jquery/dist/jquery.js"); ?>"></script>
<?php $v->end(); ?>