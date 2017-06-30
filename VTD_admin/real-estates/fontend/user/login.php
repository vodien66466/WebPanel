<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ableproadmin.com/light/vertical/login1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Jun 2017 13:19:01 GMT -->
<head>
	<title>Đăng Nhập</title>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="fontendport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="description" content="Phoenixcoded">
	<meta name="keywords"
		  content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="Phoenixcoded">

	<!-- Favicon icon -->
	<link rel="shortcut icon" href="<?=$s->asset(null,"public/assets/images/favicon.png")?>" type="image/x-icon">
	<link rel="icon" href="<?=$s->asset(null,"public/assets/images/favicon.ico")?>" type="image/x-icon">

	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="<?=$s->asset(null,"public/assets/css/font-awesome.min.css")?>" rel="stylesheet" type="text/css">

	<!--ico Fonts-->
	<link rel="stylesheet" type="text/css" href="<?=$s->asset(null,"public/assets/icon/icofont/css/icofont.css")?>">

	<!-- Required Fremwork -->
	<link rel="stylesheet" type="text/css" href="<?=$s->asset(null,"public/assets/css/bootstrap.min.css")?>">

	<!-- waves css -->
	<link rel="stylesheet" type="text/css" href="<?=$s->asset(null,"public/assets/plugins/waves/css/waves.min.css")?>">

	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="<?=$s->asset(null,"public/assets/css/main.css")?>">

	<!-- Responsive.css-->
	<link rel="stylesheet" type="text/css" href="<?=$s->asset(null,"public/assets/css/responsive.css")?>">

	<!--color css-->
	<link rel="stylesheet" type="text/css" href="<?=$s->asset(null,"public/assets/css/color/color-1.css")?>" id="color"/>

</head>
<body>
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-12">
				<div class="login-card card-block">
					<form class="md-float-material">
						<div class="text-center">
							<img style="width: 200px" src="<?=$s->asset(null,"public/images/logo/nen/2196F3.png")?>">
						</div>
						<h3 class="text-center txt-primary">
							Đăng nhập vào tài khoản của bạn
						</h3>
						<div class="md-input-wrapper">
							<input type="email" class="md-form-control" />
							<label>Email</label>
						</div>
						<div class="md-input-wrapper">
							<input type="password" class="md-form-control" />
							<label>Mật Khẩu</label>
						</div>
						<div class="row">
							<div class="col-sm-6 col-xs-12">
							<div class="rkmd-checkbox checkbox-rotate checkbox-ripple m-b-25">
								<label class="input-checkbox checkbox-primary">
									<input type="checkbox" id="checkbox">
									<span class="checkbox"></span>
								</label>
								<div class="captions">Lưu mật khẩu</div>

							</div>
								</div>
							<div class="col-sm-6 col-xs-12 forgot-phone text-right">
								<a href="" class="text-right f-w-600"> Quên mật khẩu?</a>
								</div>
						</div>
						<div class="row">
							<div class="col-xs-10 offset-xs-1">
								<button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Đăng Nhập</button>
							</div>
						</div>
						<!-- <div class="card-footer"> -->
						<div class="col-sm-12 col-xs-12 text-center">
							
						</div>

						<!-- </div> -->
					</form>
					<!-- end of form -->
				</div>
				<!-- end of login-card -->
			</div>
			<!-- end of col-sm-12 -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container-fluid -->
</section>
<!-- Warning Section Ends -->
<!-- Required Jqurey -->
<script src="<?=$s->asset(null,"public/assets/js/jquery-3.1.1.min.js")?>"></script>
<script src="<?=$s->asset(null,"public/assets/js/jquery-ui.min.js")?>"></script>
<!-- tether.js -->
<script src="<?=$s->asset(null,"public/assets/js/tether.min.js")?>"></script>
<!-- waves effects.js -->
<script src="<?=$s->asset(null,"public/assets/plugins/waves/js/waves.min.js")?>"></script>
<!-- Required Framework -->
<script src="<?=$s->asset(null,"public/assets/js/bootstrap.min.js")?>"></script>
<!-- Custom js -->
<script type="text/javascript" src="<?=$s->asset(null,"public/assets/pages/elements.js")?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
//waves effect js start
 Waves.init();
    Waves.attach('.flat-buttons', ['waves-button']);
    Waves.attach('.float-buttons', ['waves-button', 'waves-float']);
    Waves.attach('.float-button-light', ['waves-button', 'waves-float', 'waves-light']);
    Waves.attach('.flat-buttons',['waves-button', 'waves-float', 'waves-light','flat-buttons']);
//waves effect js end



	/* --------------------------------------------------------
       Color picker - demo only
       --------------------------------------------------------   */
    $('<div class="color-picker"><a href="#" class="handle"><i class="icofont icofont-color-bucket"></i></a><div class="settings-header"><h3>Setting panel</h3></div><div class="section"><h3 class="color">Normal color schemes:</h3><div class="colors"><a href="#" class="color-1" ></a><a href="#" class="color-2" ></a><a href="#" class="color-3" ></a><a href="#" class="color-4" ></a><a href="#" class="color-5"></a></div></div><div class="section"><h3 class="color">Inverse color:</h3><div><a href="#" class="color-inverse"><img class="img img-fluid img-thumbnail" src="<?=$s->asset(null,"public/assets/images/inverse-layout.jpg")?>" /></a></div></div></div>').appendTo($('body'));

      /*Gradient Color*/
      /*Normal Color */
      $(".color-1").on('click',function() {
          $("#color").attr("href", "<?=$s->asset(null,"public/assets/css/color/color-1.css")?>");
          return false;
      });
      $(".color-2").on('click',function() {
          $("#color").attr("href", "<?=$s->asset(null,"public/assets/css/color/color-2.css")?>");
          return false;
      });
      $(".color-3").on('click',function() {
          $("#color").attr("href", "<?=$s->asset(null,"public/assets/css/color/color-3.css")?>");
          return false;
      });
      $(".color-4").on('click',function() {
          $("#color").attr("href", "<?=$s->asset(null,"public/assets/css/color/color-4.css")?>");
          return false;
      });
      $(".color-5").on('click',function() {
          $("#color").attr("href", "<?=$s->asset(null,"public/assets/css/color/color-5.css")?>");
          return false;
      });
        $(".color-inverse").on('click',function() {
            $("#color").attr("href", "<?=$s->asset(null,"public/assets/css/color/inverse.css")?>");
            return false;
        });


      $('.color-picker').animate({
          right: '-239px'
      });

      $('.color-picker a.handle').click(function(e) {
          e.preventDefault();
          var div = $('.color-picker');
          if (div.css('right') === '-239px') {
              $('.color-picker').animate({
                  right: '0px'
              });
          } else {
              $('.color-picker').animate({
                  right: '-239px'
              });
          }
      });
});
</script>


</body>

<!-- Mirrored from ableproadmin.com/light/vertical/login1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Jun 2017 13:19:01 GMT -->
</html>