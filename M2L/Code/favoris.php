<?php 
include 'inc/header.php';
include 'bdd.php';
if (isset($_SESSION['client'])) {
	
}
else{
	$idkoci = $_COOKIE['PHPSESSID'];
	?>
	<div class="container">
	<div class="row">
	<?php
	$countAnnonce = $dbh->query("SELECT COUNT(*) FROM `like_nc`")->fetchColumn(); 
	if($countAnnonce>0){
	$annoncesparpage = 10;
	$totalreqannonce = $dbh->query('SELECT id_l FROM like_nc');
	$annoncetotal = $totalreqannonce->rowCount();
	$pagesTotales = ceil($annoncetotal/$annoncesparpage);
	if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
	   $_GET['page'] = intval($_GET['page']);
	   $pageCourante = $_GET['page'];
	} else {
	   $pageCourante = 1;
	}
	$depart = ($pageCourante-1)*$annoncesparpage;
			 			$query="SELECT * FROM like_nc ORDER BY id_l DESC LIMIT $depart,$annoncesparpage"; 
			 			?>
			<div class="container">
				    <div class="row">										
				    <?php
				    foreach  ($dbh->query($query) as $ligne) {
				    	$nban = $ligne['id_a_l'];
				    					$qe="SELECT * FROM annonce WHERE id_a = $nban ORDER BY id_a DESC LIMIT $depart,$annoncesparpage "; 
				    					foreach ($dbh->query($qe) as $liker) {
				    						?>
				    						<div class="col-6 my-2 p-2">
				    								<div class="card-body">
				    													    <h5 class="card-title"><?php echo $liker["nom_a"]; ?></h5>
				    													    <!-- <img src="<?= $ligne['image'] ?>" style="width: 250px;height: 150px;"> -->
				    													    <p class="card-text"><?php echo $liker["description_a"]; ?>.</p>
				    													    <p class="card-text"><?php echo number_format($liker["prix_a"],0,',',' '); ?>€</p>
				    													    <?php 
				    													    $idann = $liker['id_a'];
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
				    													    <a href="annonce.php?id=<?php echo $liker["id_a"] ?>" class="btn btn-primary">Consulter</a>

				    						</div>
				    						</div>						
	<?php
	}
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
	            echo '<li class="page-item"><a class="page-link" href="favoris.php?page='.$i.'">'.$i.'</a></li> ';
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
										Vos avez pas eu encore de coup de coeur
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
	<!-- $se = "SELECT * FROM `like_nc` WHERE `idcokie_l`" -->
<?php
}
include 'inc/footer.php';
 ?>