<?php 
session_start();

//unset($_SESSION['connect']);
//unset($SESSION['admin']);
session_destroy();

header("location: index.php");

 ?>