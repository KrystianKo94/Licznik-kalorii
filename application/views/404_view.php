<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Aplikacja Webowa</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url(); ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>plugins/node-waves/waves.css" rel="stylesheet" />

    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
</head>

<body class="four-zero-four">
    <div class="four-zero-four-container">
        <div class="error-code">404</div>
        <div class="error-message">Ta strona nie istnieje</div>
        <div class="button-place">
            <a href="<?php echo base_url(); ?>" class="btn btn-default btn-lg waves-effect">Wróć do strony głównej</a>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>plugins/node-waves/waves.js"></script>
</body>

</html>