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
				<li class="active">Members</li>
			</ol>
		</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
				<h1 class="page-header">Members Section</h1>
		</div>
	</div><!--/.row-->

	<?php 
	if($role=="President")
	{
		echo '<div class="row">
				<div class="col-lg-12">
					<a style="color: #fff;" href="add_member.php"><h1 class="ribbon"><i class="fa fa-user-plus" aria-hidden="true"></i> <b>Add Member</b></strong>
					</h1></a>
				</div>
			</div>';
	}
	?>

	<div class="row">
		<div class="col-lg-11">
			<?php all_member_table($role); ?>
		</div>	
	</div><!--/.row-->
<?php
	at_bottom();