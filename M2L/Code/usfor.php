r<?php
include 'inc/header.php';
include 'bdd.php';
if (isset($_SESSION['stat'])) {
$z = $_SESSION['stat'];
if (isset($_GET['cons'])) {
	// echo "consurlet";
	// consultee les personne
	$id = $_GET['cons'];
	// var_dump($id);

	?>
	<div class="container">
	<table class="table">
	  	<thead>
	    	<tr>
		      <th scope="col">Nom</th>
		      <th scope="col">Prenom</th>
		      <th scope="col">Date de naissance</th>
		      <th scope="col">Mail</th>
		      <th scope="col">Téléphone</th>
	    	</tr>
	  	</thead>
	  	<tbody>
	<?php
	$idconte="SELECT count(id) FROM participants WHERE  id_formation=$id";
	$count = $dbh->query($idconte)->fetchColumn();
	if ($count>0) {

	$idd="SELECT id FROM participants WHERE  id_formation=$id";
	$p = $dbh->query($idd)->fetch();
	// var_dump($p);
	$idc= $p['id'];
	$conslter="SELECT * FROM client WHERE id =$idc";
	// var_dump($conslter);
	foreach  ($dbh->query($conslter) as $ligne) {
	// var_dump($ligne);
	/*	$dateas = $ligne['datenais'];
				$datea = date('Y-m-d');
				$resutt =  $datea - $dateas;*/
		?>
		<tr>
			<td>
				<?php echo $ligne['nom']; ?>
			</td>
			<td>
				<?php echo $ligne['prenom']; ?>
			</td>
			<td>
				<?php
				$dateas = $ligne['datenais'];
				echo $dateas;
				// var_dump($resutt);
				// var_dump($datea);
				?>
			</td>
			<td>
				<a class="btn" href="mailto:<?php echo $ligne['mail']; ?>"> 
				<?php echo $ligne['mail']; ?></a>
			</td>
			<td>
				<a class="btn" href="tel:<?php echo $ligne['tel']; ?>"><?php echo $ligne['tel']; ?></a>
			</td>
		</tr>
		<?php
	}
}

	?>

	</tbody>
</table>
<a href="usform.php" class="btn btn-outline-info">< Retour</a>
	<?php
}
if (isset($_GET['mod'])) {
	// echo "mod";
	// modifier l'annonce
$id = $_GET['mod'];
// var_dump($id);
// die;
$mod="SELECT * FROM formation WHERE id_formation =$id";
$g = $dbh->query($mod)->fetch();
// var_dump($g);
// echo $g['2'];
if (isset($_POST['sended'])) {
	// echo "good";
	// var_dump($_POST);
	$a= $_POST['nom'];
	$b= $_POST['desription'];
	$c = $_POST['lieux'];
	$d = $_POST['prix'];
	$e = $_POST['datedebu'];
	$f = $_POST['datefin'];
	$up="UPDATE `formation` SET `nom_formation`='$a',`description_formation`='$b',`lieu_formation`='$c',`datdebu_formation`='$e',`datdefin_formation`='$f',`prix_formation`='$d' WHERE `formation`.`id_formation`=$id";
	$dbh->query($up);
	?>
	
		<div class="alert-success">
			<p>
				Vous avez bien modifié votre annonce.
				
			</p>
		</div>
	
	<?php
	// var_dump($up);
}
		?>
		<div class="container">
<form method="POST" action="">
		  <div class="form-group">
		    <input type="text" class="form-control" id="inputAddress" value="<?php echo $g['1']; ?>" name="nom" required="true">
		  </div>
		  <div class="form-group">
		    <input type="text" name="desription" value="<?php echo $g['2']; ?>" class="form-control" required="true">
		  </div>
		  <div class="form-group">
		  	
		  </div>

		  <div class="form-group col">
		      <input type="text" class="form-control" id="inputprix" value="<?php echo $g['3']; ?>" name="lieux">
		    </div>
		  <div class="form-group col">
		      <input type="text" class="form-control" id="inputprix" value="<?php echo $g['6']; ?>" name="prix">
		    </div>
		<div class="row">
		  <div class="form-group col">
		      <input type="date" class="form-control" id="inputprix" value="<?php echo $g['4']; ?>" name="datedebu">
		    </div>
		
		  <div class="form-group col">
		      <input type="date" class="form-control" id="inputprix" value="<?php echo $g['5']; ?>" name="datefin">
		    </div>
		  </div>

</div>

		<!-- 		  <div class="form-group">
		    <label for="exampleFormControlFile1">une photo</label>
		    <input type="file" class="form-control-file" id="file">
		  </div> -->
		  
		  <button type="submit" class="btn btn-success" name="sended">Modifier</button>
</form>
</div>
 <?php

}
elseif (isset($_GET['suppp'])) {
$id = $_GET['suppp'];
$sup = "DELETE FROM `formation` WHERE `id_formation`= $id";
$dbh->query($sup);
// var_dump($sup);
// die;
header("location:usform.php?sucess=1");
}


}
else{
	header('location:index.php');
}
include 'inc/footer.php';
?>