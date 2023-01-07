<?php
use WiseChain\core\Application;
use WiseChain\core\Model;
/** @var Model $model */
?>
<div class="container col-xl-12 col-xxl-12 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3"><?php echo Application::$app->language->dictionary['Lang_WTBC']; ?></h1>
        <!--    <p class=" fs-5 text-center"><?php echo Application::$app->language->dictionary['Lang_PHIAM']; ?></p>-->
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form action="" method="POST" class="p-4 p-md-5 border rounded-3 bg-light">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="Username"><i class="bi bi-person text-primary"></i></span>
                    <input name="Username" type="text" value="<?php echo $model->Username; ?>" class="form-control <?php echo $model->hasError('Username') ? 'is-invalid' : ''; ?>" placeholder="<?php echo Application::$app->language->dictionary['Lang_User']; ?>" aria-label="Username" aria-describedby="Username">
                    <div class="invalid-feedback text-start">
                        <?php echo $model->getFirstError('Username'); ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="Password"><i class="bi bi-key text-danger"></i></span>
                    <input name="Password" type="password" class="form-control <?php echo $model->hasError('Password') ? 'is-invalid' : ''; ?>" placeholder="<?php echo Application::$app->language->dictionary['Lang_Pass']; ?>" aria-label="Password" aria-describedby="Password">
                    <div class="invalid-feedback text-start">
                        <?php echo $model->getFirstError('Password'); ?>
                    </div>
                </div>
                <button type="submit" class="w-100 btn btn-primary"><i class="bi bi-door-open"></i> <?php echo Application::$app->language->dictionary['Lang_Login']; ?></button>
            </form>
        </div>
    </div>
</div>