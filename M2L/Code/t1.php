<?php
session_start();
include 'bdd.php';
if (isset($_POST['submit'])) {
var_dump($_POST);
$mail = $_POST['mail'];
$mdp = $_POST['password'];
$hashingAfter = $mdp;
$genre=$_POST['genre'];
if ($genre==1) {
	echo "particulier";
		$query = "SELECT * FROM `client` WHERE `mail_c`='$mail' AND `mdp_c`='$hashingAfter'";
	$result = $dbh->query($query);
	// var_dump($query);
	// var_dump($result);
	$results = $result->fetch();
	// var_dump($results);
	
	if ($results) {
		//$_SESSION['client'] = true;
		// var_dump($_SESSION);
		$_SESSION['client']= $results;
		$z = $_SESSION['client'];
		$i = $z['id'];
		$coco="INSERT INTO `connexion`(`id_`, `datee`) VALUES ('$i',CURRENT_TIMESTAMP)";
		$result = $dbh->query($coco);
		header("location: index.php?success=1");
	}else{
		header("location: connect.php?erreur=2");
	}

}
else{
	echo "pro";
		$query = "SELECT * FROM `organisateur` WHERE `mail_organisateur`='$mail' AND `mdp_organisateur`='$hashingAfter'";
	$result = $dbh->query($query);
	// var_dump($query);
	// var_dump($result);
	$results = $result->fetch();
	// var_dump($results);
	
	
	if ($results) {
		$_SESSION['stat'] = true;
		// var_dump($_SESSION);
		$_SESSION['stat']= $results;
		$z = $_SESSION['stat'];
		$i = $z['id'];
		$coco="INSERT INTO `connexion`(`id_`, `datee`) VALUES ('$i',CURRENT_TIMESTAMP)";
		$result = $dbh->query($coco);
		header("location: index.php?success=1");
	}else{
		header("location: connect.php?erreur=2");
	}
}

}

else{
header("location:connect.php");
}
?>