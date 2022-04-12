<?php 

include 'bdd.php';

//Verification si on à reçu des données en POST.
if (isset($_POST['submit'])) {
	//echo "On a reçu des données";
	//var_dump($_POST);

	$genre = $_POST['genre'];
	// var_dump($genre);
	$nom = $_POST['nom'];
	// var_dump($nom);
	
	// var_dump($prenom);
	$mail = $_POST['mail'];
	// var_dump($mail);
	$tel = $_POST['telephone'];
	// var_dump($tel);
	
	// var_dump($pays);
	// $adresse = $_POST['adresse'];
	// var_dump($adresse);
	// $dep = $_POST['dep'];
	$hashing = $_POST['motdepasse'];
	$hashingAfter = hash('ripemd160', $hashing);
	// var_dump($hashingAfter);

	/*if (empty($mail) OR empty($nom) OR empty($tel) OR empty($hashing) {
		//Retourne sur la page ajout avec un message d'erreur.
		header("location: inscription.php?malin");
	}*/
if ($genre == 1) {
	$date = $_POST['date'];
	$prenom =$_POST['prenom'];
	$maill = "SELECT count(*) FROM client WHERE mail_c ='$mail'";
	//var_dump($maill);
	//die();
	$rmail = $dbh->query($maill)->fetchColumn();
	var_dump($rmail);
	//die();	
	if ($rmail != 1) {

 
	$query = "INSERT INTO `client`(`nom_c`, `prenom_c`, `date_c`, `mail_c`, `mdp_c`, `tel_c`) VALUES ('$nom','$prenom','$date','$mail','$hashing','$tel')";
	
	//var_dump($query);
	$result = $dbh->query($query);
	//var_dump($result);
	// die;
	if ($result) {
		header("location: connect.php?success=2");
	}else{
		header("location: inscription.php?error=1");
	}
	
}
else{
	header("location: inscription.php?error=2");	
}

}
elseif ($genre == 2) {
	
	$maill = "SELECT count(*) FROM organisateur WHERE mail_organisateur ='$mail'";
	$rmail = $dbh->query($maill)->fetchColumn();
	//var_dump($rmail);
	// die;	
	if ($rmail != 1) {
		$query = "INSERT INTO `organisateur`(`id_organisateur`,`nom_organisateur`, `mail_organisateur`, `mdp_organisateur`, `tel_organisateur`) VALUES ('11','$nom','$mail','$hashing','$tel')";
	
	//var_dump($query);
	$result = $dbh->query($query);
	//var_dump($result);
	// die;
	if ($result) {
		header("location: connect.php?success=2");
	}else{
		header("location: inscription.php?error=1");
	}
	/*
	foreach ($_POST as $key => $value) {}
	*/
	
}
else{
	header("location: inscription.php?error=2");	
}

}



}
else{
	header("location: inscription.php");
}

 ?>