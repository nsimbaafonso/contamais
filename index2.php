<?php
require_once "config/app.php";
require_once "config/errors.php";
//throw new Exception('Erro de teste');
?>

<!DOCTYPE html>
<html lang="pt-AO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css?<?= filemtime('assets/css/bootstrap.min.css') ?>">
    <link type="text/css" rel="stylesheet" href="assets/css/style.css?<?= time() ?>">
</head>

<body>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js?<?= time() ?>"></script>
</body>

</html>