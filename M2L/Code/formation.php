 <?php
include 'inc/header.php';
include 'bdd.php';


if (isset($_GET['good']) == 1) {
?>
<div class="container alert-success"> 
	Vous êtes inscrit
</div>
<?php
header("Refresh: 5;url=formation.php");
}
if (isset($_GET['bad']) == 1) {
?>
<div class="container alert-danger"> 
	Vous vous êtes désinscrit
</div>
<?php
header("Refresh: 5;url=formation.php");
}
?>

<div class="container">
	<table class="table">
	  	<thead>
	  	<form method="POST" action="formation.php">
	    	<tr>
		      <th scope="col"><input class="btn btn-link" type="submit" name="name" value="Nom"></th>
		      <th scope="col"><input class="btn btn-link" type="submit" name="description" value="Description"></th></a>
		      <th scope="col">Lieu</th>
		      <th scope="col">Date de début</th>
		      <th scope="col">Date de fin</th>
		      <th scope="col"><input class="btn btn-link" type="submit" name="prix" value="Prix"></th></a>
		      <th scope="col">Organisateur</th>
			  <th scope="col">Participer</th>
	    	</tr>
	    </form>
	  	</thead>
	  	<tbody>
	  		<?php


$countformation = $dbh->query("SELECT COUNT(*) FROM `formation`")->fetchColumn(); 
if($countformation>0){
$formationparpage = 10;
$tt = $dbh->query('SELECT id_formation FROM formation');
$annoncetotal = $tt->rowCount();
$pagesTotales = ceil($annoncetotal/$formationparpage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
   $_GET['page'] = intval($_GET['page']);
   $pageCourante = $_GET['page'];
} else {
   $pageCourante = 1;
}
$depart = ($pageCourante-1)*$formationparpage;
		 			// $query="SELECT * FROM annonce ORDER BY id DESC LIMIT $depart,$annoncesparpage";
			if (isset($_POST['name'])) 
 {
    $query="SELECT id_formation,nom_formation,description_formation,prix_formation,lieu_formation,DATE_FORMAT(datdebu_formation, '%d/%m/%Y') as datdebu,DATE_FORMAT(datdefin_formation, '%d/%m/%Y') as datdefin,id_org_formation,organisateur.nom_organisateur FROM formation,organisateur where  formation.id_org_formation = organisateur.id_organisateur ORDER BY nom_formation asc";
    
    
 }
elseif (isset($_POST['description']))
 {
    $query="SELECT id_formation,nom_formation,description_formation,prix_formation,lieu_formation,DATE_FORMAT(datdebu_formation, '%d/%m/%Y') as datdebu,DATE_FORMAT(datdefin_formation, '%d/%m/%Y') as datdefin,id_org_formation,organisateur.nom_organisateur FROM formation,organisateur where  formation.id_org_formation = organisateur.id_organisateur ORDER BY description_formation asc";
   
 }
elseif (isset($_POST['prix'])) 
 {
    $query="SELECT id_formation,nom_formation,description_formation,prix_formation,lieu_formation,DATE_FORMAT(datdebu_formation, '%d/%m/%Y') as datdebu,DATE_FORMAT(datdefin_formation, '%d/%m/%Y') as datdefin,id_org_formation,organisateur.nom_organisateur FROM formation,organisateur where  formation.id_org_formation = organisateur.id_organisateur ORDER BY prix_formation asc";
    
 }
else 
 {
	$query = "SELECT id_formation,nom_formation,description_formation,prix_formation,lieu_formation,DATE_FORMAT(datdebu_formation, '%d/%m/%Y') as datdebu,DATE_FORMAT(datdefin_formation, '%d/%m/%Y') as datdefin,id_org_formation,organisateur.nom_organisateur FROM formation,organisateur where  formation.id_org_formation = organisateur.id_organisateur  ORDER BY id_formation DESC LIMIT $depart,$formationparpage ";
 }
 
	  		// var_dump($query);
	  		// die;
	  		 foreach  ($dbh->query($query) as $ligne) {
	  		 	// var_dump($ligne);
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
		      <?php if (isset($_SESSION['client'])) {
		      	$z = $_SESSION['client'];
				// $id = $z['id'];
		      	?>

			  <td><a class="btn btn-info" href="addf.php?par=<?php echo $id; ?>">Pariciper (<?php echo $cc; ?>)</a></td>
		      	<?php
		      }

		      else{
		      ?>
			  <td><div class="btn btn-info">Paricipant (<?php echo $cc; ?>)</div></td>
			<?php } ?>
<!-- addf.php?par=<?php echo $id; ?> -->
	    	</tr>
	    <?php }
	    ?>

			    	</div>

	   

		</tbody>
		<thfoote>
	    	<form method="POST" action="formation.php">
	    	<tr>
		      <th scope="col"><input class="btn btn-link" type="submit" name="name" value="Nom"></th>
		      <th scope="col"><input class="btn btn-link" type="submit" name="description" value="Description"></th></a>
		      <th scope="col">Lieu</th>
		      <th scope="col">Date de début</th>
		      <th scope="col">Date de fin</th>
		      <th scope="col"><input class="btn btn-link" type="submit" name="prix" value="Prix"></th></a>
		      <th scope="col">Organisateur</th>
			  <th scope="col">Participer</th>
	    	</tr>
	    </form>
	  	</thfoote>
	</table>
	<ul>
		<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
	<?php
	

	    for($i=1;$i<=$pagesTotales;$i++) {
         if($i == $pageCourante) {
         	?>
         	<li class="page-item">
         	<a class="page-link">

         	<?php
            echo $i.' ';
            ?>
        </a>
        </li>
        
            <?php
         } else {
            echo '<li class="page-item"><a class="page-link" href="formation.php?page='.$i.'">'.$i.'</a></li> ';
         }
      }
      ?>
      </ul>
</nav>
      <?php

			    	}

			    	else{
			    	?>
			    	
					<div class="row  bg-warning">
						<div class="col-12">
							<span class="text-center">
								<h4 class="">
									Désolé, il n'y a pas de formation pour l'instant.
								</h4>
							</span>
						</div>
					</div>
					<?php
				}
			?>
</div>
</form>
<?php


include 'inc/footer.php';
?>