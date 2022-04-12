<?php 
include 'inc/header.php';
include 'bdd.php';
$masess = $_SESSION['client'];
$id = $masess['id_c'];

$res = "SELECT * FROM reservation WHERE id_client = $id";
$req = $dbh->query($res);

$i=0;

while ($ligne=$req->fetch(PDO::FETCH_ASSOC))
	{
		$id_salle[$i] = $ligne["id_salle"];
		$desc[$i] = $ligne['description'];
		$hdeb[$i] = $ligne['heure_debut'];
		$hfin[$i] = $ligne['heure_fin'];
		$date[$i] = $ligne['jour_resa'];
		$i++;
	}?>
<br>
<h3 class="text-center">Mes Réservations de salles</h3><br><hr><br><br>


<div class="row">
  
   
<?php
if (isset($_POST['submit'])) 
{
	$key = $_POST['key'];
	$delete="DELETE FROM reservation WHERE id_resa=$key";
    $sendDel = $dbh->query($delete);
	
}
for ($count=0; $count <$i; $count++) 
	{ ?>
		<div class="col-sm-4  ">
 			<div class="card w-30">
 				<div class="card-header" name="id_salle">Numéro de salle :<?php echo $id_salle[$count];?></div>
			<div class="card-body">
			<form method="POST" action="myresa.php">					  
								    <p class="card-text"><?php echo $desc[$count]; ?></p>
								    <p class="card-text">Heure de début :<?php echo $hdeb[$count]; ?></p>
								    <p class="card-text">Heure de fin :<?php echo $hfin[$count]; ?></p>
								    <p class="card-text">Date :<?php echo $date[$count]; ?></p>
								    <input type="hidden" name="key" value="<?=$count;?>">
								    <input type="submit" name="submit" class='btn btn-danger' value="Supprimer">
								    
			</form>					 
	</div>
	</div>
	</div><?php	
}?>
</div>
<br>


<?php



include 'inc/footer.php';
?>
