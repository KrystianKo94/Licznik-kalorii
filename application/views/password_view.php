<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Aplikacja webowa</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Proszę czekać ...</p>
        </div>
    </div>
    <div class="overlay"></div>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="#">Aplikacja webowa obliczanie kalorii</a>
            </div>
        </div>
    </nav>
    <section>
        <aside id="leftsidebar" class="sidebar">
            <div class="user-info">
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Panel klienta</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="logout"><i class="material-icons">input</i>Wyloguj</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="menu">
                <ul class="list">
                    <li class="header">Menu nawigacyjne</li>
                    <li>
                        <a href="<?php echo base_url(); ?>main">
                            <i class="material-icons">home</i>
                            <span>Menu główne</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>bmi">
                            <i class="material-icons">add</i>
                            <span id="spanV">Oblicz BMI <?php echo ($_SESSION['message']);?> </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>calories">
                            <i class="material-icons">kitchen</i>
                            <span>Dodaj spożyte kalorie</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>chart">
                            <i class="material-icons">show_chart</i>
                            <span>Wykres kalorii</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>password">
                            <i class="material-icons">edit</i>
                            <span>Zmień hasło</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="legal">
                <div class="copyright">
                    &copy; 2018-2019 <a href="javascript:void(0);">Krystian Kosior</a>
                </div>
                <div class="version">
                    <b>Wersja: </b> 1.0.5
                </div>
            </div>
        </aside>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                         <div class="body">
                         <h2> Zmień hasło</h2>
                     	</div>
                     	<div class="body">
                            <form id="change_password" >
                                <div class="input-group">
                                    <div class="form-line">
                            			<input type="password" class="form-control" name="password" id="password" placeholder="Wprowadź nowe hasło" required  ">
                        			</div>
                    			</div>
                               
                                
                                <button class="btn btn-primary waves-effect" type="submit" id="sub" >Zmień hasło</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>plugins/node-waves/waves.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-validation/jquery.validate.js"></script>
    <script src="<?php echo base_url(); ?>js/admin.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="<?php echo base_url(); ?>plugins/node-waves/waves.js"></script>
    <script src="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.min.js"></script>
        <script >
    $(function () {
    $('#change_password').validate({
        rules: {

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
                url: "change_password", 
                type: 'POST', 
                data: $(form).serialize(),
                dataType: 'html',
                success: function(data) {
                    show_message();
                    $(form).trigger('reset');
                    
                },
                error: function(exception) {
                    console.log(exception);
                    
                }
            });
         }
    });
});

    function show_message() {
    swal("Zmiana hasła", "Twoje hasło zostało poprawnie zmienione", "success");
}
</script>
    
</body>

</html>
