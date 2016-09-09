<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Club Manager</title>
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
<link href="css/pace-theme-corner-indicator.css" rel="stylesheet">
<script src="js/pace.min.js"></script>
<script>pace.start();</script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="css/styles.css" rel="stylesheet">
</head>
<?php
	session_start();
	require_once('funs.php');
	
	if( isset($_SESSION["username"]) )
	{
    	header("location:home.php");
    	exit();
	}
?>

<body style="overflow: hidden;background-color: #eee;">

	<div class="row">
	<h1 class="text-center" style="padding-top:25px;color: #000;font-weight: bold;font-size: 3.0em;">Club Manager <small>(Alpha-Agile)</small></h1><br>
	<div class="error"><?php login(); ?></div>
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form class="" method="post" action="">
						<fieldset>
							<div class="form-group">
								<input class="form-control input-lg" placeholder="username" name="username" type="text" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control input-lg" placeholder="Password" name="password" type="password" required>
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button class="btn btn-primary btn-lg" name="submit" type="submit" id="login">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	<div class="text-center" style="margin-top: 75px; color: #000;"><b>Made with <i style="color: red;">&#10084;</i> By <a href="http://sharadshinde.in" target="blank">Sharz</a> 2016</b></div>
</body>
</html>