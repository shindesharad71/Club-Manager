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
?>

	<div class="row">
		<ol class="breadcrumb">
			<li><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
			<li class="active">Blog</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Recent Blog Posts</h1>
		</div>
	</div>
	
	<?php
		if(isset($_SESSION['username']))
		{
			echo '<div class="row">
					<div class="col-lg-12">
						<a style="color: #fff;" href="new-post.php"><h1 class="ribbon"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <b>New Post</b></strong>
							</h1></a>
					</div></div>';
		}
	?>

	<div class="row">
		<?php show_posts($role,$session_name); ?>
	</div>
	<?php
	at_bottom();