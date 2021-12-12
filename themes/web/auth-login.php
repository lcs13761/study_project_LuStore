<?php $v->layout("web/template/layout"); ?>


<?php $v->start("styles"); ?>
   <link href="<?=theme('assets/fontawesome-free/css/all.min.css', CONF_VIEW_ADMIN) ?>" rel="stylesheet" type="text/css">
   <!-- Custom styles for this template-->
    <link href="<?= theme('assets/css/sb-admin-2.css', CONF_VIEW_ADMIN)  ?>" rel="stylesheet">
<?php $v->end(); ?>
<section>
<div class="container">
<!-- Outer Row -->
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Bem vindo de volta!</h1>
                            </div>
                            <?= errors_validation() ?>
                            <form class="user" method="post" action = 'login'>
                            <?= csrf_field(); ?>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user"
                                        id="exampleInputEmail" required aria-describedby="emailHelp"
                                        placeholder="Insira o endereço de e-mail...">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Senha" required>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Lembrar-me?</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                                <hr>
                                <a href="/login/google" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Login with Google
                                </a>
                                <a href="#" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Esqueceu sua senha?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="/user/create">Crie a sua conta aqui!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>