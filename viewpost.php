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
	$post_id = $_GET['id'];
	$last_login = $row['last_login'];
	$last_login = date('jS M Y H:i', strtotime($last_login));
	$total_members = get_all_status();
	$core_members = get_vip_status();
	$total_sessions = total_sessions();
	$completed_sessions = completed_sessions();
	
	starter($id,$name,$role,$pic,$last_login,$total_members,$core_members,$total_sessions,$completed_sessions);
?>

<?php
	$query = "SELECT * FROM blog_posts WHERE id = '$post_id'";
	$result = mysqli_query($con,$query);

	if (mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			
            $postTitle = $row['postTitle'];
            $postDate = date('jS M Y H:i:s', strtotime($row['post_date']));
            $auther = $row['auther'];
            $description = $row['description'];
            $content = $row['content'];
            $catinfo = $row['catinfo'];
			                             
			}
	}
	else
	{
		echo '<div class="alert alert-warning text-center"><h3>error while retriving post!</h3></div>';
	}
?>
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
			<li><a href="blog-home.php">Blog</a></li>
			<li class="active"><?php echo $postTitle; ?></li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo $postTitle; ?></h1>
			<p>Posted by <b><?php echo $auther; ?></b> on <b><?php echo $postDate; ?></b> in 
			<a href="viewbycat.php?cat=<?php echo $catinfo; ?>"><?php echo $catinfo; ?></a>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h3><i><?php echo $description; ?></i></h3><br>
			<p><h3><?php echo $content; ?></h3></p>
		</div>
	</div>
<?php
	at_bottom();