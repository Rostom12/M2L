 <?php
include 'inc/header.php';
include 'bdd.php';

$z = $_SESSION['stat'];
// on recupere l'id le l'utilisateur
$id = $z['id_organisateur'];
// cons -> pour voir les partisipant
if(isset($_GET['cons']))
{
$idc = $_GET['cons'];
var_dump($idc);
header("location:usfor.php?cons=$idc");
}
// mod -> modifier
elseif (isset($_GET['mod'])) {
	
$idm = $_GET['mod'];
var_dump($idc);
header("location:usfor.php?mod=$idm");
}

else{
	if (isset($_GET['sucess']) == 1) {
	?>
	<div class="container">
		<div class="alert-danger">
			<p>
				Votre formation a bien été supprimer
			</p>
		</div>
	</div>
		<?php
}
if (isset($_GET['sup'])) {
$ids = $_GET['sup'];

if (isset($_POST['oui'])) {
	header("location:usfor.php?suppp=$ids");
}
if (isset($_POST['non'])) {
	header("location:usform.php");
}
?>
<div class="container">
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
<?php
}
?>
<div class="container">
	<table class="table">
	  	<thead>
	    	<tr>
		      <th scope="col">Nom</th>
		      <th scope="col">Description</th>
		      <th scope="col">Lieu</th>
		      <th scope="col">Date de debut</th>
		      <th scope="col">Date de fin</th>
		      <th scope="col">Prix</th>
		      <th scope="col">Organisateur</th>
			  <th scope="col" >Participer</th>
			  <th scope="col" >Modifier</th>
			  <th>Suprimer</th>
	    	</tr>
	  	</thead>
	  	<tbody>
	  		<?php
	  		$query = "SELECT id_formation,nom_formation,description_formation,prix_formation,lieu_formation,DATE_FORMAT(datdebu_formation, '%d/%m/%Y') as datdebu,DATE_FORMAT(datdefin_formation, '%d/%m/%Y') as datdefin,formation.id_org_formation,organisateur.nom_organisateur FROM formation,organisateur  where  formation.id_org_formation = organisateur.id_organisateur AND id_org_formation = $id ORDER BY id_formation DESC ";
	  		// var_dump($query);
	  		// die;
	  		 foreach  ($dbh->query($query) as $ligne) {
	  		 	$id = $ligne["id_formation"];
	  		 		$c="SELECT count(*) FROM participants where id_formation = $id";
	  		 		
	  		 		$cc = $dbh->query($c)->fetchColumn();
			    						//Affiche une carte
			    						?>
	    	<tr>
		      <td><?php echo $ligne["nom_formation"]; ?></td>
		      <td><?php echo $ligne["description_formation"]; ?></td>
		      <td><?php echo $ligne["lieu_formation"]; ?></td>
		      <td><?php echo $ligne["datdebu"]; ?></td>
		      <td><?php echo $ligne["datdefin"]; ?></td>
		      <td><?php echo $ligne["prix_formation"]; ?> €</td>
		      <td><?php echo $ligne["nom_organisateur"]; ?></td>
			  <td><a class="btn btn-info" href="usfor.php?cons=<?php echo $id; ?>">Voir les participants (<?php echo $cc; ?>)</a></td>
			  <td><a class="btn btn-dark" href="usfor.php?mod=<?php echo $id; ?>">Modifier</a></td>
			  <td><a class="btn btn-danger" href="usform.php?sup=<?php echo $id; ?>">Supprimer</a></td>
	    	</tr>
	    <?php }
	    ?>

		</tbody>
	</table>
</div>
<?php
}
include 'inc/footer.php';
?>