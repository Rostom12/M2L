<?php 
include 'inc/header.php';
if (isset($_SESSION['client'])) 
{
	include 'bdd.php';
	$z =$_SESSION['client'];
	$idc = $z['0'];
	?>
	<div class="container">
	<div class="row">
	<?php
	$countAnnonce = $dbh->query("SELECT COUNT(*) FROM `annonce` WHERE id_c_a = $idc")->fetchColumn(); 
	if($countAnnonce>0){
	$annoncesparpage = 10;
	$totalreqannonce = $dbh->query("SELECT id_a FROM annonce WHERE id_c_a = $idc");
	$annoncetotal = $totalreqannonce->rowCount();
	$pagesTotales = ceil($annoncetotal/$annoncesparpage);
	if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
	   $_GET['page'] = intval($_GET['page']);
	   $pageCourante = $_GET['page'];
	} else {
	   $pageCourante = 1;
	}
	$depart = ($pageCourante-1)*$annoncesparpage;
			 			$query="SELECT * FROM annonce WHERE id_c_a=$idc ORDER BY id_a DESC LIMIT $depart,$annoncesparpage";
				 												
			     if (isset($_SESSION['stat'])) { 
			     	 if (isset($_GET['good'])) {
				?>
				<div class="card card-body bg-danger">
					<h5 class="font-weight">Cette annonces a bien ete signaler</h5>
				</div>
			</div>
				<?php
			} 
		} ?>
			<div class="container">
				    <div class="row">
				    											
				    <?php
				    //Foreach parcours le tableau; il va faire ligne par ligne et la ligne s'appel $ligne.
				    foreach  ($dbh->query($query) as $ligne) {
				    						//Affiche une carte
				    						?>

	<div class="col-6 my-2 p-2">
			<div class="card-body">
								    <h5 class="card-title"><?php echo $ligne["nom_a"]; ?></h5>
								    <!-- <img src="<?= $ligne['image'] ?>" style="width: 250px;height: 150px;"> -->
								    <p class="card-text"><?php echo $ligne["description_a"]; ?></p>
								    <p class="card-text"><?php echo number_format($ligne["prix_a"],0,',',' '); ?>€</p>
								    <a href="tm.php?mod=<?php echo $ligne["id_a"] ?>" class="btn btn-outline-warning">Modifier</a>
								    <a href="tm.php?sup=<?php echo $ligne["id_a"] ?>" class="btn btn-outline-danger">Suprimer</a>

	</div>
	</div>							
	<?php
	}

	?>
	</div>
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
	            <?php
	         } else {
	            echo '<li class="page-item"><a class="page-link" href="annonces.php?page='.$i.'">'.$i.'</a></li> ';
	         }
	      }
	      ?>
	      </ul>
	</nav>
	      <?php

				    	}
				    	else{
				    	?>
				    	</div>
				    									</div>
				    	
						<div class="row  bg-warning">
							<div class="col-12">
								<span class="text-center">
									<h4 class="">
										Vous avez mis aucune annonce
									</h4>
								</span>
							</div>
						</div>
						<?php
					}
				?>
			</div>
		</div>
		
	</div>
	<?php
	include 'inc/footer.php';	
}
else
{
header("location: index.php");
}
?>