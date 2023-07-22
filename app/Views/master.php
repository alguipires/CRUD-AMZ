<!DOCTYPE html>
<html lang="PT-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/custom/css/custom.css') ?>">
</head>

<body>
    <?= $this->include('partials/header') ?>
    <main>
        <?= $this->renderSection('content') ?>
    </main>
    <?= $this->include('partials/footer') ?>
</body>

</html>