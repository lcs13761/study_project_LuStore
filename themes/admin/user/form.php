<?php use Source\Models\Auth;

$v->layout("admin/template/layout");
$errors = errors();
?>

<section class="content">
    <div class="container-lg">
        <div class="card mb-3 p-3">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header">
                        <h2>
                            <b></b>
                            <small>Preencha as Informações abaixo:</small>
                        </h2>
                        <br>
                        <?php if (isset($user)): ?>
                        <form role="form" id="form_cliente" method="POST"
                              action="<?= url('user.update', ['id' => $user->id]) ?>">
                            <input type="hidden" name="_method" value="PUT"/>
                            <?php else: ?>
                            <form role="form" id="form_cliente" method="POST"
                                  action="<?= url('user.store') ?>" enctype="multipart/form-data">
                                <?php endif; ?>
                                <?= csrf_field(); ?>
                                <div class="row clearfix">
                                    <div class="col-4">
                                        <div class="form-group ">
                                            <input type="file" id="imageUpload" class="d-none" name="photo">
                                            <label  class="w-100 img-profile rounded-circle " for="imageUpload">
                                                <img class ='rounded-circle' style="max-height:100px;max-width:100px;cursor:pointer;" id='photo'
                                                     src="<?= $user->photo ?? theme('assets/img/undraw_profile.svg', CONF_VIEW_ADMIN) ?>">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group  form-float input-group">
                                            <label class="col-form-label">Nome<i>*</i></label>
                                            <div class="form-line">
                                                <input name="name" type="text" class="form-control  border-0"
                                                       value="<?= $user->name ?? '' ?>"/>
                                            </div>
                                            <?php if (isset($errors->name)): ?>
                                                <div class="col-sm-12 p-0">
                                                     <span class="invalid-feedback d-block col-blue">
                                                         <strong><?= $errors->name[0]; ?></strong>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float input-group">
                                            <label class="col-form-label">E-mail<i>*</i></label>
                                            <div class="form-line">
                                                <input name="email" type="text" class="form-control  border-0"
                                                       value="<?= $user->email ?? '' ?>">
                                            </div>
                                            <?php if (isset($errors->email)): ?>
                                                <div class="col-sm-12 p-0">
                                                     <span class="invalid-feedback d-block col-blue">
                                                         <strong><?= $errors->email[0]; ?></strong>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if (!isset($user) || (Auth::auth()->id === $user->id)): ?>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <h4><b> Segurança da conta </b></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (isset($user) && (Auth::auth()->id === $user->id)): ?>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group  form-float input-group">
                                                    <label class="col-form-label">Senha Atual<i>*</i></label>
                                                    <div class="form-line">
                                                        <input name="current_password" type="password" class="form-control  border-0"/>
                                                    </div>
                                                    <?php if (isset($errors->current_password)): ?>
                                                        <div class="col-sm-12 p-0">
                                                     <span class="invalid-feedback d-block col-blue">
                                                         <strong><?= $errors->current_password[0]; ?></strong>
                                                    </span>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group  form-float input-group">
                                                <label class="col-form-label">Senha<i>*</i></label>
                                                <div class="form-line">
                                                    <input name="password" type="password" class="form-control  border-0"/>
                                                </div>
                                                <?php if (isset($errors->password)): ?>
                                                    <div class="col-sm-12 p-0">
                                                     <span class="invalid-feedback d-block col-blue">
                                                         <strong><?= $errors->password[0]; ?></strong>
                                                    </span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float input-group">
                                                <label class="col-form-label">Confirmar Senha<i>*</i></label>
                                                <div class="form-line">
                                                    <input name="password_confirmation" type="password"
                                                           class="form-control  border-0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary waves-effect">Salvar</button>
                                    <a href="<?= url('user.index') ?>" type="button"
                                       class="btn bg-grey waves-effect">Cancelar</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $v->start("scripts"); ?>


<!--<scrit src="--><? //= theme('assets/jquery-maskMoney/dist/jquery.maskMoney.js',CONF_VIEW_ADMIN) ?><!--"></scrit>-->
<script>

    // $('#currency').maskMoney('mask');

    $('#imageUpload').change(function (e) {
        var image = $('#imageUpload');
        if (image.length <= 0) {
            return;
        }
        let file = image[0].files[0]
        console.log(file);
        let reader = new FileReader();
        reader.onload = () => {
            $('#photo').attr('src', reader.result);
        }
        reader.readAsDataURL(file);

    });


</script>

<?php $v->end(); ?>
