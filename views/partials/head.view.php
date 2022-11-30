<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= app()->name ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo asset('/assets/plugins/bootstrap-v4.6.2/css/bootstrap.min.css') ?>">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="<?php echo asset('/assets/css/app.css') ?>">
</head>
<body>
<?php view('partials.nav') ?>
