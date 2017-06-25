<?php
include '../system/autoload.php';
include 'config.php';
$title="Command";
$array = ['logout','admin','home','list_route'];

if (isset($_POST['login'])) {
	$password=$_POST['password'];
	if ($password==$command['password']) {
		$_SESSION['password']=$command['password'];
	}
	header("location: index.php");
}
if (isset($_SESSION["password"])) {
	$password_ad=$_SESSION["password"];
} else {
	$password_ad="";
}

if ($password_ad==$command['password']) {
?>


<!DOCTYPE html>
<html>
	<head>
		<?php include ("inc/head.php"); ?>
	</head>
	<body>
		<div class="wrapper">
			<?php include ("inc/sidebar.php"); ?>
			<div class="main-panel">
				<nav class="navbar navbar-transparent navbar-absolute">
					<?php include ("inc/menu.php"); ?>
				</nav>
				<div class="content">
					<?php
					if ($view && ($key = array_search($view, $array)) !== false && file_exists('main/' . $array[$key] . '.php')) {
						include 'main/' . $array[$key] . '.php';
					} else {
						include 'main/index.php';
					}
					?>

				</div>
				<footer class="footer">
					<?php include ("inc/footer.php"); ?>
				</footer>
			</div>
		</div>
		<?php include ("inc/config_theme.php"); ?>
	</body>
	<?php include ("inc/script.php"); ?>
</html>
<?php
} else {
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Command | <?=$command['code']?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta property="og:site_name" content="Creative Tim" />
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo asset("assets/css/bootstrap.min.css"); ?>" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo asset("assets/css/material-dashboard.css"); ?>" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo asset("assets/css/demo.css"); ?>" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="<?php echo asset("assets/font-awesome.min.css"); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
</head>

<body>
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=" #pablo ">Command | <?=$command['code']?></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class=" active ">
                        <a href="">
                            <i class="material-icons">lock_open</i> Lock
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page lock-page" filter-color="black" data-image="<?php echo asset("assets/img/lock.jpg"); ?>">
            <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->
            <div class="content">
                <form method="POST" action="">
                    <div class="card card-profile card-hidden">
                        <div class="card-avatar">
                            <a href="#pablo">
                                <img class="avatar" src="<?=$command['avatar']?>" alt="...">
                            </a>
                        </div>
                        <div class="card-content">
                            <div class="form-group label-floating">
                                <label class="control-label">Enter Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="login" class="btn btn-rose btn-round">Unlock</button>
                        </div>
                    </div>
                </form>
            </div>
            <footer class="footer">
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="#"><?=$command['code']?></a>, made with love for a better web
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="<?php echo asset("assets/js/jquery-3.1.1.min.js"); ?>" type="text/javascript"></script>
<script src="<?php echo asset("assets/js/jquery-ui.min.js"); ?>" type="text/javascript"></script>
<script src="<?php echo asset("assets/js/bootstrap.min.js"); ?>" type="text/javascript"></script>
<script src="<?php echo asset("assets/js/material.min.js"); ?>" type="text/javascript"></script>
<script src="<?php echo asset("assets/js/perfect-scrollbar.jquery.min.js"); ?>" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo asset("assets/js/jquery.validate.min.js"); ?>"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo asset("assets/js/moment.min.js"); ?>"></script>
<!--  Charts Plugin -->
<script src="<?php echo asset("assets/js/chartist.min.js"); ?>"></script>
<!--  Plugin for the Wizard -->
<script src="<?php echo asset("assets/js/jquery.bootstrap-wizard.js"); ?>"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo asset("assets/js/bootstrap-notify.js"); ?>"></script>
<!--   Sharrre Library    -->
<script src="<?php echo asset("assets/js/jquery.sharrre.js"); ?>"></script>
<!-- DateTimePicker Plugin -->
<script src="<?php echo asset("assets/js/bootstrap-datetimepicker.js"); ?>"></script>
<!-- Vector Map plugin -->
<script src="<?php echo asset("assets/js/jquery-jvectormap.js"); ?>"></script>
<!-- Sliders Plugin -->
<script src="<?php echo asset("assets/js/nouislider.min.js"); ?>"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js"); ?>"></script>
<!-- Select Plugin -->
<script src="<?php echo asset("assets/js/jquery.select-bootstrap.js"); ?>"></script>
<!--  DataTables.net Plugin    -->
<script src="<?php echo asset("assets/js/jquery.datatables.js"); ?>"></script>
<!-- Sweet Alert 2 plugin -->
<script src="<?php echo asset("assets/js/sweetalert2.js"); ?>"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo asset("assets/js/jasny-bootstrap.min.js"); ?>"></script>
<!--  Full Calendar Plugin    -->
<script src="<?php echo asset("assets/js/fullcalendar.min.js"); ?>"></script>
<!-- TagsInput Plugin -->
<script src="<?php echo asset("assets/js/jquery.tagsinput.js"); ?>"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo asset("assets/js/material-dashboard.js"); ?>"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo asset("assets/js/demo.js"); ?>"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/lock.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Jun 2017 03:25:27 GMT -->
</html>
<?php
}
?>