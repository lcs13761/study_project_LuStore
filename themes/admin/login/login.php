<?php $v->layout("_login");?>

<form name = "login" class = "card m-5 p-3 me-sm-1  shadow-lg" style="max-width:400px;" method="POST" action = "<?= url("/admin/login");?>">

<div class="mb-3">
    <label class="col-sm-3  offset-sm-5 h5 mt-sm-3">Fazer Login</label>
    <div class="col-sm-12">
    </div>
  <div class="mb-3">
    <label for="inputEmail3" class="col-sm-3 col-form-label">Usuario</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" value = "<?= ($cookie ?? null); ?>" name="usuario"  required/>
    </div>
  </div>
  <div class=" mb-3">
    <label for="inputPassword3" class="col-sm-3 col-form-label ">Password</label>
    <div class="col-sm-12">
      <input type="password" class="form-control" name = "password"  required/>
    </div>
  </div>  
  <div class="form-check mb-sm-3">
  <input class="form-check-input" type="checkbox" <?= (!empty($cookie) ? "checked" : ""); ?> name = "salve" >
  <label >
   Salva dados?
  </label>
</div>
  <button class="btn btn-primary col-sm-12">Sign in</button>
</form>