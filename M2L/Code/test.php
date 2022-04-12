<?php 
include 'inc/header.php';
include 'bdd.php';?>


<?php 
include 'inc/header.php';
include 'bdd.php';
//$test = new PDO("mysql:host=localhost;dbname=newm2l;charset=utf8",'root','root');
$req = "SELECT * FROM salle";
$reqe = $dbh->query($req);
$i=0;

while ($ligne=$reqe->fetch(PDO::FETCH_ASSOC))
				{
					$table[$i]=$ligne["nom_salle"];
					$id[$i]=$ligne["id_salle"];
					$i++;
				}
?>
<br>
<div class="position-relative" style="left:1000px" >
                   <form class="form-inline my-2 my-lg-0" method="POST" action="reservation.php">
      <input class="form-control mr-sm-2" type="date" name="date" placeholder="Search" aria-label="Search">
      <input class="btn btn-outline-success my-2 my-sm-0" type="submit"  value="Afficher les disponibilitées"></input>
    </form>
                  </div><br><br>
                  <?php
$date = $_POST['date'];

?>
<div class="col">
	<table class="table table-bordered">
		<thead class="thead-dark">
			<tr>
				<th >Horaires</th>
				<?php 
				
				for ($count=0; $count < $i ; $count++) 
				{?>
					<th><?=$table[$count];?></th>
					<?php

				}?>
			</tr>
			<?php 
				for ($plage=8; $plage <20 ; $plage=$plage + 2) { ?>
					<tr>
						<th><?=$plage;?>/<?=$plage+2;?></th>
						<?php
				}?>

			
			












<?php

include 'inc/footer.php';
?>
