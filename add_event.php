<?php
	require_once('funs.php');
	session_start();
	check_session();
	$session_name = $_SESSION['username'];
	$row = array();
	$row = get_member_data($session_name);
	$id = $row['id'];
	$name = $row['name'];
	$role = $row['role'];
	$pic = $row['pic'];
	$last_login = $row['last_login'];
	$last_login = date('jS M Y H:i', strtotime($last_login));
	$total_members = get_all_status();
	$core_members = get_vip_status();
	$total_sessions = total_sessions();
	$completed_sessions = completed_sessions();
	
	starter($id,$name,$role,$pic,$last_login,$total_members,$core_members,$total_sessions,$completed_sessions);
	if($role != 'President')
	{
		echo '<div class="text-center alert bg-warning col-md-offset-4 col-md-4"><p><b>Access Forbidden</b></p></div>';
		echo '<script>setTimeout(function () { window.location.href = "home.php";}, 1000);</script>';
		exit();
	}
?>
			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
				<li><a href="schedule.php">Schedule & Sessions</a></li>
				<li class="active">Add New Sessions</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add New Session</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="error">
				<?php add_event(); ?>
			</div>
			<div class="col-lg-offset-2 col-lg-6">
				<form class="form-signin" method="post" action="">
					<label for="name">Event Title</label>
					<input type="text" name="name" placeholder="max 150 char" id="name" class="form-control" require><br>
					<label for="name">Event Description</label>
					<textarea type="text" name="description" placeholder="Description max 250 char" id="email" class="form-control" require></textarea><br>
					<label for="name">Event Date</label>
					<input type="text" data-field="datetime" placeholder="date" name="date" class="form-control" require>
					<div id="dtBox"></div><br>
					<button class="btn btn-primary" name="add_event" type="submit">Add</button>&nbsp;&nbsp;
					<a type="button" class="btn btn-default" href="schedule.php" class="btn btn-default">Cancel</a>
				</form>
			</div>		
<?php
	at_bottom();