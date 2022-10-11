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
            <p>Proszę czekać...</p>
        </div>
    </div>

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
               
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Wykers zależności czasu do spożytych kalorii</h2>
                        </div>
                        <div class="body">
                            <canvas id="line_chart" height="100"></canvas>
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
    <script src="plugins/chartjs/Chart.bundle.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/demo.js"></script>

<script >
    $(function () {
        number=<?php echo ($_SESSION['id']);?>;
    
                $.ajax({
                url: '<?php echo base_url(); ?>Chart_Controller/show_chart/'+<?php echo ($_SESSION['id']);?>, 
                type: 'GET', 
                dataType: 'html', 
                success: function(data) {
                    console.log(data);
                    var parser = new DOMParser();
                    var xmlDoc = parser.parseFromString(data,"text/xml");
                    var caloriesEaten= new Array();
                    var caloriesMax = new Array();
                    var date = new Array();
                    for( var i =0; i<xmlDoc.getElementsByTagName("date").length;i++){
                        caloriesEaten.push(xmlDoc.getElementsByTagName("calc")[i].childNodes[0].nodeValue);
                        caloriesMax.push(xmlDoc.getElementsByTagName("calcBMI")[i].childNodes[0].nodeValue);
                        date.push(xmlDoc.getElementsByTagName("date")[i].childNodes[0].nodeValue);
                    }
                    new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line',caloriesEaten,caloriesMax,date));
                },
                error: function(e) {
                    console.log(e)
                }
            });
    
    
    
    
});

function getChartJs(type,calcEaten,calcMax,date) {
    var config = null;
        config = {
            type: 'line',
            data: {
                labels: date,
                datasets: [{
                    label: "Spożyte kalorie",
                    data: calcEaten,
                    borderColor: 'rgba(0, 188, 212, 0.75)',
                    backgroundColor: 'rgba(0, 188, 212, 0.3)',
                    pointBorderColor: 'rgba(0, 188, 212, 0)',
                    pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                    pointBorderWidth: 1
                }, {
                        label: "Maksymalna liczba kalorii do spożycia",
                        data: calcMax,
                        borderColor: 'rgba(233, 30, 99, 0.75)',
                        backgroundColor: 'rgba(233, 30, 99, 0.3)',
                        pointBorderColor: 'rgba(233, 30, 99, 0)',
                        pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                        pointBorderWidth: 1
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }

    
    return config;
}
</script>
</body>

</html>
