<!DOCTYPE html>
<html>
	<head>
		<title>Sign-Up/Login Form</title>
		<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
		<link rel="stylesheet" href="css/loginStyle.css">
	</head>

	<body>
		<div class="form">

			<ul class="tab-group">
				<li class="tab"><a href="#signup">Sign Up</a></li>
				<li class="tab active"><a href="#login">Log In</a></li>
			</ul>

			<div class="tab-content">

				<div id="login"> 
					<h1>Welcome Back!</h1>

					<form action="loginPage.php" method="post" autocomplete="off">

						<!-- <div class="field-wrap">
							<input type="email" required autocomplete="off" name="email" placeholder="Email Address">
						</div> -->
						<div class="field-wrap">
							<input type="text" required name="username" autocomplete="off" placeholder="Username">
						</div>

						<div class="field-wrap">
							<input type="password" required autocomplete="off" name="password" placeholder="Password" />
						</div>

						<!-- <p class="forgot"><a href="forgot.php">Forgot Password?</a></p> -->

						<button class="button button-block" name="login"/>Log In</button>

					</form>

				</div>

				<div id="signup"> 
					<h1>Sign Up Here!</h1>

					<form action="loginPage.php" method="post" autocomplete="off" enctype="multipart/form-data">

						<div class="top-row">
							<div class="field-wrap">
								<input type="text" required autocomplete="off" name='firstname' placeholder="First Name"/>
							</div>

							<div class="field-wrap">
								<input type="text" required autocomplete="off" name='lastname' placeholder="Last Name"/>
							</div>
						</div>

						<div class="field-wrap">
							<input type="text" name="username" required autocomplete="off" placeholder="Username">
						</div>
						<!-- <div class="field-wrap">
							<input type="email" required autocomplete="off" name='email' placeholder="Email Address" />
						</div> -->

						<div class="field-wrap">
							<input type="password" required autocomplete="off" name='password' placeholder="Set A Password" />
						</div>

						<div class="field-wrap">
							<input type="file" name='file'/>
						</div>

						<button type="submit" class="button button-block" name="register" />Register</button>

					</form>

				</div>

				<!-- <div id="uploadImg"> 
					<h1>Welcome Back!</h1>

					<form action="loginPage.php" method="post" autocomplete="off">

						<div class="field-wrap">
							<input type="file" name='file'/>
						</div>

						<button class="button button-block" name="upload"/>Upload</button>

					</form>

				</div>
 -->
			</div><!-- tab-content -->

		</div> <!-- /form -->
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

		<script type="text/javascript">

			$('.tab a').on('click', function (e) {
			  
			  e.preventDefault();
			  
			  $(this).parent().addClass('active');
			  $(this).parent().siblings().removeClass('active');
			  
			  target = $(this).attr('href');

			  $('.tab-content > div').not(target).hide();
			  
			  $(target).fadeIn(600);
			  
			});

		</script>

	</body>
</html>
