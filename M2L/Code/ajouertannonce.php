<?php 
include 'inc/header.php';
if (isset($_SESSION['client'])) {
include 'bdd.php';
if (isset($_POST['send'])) {
	if (empty($_POST['nom']) AND empty($_POST['description']) AND empty($_POST['prix'])) {
		header("location: ajouertannonce.php");
	}
	else{
		$z = $_SESSION['client'];
		$idc = $z['0'];
		$nom = $_POST['nom'];
		$description = $_POST['description'];
		$prix = $_POST['prix'];
		$insere = "
		INSERT INTO `annonce`(`nom_a`, `description_a`, `prix_a`, `id_c_a`, `timer_a`) VALUES ('$nom','description','$prix','$idc',current_timestamp())";
		$ss = $dbh->query($insere);
		header("location:annonces.php");
	}
}
?>
<div style="text-align: center;">
	<i>
		<h1>Ajouter une annonces sur notre plateforme</h1>
	</i>
</div>
<br>
<div class="container">
	<form action="" method="post">
		<div class="form-group">
			<input type="text" class="form-control" name="nom" placeholder="Nom" required>
			<br>
			<input type="text" class="form-control" name="description" placeholder="Description" required>
			<br>
			<input type="number" class="form-control" name="prix" placeholder="Prix" required>
		</div>
		<input type="submit" class="btn btn-outline-success" name="send">
	</form>
</div>
<?php
include 'inc/footer.php';
}
else{
header("location:index.php");
 }?>
