<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<div class="content-form">
    <div class="form">
        <form class="" method="post" action="<?php echo url_to('login.store') ?>">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="email" class="form-control" />
                <label class="form-label" for="email">Email</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="password" class="form-control" />
                <label class="form-label" for="password">Senha</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Logar</button>


        </form>
    </div>
</div>
<!-- <div class="text-center h-100 d-inline-block w-100 p-3">
    <div class="row">
        <div class="col-12">

        </div>
    </div>
</div> -->
<?= $this->endSection() ?>