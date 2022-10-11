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
                            <span id="spanV">Oblicz BMI <?php echo ($_SESSION['message']);?> </span>                        </a>
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
            <!-- #Menu -->
            <!-- Footer -->
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
                        <div class="header">
                            <h2>
                                Twoje dane:
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="alert alert-success" id="bmiVal">
                                <strong>BMI: </strong> <?php echo $bmi ?>
                            </div>
                            <div class="alert alert-info" id="bmrVal">
                                <strong>BMR: </strong> <?php echo $bmr ?>
                            </div>
                            <div class="alert bg-pink" id="caloriesVal">
                                <strong>Kalorie do wykorzystania: </strong><?php echo $calories ?>
                            </div>
                            <div class="alert alert-warning">
                                <strong>Wzór BMI</strong> na podstawie <a target="_blank" href="https://pl.wikipedia.org/wiki/Wska%C5%BAnik_masy_cia%C5%82a" class="alert-link" >umieszczonej w linku strony. Stan na 10-01-2018r</a>.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                         <div class="body">
                         <h2>Kalkulator BMI</h2>
                     	</div>
                     	<div class="body">
                            <form id="formBMI" method="POST">
                                <div class="input-group">
                                    <div class="form-line">
                            			<input type="text" class="form-control" name="weight" id="weight" placeholder="Wprowadź wagę" required  ">
                        			</div>
                    			</div>
                                <div class="input-group">
                                    <div class="form-line">
                            			<input type="text" class="form-control" name="height" id="height" placeholder="Wprowadź wzrost" required  ">
                        			</div>
                    			</div>
                                 <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="age" id="age" placeholder="Wprowadź wiek" >
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <input type="radio" name="gender" id="male" class="with-gap" checked value="M">
                                    <label for="male">Mężczyzna</label>

                                    <input type="radio" name="gender" id="female" class="with-gap" value="K">
                                    <label for="female" class="m-l-20">Kobieta</label>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit" id="sub" >Oblicz</button>
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

    <script>
        $(function () {
    $('#formBMI').validate({
        rules: {
            weight: {
                required: true,
                regex: /^[1-9]{1}[0-9]{0,2}[.]{1}[0-9]+|[1-9]{1}[0-9]{0,2}$/
            },
            height: {
                required: true,
                regex: /^[1-9]{1}[0-9]{0,2}$/
            },
            age: {
                required: true,
                regex: /^[1-9]{1}[0-9]{0,2}$/
            }
            
        },
        messages: {
            weight: {
                required: "Wprowadź wagę",
                regex: 'Wprowadź poprawnie wagę'
            },
            height: {
                required: "Wprowadź wzrost",
                regex: 'Wprowadź poprawnie wzrost'
            },
            age: {
                required: "Wprowadź wiek",
                regex: 'Wprowadź poprawnie wzrost'
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
          submitHandler: function(form) {
            $.ajax({
                url: 'bmi_calculate', 
                type: 'POST', 
                dataType: 'html', 
                data: $(form).serialize(), 
                success: function(data) {
                    parser = new DOMParser();  
                    xmlDoc = parser.parseFromString(data,"text/xml");  
                    bmi=xmlDoc.getElementsByTagName("bmi")[0].childNodes[0].nodeValue;
                    bmr=xmlDoc.getElementsByTagName("bmr")[0].childNodes[0].nodeValue;
                    calories=xmlDoc.getElementsByTagName("calories")[0].childNodes[0].nodeValue;  
                    $(form).trigger('reset');  
                    $("#spanV").empty();
                    $("#bmiVal").empty();
                    $("#bmrVal").empty();
                    $("#caloriesVal").empty();
                    $("#spanV").html("Oblicz BMI").fadeIn();
                    $("#bmiVal").html(" <strong>BMI: </strong>"+ bmi).fadeIn();
                    $("#bmrVal").html(" <strong>BMR: </strong>"+ bmr).fadeIn();
                    $("#caloriesVal").html("<strong>Kalorie do wykorzystania: </strong>"+ calories).fadeIn();
                    showSuccessMessage(bmi);
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }


    });
});

function showSuccessMessage(data) {
    swal("Obliczono poprawnie BMI", "Twoje bmi= "+data+" ", "success");
}

$.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        var check = false;
        return this.optional(element) || regexp.test(value);
    },
    ""
);
    </script>
</body>

</html>
