<?php $v->layout("web/template/layout"); ?>


<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Esqueceu sua senha?</h1>
                                    <p class="mb-4">Nós entendemos, coisas acontecem. Basta inserir seu endereço de e-mail abaixo
                                        e enviaremos um link para redefinir sua senha!</p>
                                </div>
                                <form class="user" action="" method="post">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                               id="exampleInputEmail" aria-describedby="emailHelp"
                                               placeholder="Insira o endereço de e-mail...">
                                    </div>
                                    <button  class="btn btn-primary btn-user btn-block">
                                        Redefinir senha
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small text-decoration-none" href="<?= url('user.create') ?>">Crie a sua conta aqui!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small text-decoration-none" href="<?= url('login') ?>">já tem uma conta? Conecte-se!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
