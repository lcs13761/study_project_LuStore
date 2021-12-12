<?php $v->layout("web/template/layout"); ?>

<section class="my-5 d-flex justify-content-center align-items-center">
  <div style="max-width: 360px; width: 360px;" class="card mx-1 bg-dark shadow-lg p-4 me-sm-1 ">
    <h3 class="h3 text-light mt-1 mb-4 text-center">Create</h3>
    <?= errors_validation() ?>
    <form name="login" class="d-flex flex-column" method="POST" action="<?= url("/user/store"); ?>">

        <?= csrf_field(); ?>
      <label>
        <span class="text-light">Nome:</span>
        <input type="text" autocomplete="autocomplete" class="form-control py-3 w-100" value="<?= ($cookie ?? null); ?>" name="name" required />
      </label>
      <label class=" mt-2">
        <span class="text-light">E-mail:</span>
        <input type="email" autocomplete="email" class="form-control py-3 w-100" value="<?= ($cookie ?? null); ?>" name="email" required />
      </label>
      <label class="mb-2 mt-2 ">
        <span class="text-light">Senha:</span>
        <input type="password" autocomplete="current-password" class="form-control py-3 w-100" name="password" required />
      </label>
      <button class="btn btn-primary mt-2">Create</button>
    </form>
    <p class="text-light pt-3">Possui uma conta? <a href="<?= url("login") ?>">Entrar</a></p>
  </div>
</section>