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
	$getcategory = $_GET['cat'];
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
				<li><a href="blog-home.php">Blog</a></li>
				<li class="active"><?php echo $getcategory; ?></li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Posts in <?php echo $getcategory; ?></h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
	<?php
	$query = "SELECT * FROM blog_posts WHERE catinfo='$getcategory' ORDER BY id DESC";
	$result = mysqli_query($con,$query);

	if(mysqli_num_rows($result) > 0)
	{
		$select = 1;
		while($row = mysqli_fetch_assoc($result))
		{
			if($select%2 == 1)
			{
				$css = 'panel-primary';
			}
			else
			{
				$css = 'panel-info';
			}
		?>
		<div class="col-lg-5">
			<div class="panel <?php echo $css; ?>">
			<div class="panel-heading">
			<?php echo $row['postTitle']; ?>
			</div>
			<div class="panel-body">
			<i>Posted on <?php echo date('jS M Y H:i:s', strtotime($row['post_date'])); ?></i> by <?php echo $row['auther']; ?> in 
			<a href="viewbycat.php?cat=<?php echo $row['catinfo']; ?>"><?php echo $row['catinfo']; ?></a>
				<br><br>
			    <p><?php echo $row['description']; ?></p>
			    </div>               
			    <div class="panel-footer">
			    <?php
			    	if($session_name == $row['auther'] || $role == 'President')
			    	{?>
			    		<a class="btn btn-warning" href="edit-post.php?id=<?php echo $row['id']; ?>&title=<?php echo $row['postTitle']; ?>">Edit</a>
			    		<a class="btn btn-danger" href="delete-post.php?id=<?php echo $row['id']; ?>&title=<?php echo $row['postTitle']; ?>">Delete</a> 
			    	<?php }
			   	?>
			    <a class="btn btn-primary" href="viewpost.php?id=<?php echo $row['id']; ?>&title=<?php echo $row['postTitle']; ?>">Read More</a>      
			    </div></div></div>
			    <?php
			    $select++;
		} // Post list while closed.		

	} // Post list if closed.
	else
	{
		echo '<div class="text-center alert bg-warning col-md-offset-4 col-md-4" role="alert"><span>no posts found, try again</span></div>';
	}

	echo '</div>';
	at_bottom();