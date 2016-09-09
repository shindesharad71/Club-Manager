<?php
require_once('funs.php');
session_start();
unset($_SESSION['username']);
session_destroy();

if(isset($_SESSION['username']))
echo 'error in logout';
else
{
	header("location:index.php");
    exit();
}