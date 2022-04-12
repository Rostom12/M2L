<?php
include 'inc/header.php';
include 'bdd.php';
        $idf = $_GET['idf'];
    	$total = 0;
    	?>
        <div class="container">
            <h1>
         Liste des questions ou vous avez des erreurs
        </h1>
        <hr>
        </div>
        <?php

    	foreach ($_POST as $cle => $val) 
    	{
    		$req = "select verite from reponses where idr = $val";
    		$ligne = $dbh->query($req)->fetch();
    		// $ligne = mysqli_fetch_assoc($res);
    		if($ligne["verite"]==1)
    		{
    			$total +=2;
    		}
    	else{
    		$req2 = "select * from questions where idq = $cle";
    		$ligne2 = $dbh->query($req2)->fetch();
    		// $ligne2 = mysqli_fetch_assoc($res2);
    		?>
            <div class="container">
            <div class="row">
             <div class="col">
             <h3 class='erreur'>
                <?= $ligne2["libelleq"] ?>
            </h3>
            </div>
            <?php
    		$req3 = "select * from reponses where idq=$cle and verite=1";
    		$ligne3 = $dbh->query($req3)->fetch();
    		// $ligne3 = mysqli_fetch_assoc($res3);
    		?>
            <div class="col">
             <h5>
                Il fallait répondre : <?= $ligne3["libeller"] ?>
            </h5>
            </div>
        </div>
    </div>
            <?php
      }
  }?>
  <hr>
  <div class="container">
  <div class="row">
    <div class="col">
    <h4>
       Votre resultat : <?= $total ?> / 20
    </h4>
    </div>
    <div class="col">
    <a href="qcm.php?idf=<?= $idf ?>" class="btn">
        <img src="img/refrech.png" width="25%">
    <!-- réessayer -->
    </a>
    </div>

  <?php
  if ($total >=8 AND $total < 20) {
?>
<div class="col">
    <a href="addf.php?oui&&par=<?= $idf ?>" class="btn btn-success">Valider</a>
</div>
<?php
  }
  if ($total >0 AND $total < 8) {
    ?>
    <div class="col">
        
    <a href="addf.php?oo&&par=<?= $idf ?>" class="btn btn-success">Valider</a>
    </div>
    <?php
  }
  ?>
  </div>
</div>
  <?php
  include 'inc/footer.php';
  ?>