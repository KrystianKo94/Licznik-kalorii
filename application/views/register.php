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
<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Panel rejestracyjny</a>
            <small>Proszę wypełnić następujące dane</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" >
                    <div class="msg">Dane do rejestracji</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Wprowadź imię" required autofocus ">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="surname" id="surname" placeholder="Wprowadź nazwisko" required autofocus ">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="login" id="login" placeholder="Wprowadź login" required autofocus ">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Wprowadź hasło" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirmpassword" minlength="6" placeholder="Powtórz hasło" required>
                        </div>
                    </div>
                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Zarejestruj</button>
                </form>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>plugins/node-waves/waves.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-validation/jquery.validate.js"></script>
    <script src="<?php echo base_url(); ?>js/admin.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="<?php echo base_url(); ?>plugins/node-waves/waves.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script >
    $(function () {
    $('#sign_up').validate({
        rules: {
            name: "required",
            surname: "required",
            login: "required",
            password: {
                required: true,
                minlength: 6 
            },
            confirmpassword: {
                required: true,
                minlength: 6 ,
                equalTo: '[name="password"]'
            }
        },
        messages: {
            name: "Proszę wprowadzić imię",
            surname: "Proszę wprowadzić nazwisko",
            login: "Proszę wprowadzić login",
            password: {
                required: "Wprowadź hasło",
                minlength: "Hasło musi zawierać conajmniej 6 znaków"
            },
            confirmpassword: {
                required: "Wprowadź hasło",
                minlength: "Hasło musi zawierać conajmniej 6 znaków",
                equalTo: "Podane hasła są różne"
            }
        },
        highlight: function (input) {
            console.log(input);
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
            $(element).parents('.form-group').append(error);
        },
          submitHandler: function(form, e) {
                $.ajax({
                url: "register_user", 
                type: 'POST', 
                data: $(form).serialize(),
                dataType: 'html',
                success: function(data) {
                    if(data==true){
                        swal("Poprawnie dodano użytkownika", "Za chwilę zostaniesz przekierowany na stronę logowania", "success")
                        .then((value) => {
                        setTimeout( 4000);
                        window.location ="login";
                    });
                    $(form).trigger('reset');
                    }
                    else{
                        swal("Błąd podczas rejestracji", "Proszę zmienić wprowadzony login", "error");
                    }  
                },
                error: function(exception) {
                    console.log(exception);
                    
                }
            });
         }
    });
});
</script>
</body>
</html>