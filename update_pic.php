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
				<li class="active">Change Profile Pic</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Change Profile Pic</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="error">
				<?php update_pic($id); ?>
			</div>
			<div class="col-lg-offset-2 col-lg-4">
				<img src="<?php echo $pic; ?>" height="200px" width="200px" class="img-responsive img-circle"><br>
				<h4><?php echo $name; ?></h4>
			</div>
			<div class="col-lg-4">
			<div class="panel panel-info">
					<div class="panel-heading">
						Upload New Pic
					</div>
					<div class="panel-body">
				<form action="" role="form" method="POST" class="form-signin" enctype="multipart/form-data">
					<label for="file">Select image</label><br>
	         		<input type="file" name="image"><br>
	         		</div>
					<div class="panel-footer">
	         		<button class="btn btn-primary" name="add_event" type="submit">Change</button>&nbsp;&nbsp;
					<a type="button" class="btn btn-default" href="home.php" class="btn btn-default">Cancel</a>
					</div>
      			</form>
			</div>
		</div>
<?php
	at_bottom();
	function update_pic($id)
	{
		global $con;
		if(isset($_FILES['image']))
		{
	      $errors= array();
	      $file_name = $_FILES['image']['name'];
	      $file_size =$_FILES['image']['size'];
	      $file_tmp =$_FILES['image']['tmp_name'];
	      $file_type=$_FILES['image']['type'];
	      
	      if($file_size > 2097152)
	      {
	         $errors[]='File size must be excately 2 MB';
	      }
	      
	      if(empty($errors)==true)
	      {
	        move_uploaded_file($file_tmp,"imgs/".$file_name);
	        $addr = 'imgs/'.$file_name;
	  		$query = "UPDATE userinfo SET pic='$addr' WHERE id='$id'";
			$result = mysqli_query($con,$query);
			$rows = mysqli_affected_rows($con);
			
			if($rows == 1)
			{
				echo '<div class="text-center alert bg-success"><span>Success! Profile Pic updated</span></div>';
				echo '<script>setTimeout(function () { window.location.href = "update_pic.php";}, 1000);</script>';
			}
			else
			{
				echo '<div class="text-center alert bg-danger"><span>problem while updating profile pic</span></div>';	
			}
	 		
	    }
    	else
      	{
        	print_r($errors);
      	}
		
		return false;
	}
	}