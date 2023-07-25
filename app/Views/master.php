<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/custom/css/custom.css') ?>">

</head>

<body>
    <div class="container-fluid">
        <?= $this->include('partials/header') ?>
        <main id="main-content">
            <?php if (session()->has('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif ?>
            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo session()->getFlashdata('success'); ?>
                </div>
            <?php endif ?>
            <?= $this->renderSection('content') ?>
        </main>
        <?= $this->include('partials/footer') ?>
    </div>

    <!-- JS -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/custom/js/custom.js'); ?>"></script>

</body>

</html>