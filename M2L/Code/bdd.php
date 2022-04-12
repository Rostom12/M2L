<?php 
$user = "root";
$pass ="";
$dbname = "newm2l";
$dbh = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", $user, $pass);
if ($dbh) {
	$connexion = true;	 
}

?>