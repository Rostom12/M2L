<?php 
include 'inc/header.php';
include 'bdd.php';
if (!isset($_SESSION['client'])) {
	$idkoci = $_COOKIE['PHPSESSID'];
}
elseif (isset($_SESSION['client'])) {
	$z =$_SESSION['client'];
	$idc = $z['0'];
}
	if (isset($_GET['like'])) {
		$ida = $_GET['like'];
		if (!isset($_SESSION['client'])) {
					$ins="INSERT INTO `like_nc`(`idcokie_l`, `id_a_l`, `timer_l`) VALUES ('$idkoci',$ida,current_timestamp())";
				}
				else{
					$ins="INSERT INTO `like_c`(`id_c_l_c`, `id_a_l_c`, `timer_l_c`) VALUES ($idc,$ida,current_timestamp())";
				}
				$rr = $dbh->query($ins);
				header("location: annonces.php");	
	}
	if (isset($_GET['nolike'])) {
		$ida = $_GET['nolike'];
		if (!isset($_SESSION['client'])) {
					$ins="DELETE FROM `like_nc` WHERE `idcokie_l` = '$idkoci' AND `id_a_l` =$ida";
				}
				else{
					$ins="DELETE FROM `like_c` WHERE `id_c_l_c` =$idc AND `id_a_l_c` =$ida";
				}
				$rr = $dbh->query($ins);
				/*var_dump($rr);
				die();*/
				header("location: annonces.php");	
	}
?>
<div class="container">
<div class="row">
<?php
$countAnnonce = $dbh->query("SELECT COUNT(*) FROM `annonce`")->fetchColumn(); 
if($countAnnonce>0){
$annoncesparpage = 10;
$totalreqannonce = $dbh->query('SELECT id_a FROM annonce');
$annoncetotal = $totalreqannonce->rowCount();
$pagesTotales = ceil($annoncetotal/$annoncesparpage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
   $_GET['page'] = intval($_GET['page']);
   $pageCourante = $_GET['page'];
} else {
   $pageCourante = 1;
}
$depart = ($pageCourante-1)*$annoncesparpage;
		 			$query="SELECT * FROM annonce ORDER BY id_a DESC LIMIT $depart,$annoncesparpage";
			 												
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
							    <p class="card-text"><?php echo $ligne["description_a"]; ?>.</p>
							    <p class="card-text"><?php echo number_format($ligne["prix_a"],0,',',' '); ?>€</p>
							    <?php 
							    $idann = $ligne['id_a'];
							    if (isset($_SESSION['client'])) {
							    	
							    	$an = "SELECT count(*) FROM `like_c` WHERE `id_a_l_c` = $idann AND `id_c_l_c` = $idc";
							    }
							    else{
							    	$an ="SELECT count(*) FROM `like_nc` WHERE `idcokie_l`='$idkoci' AND `id_a_l` =$idann";
							  }
							    $likecount = $dbh->query($an)->fetch();
							    // var_dump($likecount);
							    if ($likecount['0'] == 0) {
							    	?>
							    	<a href="annonces.php?like=<?= $idann ?>" class="btn"><i class="far fa-heart"></i></a>
							    	<?php
							    }
							    else{
							    ?>
							    <a href="annonces.php?nolike=<?= $idann ?>" class="btn"><i class="fas fa-heart"></i></a>
							<?php } ?>
							    <a href="annonce.php?id=<?php echo $ligne["id_a"] ?>" class="btn btn-primary">Consulter</a>

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
									Désolé, il n'y a pas d'annonces.
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
?>