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

	$key = $_POST['term'];

	$query = "SELECT * FROM blog_posts WHERE postTitle LIKE '%".$key."%' OR description LIKE '%".$key."%' OR content  LIKE '%".$key."%'";
	$result = mysqli_query($con,$query);

?>
	<div class="row">
			<ol class="breadcrumb">
				<li><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
				<li class="active">Search</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Search Results for <u><?php echo $key; ?></u></h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
		<?php

		if(mysqli_num_rows($result) == 0)
  		{
  			echo  '<br><div class="text-center alert bg-warning col-lg-offset-2 col-lg-5"><span><b>Sorry, no results found</b></span></div>';
  		}
		if(mysqli_num_rows($result) > 0)
		{
			$select = 1;
			while($row = mysqli_fetch_assoc($result))
			{
				if($select%2 == 1)
			{
				$css = 'panel-teal';
			}
			else
			{
				$css = 'panel-orange';
			}
			?>

			<div class="col-lg-4">
				<div class="panel <?php echo $css; ?>">
				<div class="panel-body">
				<a href="viewpost.php?id=<?php echo $row['id']; ?>&title=<?php echo $row['postTitle']; ?>" style="color: #fff;">
				<h3 style="color: #fff;"><?php echo $row['postTitle']; ?></h3>
				<a href="viewpost.php?id=<?php echo $row['id']; ?>&title=<?php echo $row['postTitle']; ?>" style="color: #fff;">
				<p>Posted by <b><?php echo $row['auther']; ?></b> on <b><?php echo date('jS M Y H:i:s', strtotime($row['post_date'])); ?></b> in 
				<b><a style="color: #fff;" href="viewbycat.php?cat=<?php echo $row['catinfo']; ?>"><?php echo $row['catinfo']; ?></a></b></p>
			    
			    <p><a style="color: #fff;" href="viewbycat.php?cat=<?php echo $row['catinfo']; ?>"><?php echo $row['description']; ?></a></p>
			    </a>
			    </a>
			    </div>               
			    </div>
			</div>
			    <?php
			    $select++;
			}
		}

?>
	</div><!--/.row-->
<?php
	at_bottom();