<?php $v->layout("web/template/layout"); ?>

<article class="optin_page">
    <div class="container">
        <div class="mw-100 m-auto text-center mb-5" style="width: 600px;">
            <img class="mw-100 mt-5" style="width:400px" alt="<?= $data->title; ?>" title="<?= $data->title; ?>" src="<?= $data->image; ?>" />
            <h1><?= $data->title; ?></h1>
            <p class="mx-3"><?= $data->desc; ?></p>
            <?php if (!empty($data->link)) : ?>
                <a class="d-inline-block btn bg-primary radius" href="<?= $data->link; ?>" title="<?= $data->linkTitle; ?>"><?= $data->linkTitle; ?></a>
            <?php endif; ?>
        </div>
    </div>
</article>

<?php if (!empty($track)) : ?>
    <?php $v->start("scripts"); ?>
    <script>
        fbq('track', '<?= $track->fb; ?>');
        gtag('event', 'conversion', {
            'send_to': '<?= $track->aw; ?>'
        });
    </script>
    <?php $v->end(); ?>
<?php endif; ?>