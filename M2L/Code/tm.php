<?php 
include 'inc/header.php';
if (isset($_SESSION['client'])) {
include 'bdd.php';
if (isset($_GET['mod'])) {
	$ida  =  (int)$_GET['mod'];
	$z =$_SESSION['client'];
	$idc = $z['0'];
	$verif = "SELECT * FROM annonce WHERE id_a = $ida AND id_c_a =$idc";
	$d = $dbh->query($verif)->fetch();
	if ($d == false) {
		header("location: myannonce.php");
	}
	else{
		if (isset($_POST['send'])) {
			// var_dump($_POST);
			$nom= $_POST['nom'];
			$description= $_POST['description'];
			$prix= $_POST['prix'];
			$update = "UPDATE `annonce` SET `nom_a`='$nom',`description_a`='$description',`prix_a`='$prix' WHERE `id_c_a` = $idc";
			$ff = $dbh->query($update);
			header("location: myannonce.php");
		}

		?>
		<form action="" method="post">
			<div class="container">
				<div style="text-align: center;">
					<h3>Partie modifier</h3>
					<hr>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="nom" value="<?= $d['nom_a'] ?>" name="nom" required>
					<br>
					<input type="text" class="form-control" placeholder="description" value="<?= $d['description_a'] ?>" name="description" required>
					<br>
					<input type="number" class="form-control" placeholder="Prix" value="<?= $d['prix_a'] ?>" name="prix" required>
					<br>
				</div>
				<input type="submit" class="btn btn-outline-warning" name="send">
				<a href="myannonce.php" class="btn btn-outline-success">< RETOUR</a>
			</div>
		</form>
		<?php
	}
}
if (isset($_GET['sup'])) {
	$ida  = (int)$_GET['sup'];
	$z =$_SESSION['client'];
	$idc = $z['0'];
	$verif = "SELECT * FROM annonce WHERE id_a = $ida AND id_c_a =$idc";
	$d = $dbh->query($verif)->fetch();
	if ($d == false) {
		header("location: myannonce.php");
	}
	else{
		$delet = "DELETE FROM `annonce` WHERE `id_a` = $ida AND `id_c_a`=$idc";
		$dbh->query($delet);
		header("location: myannonce.php");
	}
}

include 'inc/footer.php';
}
else{
	header("location: index.php");
}
?>