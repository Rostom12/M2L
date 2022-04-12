<?php
include 'inc/header.php';
include 'bdd.php';
if (isset($_SESSION['stat'])) {


$z = $_SESSION['stat'];
//$id = $z['id_c'];
if (isset($_GET['sup'])) {
$ids = $_GET['sup'];
$suprime = "DELETE FROM message WHERE id_m = $ids";
$dbh->query($suprime);
?>
<div class="alert">
	
</div>
<!-- <div class="container">
	<div class="alert">
		<form action="" method="POST">
			<p>
				Voulez vous supprimez votre formation
			</p>
			<input type="submit" class="btn btn-outline-warning" value="oui" name="oui">
			<input type="submit" value="non" class="btn btn-outline-success" name="non">
		</form>
	</div>
</div>
 --><?php
}
?>
<div class="container">
	<table class="table">
	  	<thead>
	    	<tr>
		      <th scope="col">Nom</th>
		      <th scope="col">Prenom</th>
		      <th scope="col">mail</th>
		      <th scope="col">Telephone</th>
		      <th scope="col">message</th>
			  <th>Suprimer</th>
	    	</tr>
	  	</thead>
	  	<tbody>
	  		<?php
	  		$query = "SELECT * FROM message";
	  		// var_dump($query);
	  		// die;
	  		 foreach  ($dbh->query($query) as $ligne) {
	  		 	// var_dump($ligne);
			    ?>
	    	<tr>
		      <td><?php echo $ligne["nom_m"]; ?></td>
		      <td><?php echo $ligne["prenom_m"]; ?></td>
		      <td><a class="btn" href="mailto:<?php echo $ligne['mail_m']; ?>"><?php echo $ligne['mail_m']; ?></a></td>
		      <td><a class="btn" href="tel:<?php echo $ligne['tel_m']; ?>"><?php echo $ligne['tel_m']; ?></a></td>
		      <td><?php echo $ligne["message_m"]; ?></td>
			  <td><a class="btn btn-danger" href="lmes.php?sup=<?php echo $ligne['id_m']; ?>">Supprimer</a></td>
	    	</tr>
	    <?php }
	    ?>

		</tbody>
	</table>
</div>
<?php
}

else{
	header("location:index.php");
}
include 'inc/footer.php';
?>