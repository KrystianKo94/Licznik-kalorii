<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Aplikacja webowa</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/themes/all-themes.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.css" rel="stylesheet" />
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 card">
                     <div class="header">
                            <h2>
                                Podstawowe informacje :
                            </h2>
                            
                        </div>
                    <br>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">person</i>
                        </div>
                        <div class="content">
                            <div class="text">Wiek</div>
                            <div class="number"><?php echo $age?></div>
                        </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">person</i>
                        </div>
                        <div class="content">
                            <div class="text">Waga</div>
                            <div class="number"><?php echo $weight?></div>
                        </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">person</i>
                        </div>
                        <div class="content">
                            <div class="text">Wzrost</div>
                            <div class="number"><?php echo $height?></div>
                        </div>
                        </div>
                    </div>
                 
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">person</i>
                        </div>
                        <div class="content">
                            <div class="text">Zap. kaloryczne</div>
                            <div class="number"><?php echo $calories?></div>
                        </div>
                        </div>
                    </div>
            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 card">
                     <div class="header">
                            <h2>
                                Wskaźnik BMI:
                            </h2>
                            
                        </div>
                    <br>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box-3 <?php echo $color?> hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">person</i>
                        </div>
                        <div class="content">
                            <div class="text">BMI</div>
                            <div class="number"><?php echo $bmi?></div>
                        </div>
                        </div>
                    </div>
                     
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 card">
                     <div class="header">
                            <h2>
                                Legenda:
                            </h2>
                            
                        </div>
                    <br>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-lime hover-zoom-effect">
                        
                        <div class="content">
                            <div class="text">Wygłodzenie</div>
                            
                        </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-red hover-zoom-effect">
                        
                        <div class="content">
                            <div class="text">Wychudzenie</div>
                            
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-pink hover-zoom-effect">
                        
                        <div class="content">
                            <div class="text">Niedowaga</div>
                            
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-blue hover-zoom-effect">
                        
                        <div class="content">
                            <div class="text">Prawidłowa</div>
                            
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-orange hover-zoom-effect">
                        
                        <div class="content">
                            <div class="text">Nadwaga</div>
                            
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-teal hover-zoom-effect">
                        
                        <div class="content">
                            <div class="text">I stopień otyłości</div>
                            
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-purple hover-zoom-effect">
                        
                        <div class="content">
                            <div class="text">II stopień otyłości</div>
                            
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-green hover-zoom-effect">
                        
                        <div class="content">
                            <div class="text">Otyłość skrajna</div>
                            
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
    <script src="<?php echo base_url(); ?>js/admin.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="<?php echo base_url(); ?>plugins/node-waves/waves.js"></script>
    <script src="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.min.js"></script>
 
</body>

</html>
