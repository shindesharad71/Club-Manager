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
	$notice_id = $_GET['notice_id'];
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
				<li><a href="notice.php">Notice</a></li>
				<li class="active">Edit Notice</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Notice</h1>
			</div>
		</div><!--/.row-->

	<?php
	$query = "SELECT * FROM notice where notice_id='$notice_id'";
	$result = mysqli_query($con,$query);
	$rows = mysqli_affected_rows($con);

	if($rows == 1)
	{
		while($member_data = mysqli_fetch_assoc($result))
		{
			$session_name = $member_data['title'];
			$session_details = $member_data['description'];
			$session_date = $member_data['date'];
		}
	}
	else
	{
		echo 'error while retriving information';
	}
?>
	<div class="row">
		<div class="error">
			<?php edit_notice($notice_id,$role); ?>
		</div>
		<div class="col-lg-offset-2 col-lg-6">
			<form class="form-signin" method="post" action="">
				<label for="name">Notice Title</label>
				<input type="text" name="name" value="<?php echo $session_name; ?>" placeholder="max 150 char" id="name" class="form-control" require><br>
				<label for="name">Notice Description</label>
				<textarea name="description" placeholder="Description max 250 char" id="email" class="form-control" require><?php echo $session_details; ?></textarea><br>
				<label for="name">Notice Date</label>
				<input type="text" value="<?php echo $session_date; ?>" data-field="datetime" placeholder="date" name="date" class="form-control" require>
				<div id="dtBox"></div><br>
				<button class="btn btn-primary" name="edit_notice" type="submit">Edit Notice</button>&nbsp;&nbsp;
				<a type="button" class="btn btn-default" href="notice.php" class="btn btn-default">Cancel</a>
			</form>
		</div>
	</div><!--/.row-->

<?php
	at_bottom();