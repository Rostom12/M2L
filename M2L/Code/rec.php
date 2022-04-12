<?php
include 'inc/header.php';
include 'bdd.php';
if (isset($_POST['sended'])) {
	$mail = htmlspecialchars($_POST['mail']);
	$s ="SELECT * FROM `client` WHERE `mail_c` = '$mail'";
	$ss= $dbh->query($s)->fetch();
	// var_dump($ss);
	// die;
	if ($ss == false) {
		header("location:rec.php");
	}

	$mail = htmlspecialchars($_POST['mail']);
	$mdp = substr(md5(uniqid(rand(), true)), 0, 10);
	$requete = $dbh->prepare("UPDATE `client` SET `rec_c`= ? WHERE mail_c = '$mail'");
	$c = $requete->execute(array($mdp));
	$s ="SELECT * FROM `client` WHERE `mail_c` = '$mail'";
	$ss= $dbh->query($s)->fetch();
	// var_dump($ss);
	$ppp=$ss['id_c'];
	$mail=$ss['mail_c'];
	
    // 
    // !!!!!!!!!!!!!!!!a active !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// $from = "lebonpetitcoin@lebontcoin.com";
 //    $to = "$mail"; 
 //    $subject = "Votre mot de passe";
 //    $message = "nodif.php?rec=$mdp";
	/*$headers = array(
    'From' => 'webmaster@example.com',
    'Reply-To' => 'webmaster@example.com',
    'X-Mailer' => 'PHP/' . phpversion()
);*/
    // mail($to,$subject,$message, $headers);





    if ($ss) {
    // eval("location:rec.php?sucess");
    $modifff = "nodif.php?rec=$mdp&id=$ppp";
    ?>
    <a href="<?php echo $modifff; ?>">Faire la modification de votre mot de passe</a>
    <?php
	// header("location:rec.php?sucess");
    }
}
if (isset($_GET['sucess'])) {
	?>
	<div class="container">
		<div class="alert alert-info" role="alert">
  <h4 class="alert-heading">Un lien vous a ete envoyer par mail</h4>
</div>
	</div>
	<?php
}
?>

<div class="container">
	<!-- <div class="bg-warning"> -->
	<div>	
	<p>
	<b class="btn-outline-info">Attention vous êtes dans la partie réinitalisation de votre mot de passe</b>
	</p>
	</div>

<div class="form-row">
		<form method="post" action="">
			<div class="form-group col">
				<input class="form-control" type="mail" name="mail" placeholder="mail">
			</div>
			<div class=" form-group col">
				<button type="submit" class="btn btn-outline-success" name="sended">
					Envoyer
				</button>
			</div>
	</form>

</div>

</div>

<?php

include 'inc/footer.php';
?>	