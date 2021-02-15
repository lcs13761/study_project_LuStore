<?php $v->layout("_theme"); ?>

<article class="text-center mt-5">
    <div >
        <header class="mw-100 not">
            <p class="mb-3 fw-light err">&bull;<?= $error->code; ?>&bull;</p>
            <h1><?= $error->title; ?></h1>
            <p class = "fw-light h6 mt-1"><?= $error->message; ?></p>

            <?php if ($error->link): ?>
                <a class="text-decoration-none fw-bold text-white bt mb-lg-5"
                   title="<?= $error->linkTitle; ?>" href="<?= $error->link; ?>"><?= $error->linkTitle; ?></a>
            <?php endif; ?>
        </header>
    </div>
</article>