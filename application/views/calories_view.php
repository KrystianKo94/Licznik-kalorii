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
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Wyloguj</a></li>
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
                            <div class="alert alert-success" id="caloriesVal">
                                <strong>Ilość kalorii: </strong><?php echo $calories ?>
                            </div>
                            <div class="alert alert-info" id="caloriesEatenVal">
                                <strong>Wykorzystane kalorie: </strong><?php echo $caloriesEaten ?> 
                            </div>
                            <div class="alert bg-pink" id="blianceVal">
                                <strong>Bilans kaloryczny: </strong><?php echo $bliance ?>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                         <div class="body">
                         <h2>Wprowadź kalorie, które spożyłeś</h2>
                     	</div>
                     	<div class="body">
                            <form id="formCalories" method="POST">
                                <div class="input-group">
                                    <div class="form-line">
                            			<input type="text" class="form-control" name="calories_add" id="calories_add" placeholder="Wprowadź ilość kalorii" required  ">
                        			</div>
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
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="plugins/node-waves/waves.js"></script>
    <script src="plugins/jquery-validation/jquery.validate.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/pages/validation/calculateCalories.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="plugins/node-waves/waves.js"></script>
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
     <script>
        $(function () {
    $('#formCalories').validate({
        rules: {
            calories_add: {
                required: true,
                regex: /^[1-9]{1}[0-9]{0,3}$/
            }
            
        },
        messages: {
            calories_add: {
                required: "Wprowadź spożyte kalorie",
                regex: 'Wprowadź poprawnie spożyte kalorie'
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
                url: 'add_calories', 
                type: 'POST', 
                dataType: 'html', 
                data: $(form).serialize(), 
                success: function(data) {
                    parser = new DOMParser();
                    xmlDoc = parser.parseFromString(data,"text/xml");  
                    type=xmlDoc.getElementsByTagName("type")[0].childNodes[0].nodeValue;
                    text=xmlDoc.getElementsByTagName("text")[0].childNodes[0].nodeValue;
                    if(type!='error'){
                        calories=xmlDoc.getElementsByTagName("calories")[0].childNodes[0].nodeValue;
                        calories_eaten=xmlDoc.getElementsByTagName("caloriesEaten")[0].childNodes[0].nodeValue;
                        bilance=xmlDoc.getElementsByTagName("bilance")[0].childNodes[0].nodeValue;
                        $("#caloriesVal").empty();  
                        $("#caloriesEatenVal").empty();
                        $("#blianceVal").empty();
                        $("#caloriesVal").html("<strong>Ilość kalorii: </strong>"+calories).fadeIn();
                        $("#caloriesEatenVal").html("<strong>Wykorzystane kalorie: </strong>"+ calories_eaten).fadeIn();
                        $("#blianceVal").html(" <strong>Bilans kaloryczny: </strong>"+ bilance).fadeIn();
                    }
                    showMessage(text,type);
                    
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }


    });
});

function showMessage(message,type) {
    swal("Dodawanie kalorii", message, type);
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
