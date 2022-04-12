<?php 
include 'inc/header.php';
include 'bdd.php';

$masess = $_SESSION['client'];

$nom = $masess['nom_c'];
$prenom = $masess['prenom_c'];
$id = $masess['id_c'];
$date = isset($_GET['date']);
$heured =isset( $_GET['heured']);
$heuref = isset($_GET['heuref']);
$salle = isset($_GET['salle']);

echo '<script language="Javascript">
  console.log($salle)
		<!--
		document.location.replace("reservation.php");
		// -->
		</script>';


//$desc = $_POST['description'];


?><br>
<center>
<h3>Confirmation de réservation de la salle</h3></center><br><br>
<div class="form-group p-3 border bg-light">
<form method="POST" action="res_salle.php">


                <div class="form-row">
                    <div class="form-group col-1 col px-md-2">
                      <label for="nom">Nom*</label>
                      <input type="text" value="<?= $nom ?>" class="form-control" name="nom" id="nom" required="true">
                    </div>
                    <div class="form-group col-auto">
                      <label for="prenom">Prénom*</label>
                      <input type="text" value="<?= $prenom ?>" class="form-control" id="prenom" required="true">
                    </div>
                    <div class="form-group col-auto">
                      <label for="prenom">Date</label>
                      <input type="text" value="<?= $date ?>" class="form-control" name="date" id="date">
                    </div>
                    <div class="form-group col-auto">
                      <label for="prenom">Heure de début</label>
                      <input type="text" value="<?= $heured ?>" class="form-control" name="heured" id="heured">
                    </div>
                    <div class="form-group col-auto">
                      <label for="prenom">Heure de fin</label>
                      <input type="text" value="<?= $heuref ?>" class="form-control" name="heuref" id="heuref">
                    </div>
                  </div>
                <div class="row">
                  
                <div class="col-3">
                    <label for="inputState">Description*</label>
                    <input type="text" class="form-control" name="description" id="description" required="true">
                  </div>
                 <div class="col-3">
                    <label for="inputState">Numéro de la salle</label>
                    <input type="text" class="form-control" name="salle" id="salle" value="<?=$salle;?>">
                  </div>
                </div> <br><br>
                <div class="col">
                        <button name="submits" type="submit" class="btn btn-primary">Réserver</button>
                      </div> 
                 
               </div>
           </form>
        </div>




<?php

if (isset($_POST['submits']))
 {
	$desc = isset($_POST['description']);
 	$date = isset($_POST['date']);
	$heured = isset($_POST['heured']);
	$heuref = isset($_POST['heuref']);
	$salle = isset($_POST['salle']);
  $id_reser=random_int(13,1000);

  echo '<script language="Javascript">
  console.log("testtesttesttesttesttesttesttest")
  console.log($salle)
		<!--
		document.location.replace("reservation.php");
		// -->
		</script>';

	$req = "INSERT INTO `reservation` (`id_resa`,`id_salle`, `id_client`, `description`, `heure_debut`, `heure_fin`, `jour_resa`) VALUES ($id_reser,$salle, $id, $desc,	$heured, 	$heuref, $date)";
	
	$res = $dbh->query($req);
	
  echo '<script language="Javascript">
  console.log($salle)
		<!--
		document.location.replace("reservation.php");
		// -->
		</script>';

}

?>


<?php

include 'inc/footer.php';
?>
