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
	$key = $_GET['key'];
	
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
				<li><a href="attendance.php">Attendance</a></li>
				<li class="active">Manage Attendance</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Fill Attendance for Session</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="error">
				<?php do_attendance($key); ?>
			</div>
			<div class="col-lg-offset-2 col-lg-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Mark All Present Members
					</div>
					<div class="panel-body">
						<form class="form-signin" method="post" action="">
							<?php
								global $con;
								$key = $key;
								$query = "SELECT * FROM userinfo";
								$result = mysqli_query($con,$query);
								$rows = mysqli_affected_rows($con);
								while ($row = mysqli_fetch_assoc($result))
								{
									echo '<div class="checkbox">
									<label><input type="checkbox" name="checkbx[]" value="'.$row['id'].'">'.$row['name'].'</label>
									</div>';
								}
							?>
						</div>
						<div class="panel-footer">
							<button class="btn btn-primary pull-left" name="submit_attendance" type="submit" id="login">Save Attendance</button>&nbsp;&nbsp;
							<a href="notice.php" class="btn btn-default" id="login">Cancel</a>
						</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/.row-->
<?php
	at_bottom();