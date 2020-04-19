<?php
session_start();
ob_start();
if (!isset($_SESSION['login'])) header("Location: connecter.php"); 
if (isset($_GET['logout'])) {session_unset(); session_destroy();header("Location: connecter.php"); }
include("../../control/fonctions.php");
connexion();
include ("../../modeles/Utilisateur.php");
include ("../../modeles/Categorie.php");
include ("../../modeles/Application.php");
include ("../../modeles/Template.php");
include ("../../modeles/Menu.php");
include ("../../modeles/Page.php");
if(isset($_GET['id_app']) || isset($_GET['id_t']))
{
	$_SESSION['id_app']=$_GET['id_app'];	
	$_SESSION['id_t']=$_GET['id_t'];	
}
$u=new Utilisateur();
$u->affiche(0,"where login='".$_SESSION['login']."'");
$app=new Application();
$app->affiche(0,"where id='".$_SESSION['id_app']."'");
$t=new Template();
$t->affiche(0,"where id='".$_SESSION['id_t']."'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title><?php echo $t->libelle; ?></title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
   <!-- Start Global Mandatory Style
   =====================================================================-->
   <!-- jquery-ui css -->
   <link href="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
   <!-- Bootstrap -->
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   <!-- Bootstrap rtl -->
   <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
   <!-- Lobipanel css -->
   <link href="assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
   <!-- Pace css -->
   <link href="assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
   <!-- Font Awesome -->
   <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
   <!-- Pe-icon -->
   <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
   <!-- Themify icons -->
   <link href="assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
        <!-- End Global Mandatory Style
        =====================================================================-->
        <!-- Start page Label Plugins 
        =====================================================================-->
        <!-- Toastr css -->
        <link href="assets/plugins/toastr/toastr.css" rel="stylesheet" type="text/css"/>
        <!-- Emojionearea -->
        <link href="assets/plugins/emojionearea/emojionearea.min.css" rel="stylesheet" type="text/css"/>
        <!-- Monthly css -->
        <link href="assets/plugins/monthly/monthly.css" rel="stylesheet" type="text/css"/>
        <!-- End page Label Plugins 
        =====================================================================-->
        <!-- Start Theme Layout Style
        =====================================================================-->
        <!-- Theme style -->
        <link href="assets/dist/css/stylehealth.min.css" rel="stylesheet" type="text/css"/>
        <!--<link href="assets/dist/css/stylehealth-rtl.css" rel="stylesheet" type="text/css"/>-->
        <!-- End Theme Layout Style
        =====================================================================-->
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <header class="main-header">

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top ">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-tasks"></span>
                    </a>
				<?php include("vues/notification.php"); ?>
					</nav>
            </header>
            <!-- =============================================== -->
            <!-- Left side column. contains the sidebar -->
          <aside class="main-sidebar">
                <!-- sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="image pull-left">
                            <img src="../../images/logos/<?php echo $app->logo; ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="info">
                            <h4>Welcome</h4>
                            <p><?php echo $app->nom; ?></p>
                        </div>
                    </div>
                   
                    <!-- sidebar menu -->
					<?php include("vues/menu.php"); ?>
		</div> <!-- /.sidebar -->
    </aside>
            <!-- =============================================== -->
		 <?php 
			if(isset($_GET['p']))
			{ echo'<div class="content-wrapper">
	<section class="content">
        <div class="row">';

						$m=new Menu();
						$p=new Page();
						$i=0;
						while($i<compteurTable("menu","where id_application='".$_SESSION['id_app']."'"))
						{
							$m->affiche($i,"where id_application='".$_SESSION['id_app']."'");
							if($_GET['p']==$m->lien)
							{
								if(compteurTable("page","where 	diriger_vers='".$m->id."'")==1)
								{
									$p->affiche(0,"where diriger_vers='".$m->id."'");
									$page=$p->titre;
									$file=fopen('vues/'.$page.'.php', 'w+');
									include("vues/".$page.".php");
									$texte=alert($p->titre,'info');
									fwrite($file, $texte);
									$lines = file("vues/".$page.".php");
									foreach($lines as $n => $line){
									echo $line . "<br />";
									}
								}
							}
							$i++;
						}
				
			
		echo'</div>
	</section>
</div>';
	}
	else include("vues/contenu.php"); 
	?>
			<footer class="main-footer">
                <div class="pull-right hidden-xs"> <b>Version</b> 1.0</div>
                <strong>Copyright &copy; <?php echo date("Y"); ?></strong> All rights reserved.
            </footer>
        </div> <!-- ./wrapper -->
        <!-- ./wrapper -->
         <!-- Start Core Plugins
        =====================================================================-->
        <!-- jQuery -->
        <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <!-- jquery-ui --> 
        <script src="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- lobipanel -->
        <script src="assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
        <!-- Pace js -->
        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
        <!-- Hadmin frame -->
        <script src="assets/dist/js/custom1.js" type="text/javascript"></script>
        <!-- End Core Plugins
        =====================================================================-->
        <!-- Start Page Lavel Plugins
        =====================================================================-->
        <!-- Toastr js -->
        <script src="assets/plugins/toastr/toastr.min.js" type="text/javascript"></script>
        <!-- Sparkline js -->
        <script src="assets/plugins/sparkline/sparkline.min.js" type="text/javascript"></script>
        <!-- Data maps js -->
        <script src="assets/plugins/datamaps/d3.min.js" type="text/javascript"></script>
        <script src="assets/plugins/datamaps/topojson.min.js" type="text/javascript"></script>
        <script src="assets/plugins/datamaps/datamaps.all.min.js" type="text/javascript"></script>
        <!-- Counter js -->
        <script src="assets/plugins/counterup/waypoints.js" type="text/javascript"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <!-- ChartJs JavaScript -->
        <script src="assets/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
        <script src="assets/plugins/emojionearea/emojionearea.min.js" type="text/javascript"></script>
        <!-- Monthly js -->
        <script src="assets/plugins/monthly/monthly.js" type="text/javascript"></script>
        <!-- Data maps -->
        <script src="assets/plugins/datamaps/d3.min.js" type="text/javascript"></script>
        <script src="assets/plugins/datamaps/topojson.min.js" type="text/javascript"></script>
        <script src="assets/plugins/datamaps/datamaps.all.min.js" type="text/javascript"></script>
      
        <!-- End Page Lavel Plugins
        =====================================================================-->
        <!-- Start Theme label Script
        =====================================================================-->
        <!-- Dashboard js -->
        <script src="assets/dist/js/custom.js" type="text/javascript"></script>

        <!-- End Theme label Script
        =====================================================================-->
         <script>
                "use strict"; // Start of use strict
                // notification
                setTimeout(function () {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 1000
                    };
                    toastr.success('Responsive Admin Theme', 'Welcome to <?php echo json_encode($app->nom); ?>');

                }, 1300);

                //counter
                $('.count-number').counterUp({
                    delay: 10,
                    time: 5000
                });

                //data maps
                var basic_choropleth = new Datamap({
                    element: document.getElementById("map1"),
                    projection: 'mercator',
                    fills: {
                        defaultFill: "#009688",
                        authorHasTraveledTo: "#fa0fa0"
                    },
                    data: {
                        USA: {fillKey: "authorHasTraveledTo"},
                        JPN: {fillKey: "authorHasTraveledTo"},
                        ITA: {fillKey: "authorHasTraveledTo"},
                        CRI: {fillKey: "authorHasTraveledTo"},
                        KOR: {fillKey: "authorHasTraveledTo"},
                        DEU: {fillKey: "authorHasTraveledTo"}
                    }
                });

                var colors = d3.scale.category10();

                window.setInterval(function () {
                    basic_choropleth.updateChoropleth({
                        USA: colors(Math.random() * 10),
                        RUS: colors(Math.random() * 100),
                        AUS: {fillKey: 'authorHasTraveledTo'},
                        BRA: colors(Math.random() * 50),
                        CAN: colors(Math.random() * 50),
                        ZAF: colors(Math.random() * 50),
                        IND: colors(Math.random() * 50)
                    });
                }, 2000);

        //bar chart
                var ctx = document.getElementById("barChart");
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                        datasets: [
                            {
                                label: "My First dataset",
                                data: [65, 59, 80, 81, 56, 55, 40, 25, 35, 51, 94, 16],
                                borderColor: "#009688",
                                borderWidth: "0",
                                backgroundColor: "#009688"
                            },
                            {
                                label: "My Second dataset",
                                data: [28, 48, 40, 19, 86, 27, 90, 91, 41, 25, 34, 47],
                                borderColor: "#009688",
                                borderWidth: "0",
                                backgroundColor: "#009688"
                            }
                        ]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                        }
                    }
                });
                      //radar chart
                var ctx = document.getElementById("radarChart");
                var myChart = new Chart(ctx, {
                    type: 'radar',
                    data: {
                        labels: [["Eating", "Dinner"], ["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Cycling", "Running"],
                        datasets: [
                            {
                                label: "My First dataset",
                                data: [65, 59, 66, 45, 56, 55, 40],
                                borderColor: "#00968866",
                                borderWidth: "1",
                                backgroundColor: "rgba(0, 150, 136, 0.35)"
                            },
                            {
                                label: "My Second dataset",
                                data: [28, 12, 40, 19, 63, 27, 87],
                                borderColor: "rgba(55, 160, 0, 0.7",
                                borderWidth: "1",
                                backgroundColor: "rgba(0, 150, 136, 0.35)"
                            }
                        ]
                    },
                    options: {
                        legend: {
                            position: 'top'
                        },
                        scale: {
                            ticks: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Message
                $('.message_inner').slimScroll({
                    size: '3px',
                    height: '320px'
                });

                //emojionearea
                $(".emojionearea").emojioneArea({
                    pickerPosition: "top",
                    tonesStyle: "radio"
                });

                //monthly calender
                $('#m_calendar').monthly({
                    mode: 'event',
                    //jsonUrl: 'events.json',
                    //dataType: 'json'
                    xmlUrl: 'events.xml'
                });
            
            
             //line chart
                var ctx = document.getElementById("lineChart");
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                        datasets: [
                            {
                                label: "My First dataset",
                                borderColor: "rgba(0,0,0,.09)",
                                borderWidth: "1",
                                backgroundColor: "rgba(0,0,0,.07)",
                                data: [22, 44, 67, 43, 76, 45, 12, 45, 65, 55, 42, 61, 73]
                            },
                            {
                                label: "My Second dataset",
                                borderColor: "#009688",
                                borderWidth: "1",
                                backgroundColor: "#009688",
                                pointHighlightStroke: "#009688",
                                data: [16, 32, 18, 26, 42, 33, 44, 24, 19, 16, 67, 71, 65]
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                });


        </script>

    </body>

<!-- Mirrored from healthadmin.thememinister.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Apr 2019 19:13:37 GMT -->
</html>