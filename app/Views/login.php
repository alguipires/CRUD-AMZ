<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<div id="content-form-login">
    <div class="form-login-inputs">
        <form class="" method="post" action="<?php echo url_to('login.store') ?>">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input class="form-control" type="text" id="email" name="email" value="" />
                <label class="form-label" for="email">Email</label>
                <span class="text text-danger"><?php echo session()->getFlashdata('errors')['email'] ?? '' ?></span>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input class="form-control" type="password" id="password" name="password" value="" />
                <label class="form-label" for="password">Senha</label>
                <span class="text text-danger"><?php echo session()->getFlashdata('errors')['password'] ?? '' ?></span>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn btn-outline-dark">Logar</button>

        </form>
    </div>
</div>
<?= $this->endSection() ?>