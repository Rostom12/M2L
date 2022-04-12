<?php 
include 'inc/header.php';
if (isset($_SESSION['client'])) {
	header("location:myinfo.php");
}
else{
	header("location:index.php");
}
?>