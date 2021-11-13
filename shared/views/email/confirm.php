<?php $v->layout("layout", ["title" => "Confirme e ative sua conta"]); ?>

<h3 style="color: #fff;">Ola <?= $name; ?>!</h3>
<p>Por favor clique no link abaixo para verificar seu e-mail.</p>
<div><p style="text-align: center;"><a title='<?= $button ?>' target='_blank' class = "button button-blue" href='<?= $confirm_link; ?>'><?= $button ?></a></p></div>
<p>Se você não criou uma conta, nenhuma ação é requerida!</p>
