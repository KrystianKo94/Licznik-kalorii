<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Panel logowania</a>
            <small>Wprowadź login i hasło aby się zalogować</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="loginForm" method="POST" action="validation">
                    <div class="msg">Zaloguj się i rozpocznij sesję</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="login" placeholder="Login" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Hasło" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Zaloguj</button>
                        </div>
                    </div>
                    <div class="row">
                        <?php echo $error ?>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?php echo base_url(); ?>register">Zarejestruj się!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <!-- <a href=""></a> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>plugins/node-waves/waves.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-validation/jquery.validate.js"></script>
    <script src="<?php echo base_url(); ?>js/pages/validation/login.js"></script>
</body>

</html>