 <?php
// session_start();
include 'inc/header.php';
include 'bdd.php';
$z = $_SESSION['client'];
$idc = $z['id_c'];
$id = $_GET['par'];

if (isset($_GET['oui'])) {
$insert="INSERT INTO `participants` (`id_formation`, `id`) VALUES ('$id', '$idc');";
$dbh->query($insert);
var_dump($insert);
// die;
header("location:formation.php?par=$id&&good=1");
// }
// if (isset($_GET['good'])) {
//         ?><br><br>
 <!--         <div class="container alert-success"> 
//                 vous etes inscrit
//         </div>
//  -->        <?php

//     header("Refresh: 5;url=formation.php");
}
if (isset($_GET['sup'])) {
$suprime = "DELETE FROM `participants` WHERE `id`=$idc AND `id_formation`=$id";
$dbh->query($suprime);
header("location:formation.php?par=$id&&bad=1");
}
if (isset($_GET['erreur'])) {
    ?>
    <div class="container alert-danger">   
        <p> 
        Erreur
    </p>
    </div>
    <?php
}
$query = "SELECT id_formation,nom_formation,description_formation,prix_formation,nom_organisateur,lieu_formation,DATE_FORMAT(datdebu_formation, '%d/%m/%Y') as datdebu,DATE_FORMAT(datdefin_formation, '%d/%m/%Y') as datdefin FROM formation,organisateur WHERE id_formation = $id";

// $ligne = $dbh->query($query)->fetch();
?><br><br>
<div class="container">
<div class="row">
	<?php 
	// var_dump($query);
	$ligne = $dbh->query($query)->fetch();
		// var_dump($ligne);
		?>
    <div class="col">   
        
    <p>
        Voulez vous nous rejoindre dans la formation:  <?php echo $ligne['nom_formation']; ?> où  <?php echo $ligne['description_formation']; ?> <br>
        Pour un prix de <?php echo $ligne['prix_formation'] ?> €
        <br>
        Qui se passera à <?php echo $ligne['lieu_formation']; ?> ,qui commencera le <?php echo $ligne['datdebu']; ?> et finira le <?php echo $ligne['datdefin']; ?>
        <br>
        Cordialement <?php echo $ligne['nom_organisateur']; ?>
    </p>
    </div>

    <div class="col">  
        <p>
    Voulez vous nous rejoindre ?
    <hr>
    <?php 
    $z = $_SESSION['client'];
	$idc = $z['id_c'];
    $t = "SELECT count(*) FROM `participants` WHERE `id`= $idc AND `id_formation`=$id";
    $ts=$dbh->query($t)->fetchColumn();
    if ($ts>0) {
    	?>
    	<div class="alert">
    		<div class="row">
    		<p>
    			<div class="col">
    			Vous êtes déjà incrit</div>
				<div class="col">Voulez vous vous retirez ?</div>
			</p>
				<div class="col">	<a class="btn btn-outline-danger" href="addf.php?par=<?= $id ?>&&sup">Supprimer</a>
    	</div>
		</div>
    	</div>

    	<?php
    }else{
    
    
    $z = $_SESSION['client'];
    $idc = $z['id_c'];
    
    if (isset($_GET['oo'])) {
        $ins="INSERT INTO `blackliste_formation`(`id_client`, `id_formation`) VALUES ($idc,$id)";
        $dbh->query($ins);
        ?>
        <p>Vous ne pouvez pas vous enregristrer</p>
        <?php
    }
    $count="SELECT count(*) FROM blackliste_formation WHERE id_client_b = $idc AND id_emploi_b=$id";
    $counte = $dbh->query($count)->fetchColumn();
    if($counte>0) {
        ?>
        <p>
            vous ne pouvez pas vous enregistrer
        </p>
        <?php
    }
    else{
     ?>
    
    <a class="btn btn-outline-success" href="qcm.php?idf=<?= $ligne['id_formation'] ?>">OUI</a>
    <?php 

    }
    }
     ?>
    </p>
    <a class="btn btn-outline-warning" href="formation.php">< Retour</a>
    </div>
</div>
</div><br><br>
<?php

include 'inc/footer.php';
?>