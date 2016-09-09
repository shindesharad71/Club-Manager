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
	$mem_id = $_GET['mem_id'];
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
				<li><a href="manage_members.php">Members</a></li>
				<li class="active">Edit Member</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Member</h1>
			</div>
		</div><!--/.row-->

	<?php
	$query = "SELECT * FROM userinfo where id='$mem_id'";
	$result = mysqli_query($con,$query);
	$rows = mysqli_affected_rows($con);

	if($rows == 1)
	{
		while($member_data = mysqli_fetch_assoc($result))
		{
			$member_name = $member_data['name'];
			$member_email = $member_data['email'];
			$member_username = $member_data['username'];
			$member_role = $member_data['role'];
		}
	}
	else
	{
		echo 'error while retriving member information';
	}
?>

	<div class="row">
		<div class="error">
			<?php edit_member($role,$mem_id); ?>
		</div>
		<div class="col-lg-offset-2 col-lg-6">
			<form class="form-signin" method="post" action="">
				<label for="name">Name</label>
				<input type="text" value="<?php echo $member_name;?>" name="name" placeholder="Name" id="name" class="form-control" require><br>
				<label for="name">Email</label>
				<input type="email" value="<?php echo $member_email;?>" name="email" placeholder="Email" id="email" class="form-control" require><br>
				<label for="name">Username</label>
				<input type="text" value="<?php echo $member_username;?>" name="username" placeholder="username" id="username" class="form-control"><br>
				<?php if($role == 'President')
				{
					echo '<label for="name">Role <small>(only President can add/edit roles)</small></label>
					<select class="form-control" name="role">
						<option name="'.$member_role.'" value="'.$member_role.'">'.$member_role.'</option>
	    				<option name="Member" value="Member">Member</option>
					   	<option name="Media-Marketing" value="Media Marketing">Media Marketing</option>
					  	<option name="Admin Logistics" value="Admin Logistics">Admin Logistics</option>
					   	<option name="Member Management" value="Member Management">Member Management</option>
					   	<option name="Technical" value="Technical">Technical</option>
					   	<option name="President" value="President">President</option>
	  				</select><br>';
				} ?>
				<button class="btn btn-primary" name="edit_member" type="submit" id="login">Edit</button>&nbsp;&nbsp;
				<a href="manage_members.php" class="btn btn-default" id="login">Cancel</a>
			</form>
		</div>
	</div><!--/.row-->

<script>
		$(document).ready(function()
		{
		     $("#dtBox").DateTimePicker();
		});
 	</script>
<link rel="stylesheet" type="text/css" href="css/DateTimePicker.min.css" />
<script type="text/javascript" src="js/DateTimePicker.min.js"></script>
<?php
	at_bottom();