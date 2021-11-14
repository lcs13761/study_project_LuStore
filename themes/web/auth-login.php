<?php $v->layout("web/template/layout"); ?>

<section class="d-flex justify-content-center mt-5 align-items-center">
  <div style="max-width: 360px; width: 360px;" class="card mx-1 bg-dark shadow-lg px-4 pt-4">
    <h3 class="h3 text-light mt-1 mb-4 text-center">Login</h3>
    <?= errors_validation() ?>
    <form name="login" class="d-flex flex-column" method="POST" action="<?= url("/login"); ?>">
      <?= csrf_field(); ?>
      <label>
        <span class="text-light">Email:</span>
        <input type="text" autocomplete="email" class="form-control py-3 w-100" value="<?= ($cookie ?? null); ?>" name="email" required />
      </label>
      <label class="mb-2 mt-2 ">
        <div class="d-flex justify-content-between">
          <span class="text-light">Senha:</span>
          <span class="text-light">Esqueceu a senha?</span>
        </div>
        <input type="password" autocomplete="current-password" class="form-control py-3 w-100" name="password" required />
      </label>
      <label class="mb-2">
        <input type="checkbox">
        <span class="text-light">Lembre me?</span>
      </label>
      <button class="btn btn-primary ">Sign in</button>
    </form>
    <p class="text-light pt-3">Não Possui uma conta? <a href="<?= url("user/create") ?>">Criar conta</a></p>
  </div>
</section>