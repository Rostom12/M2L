<?php 
include 'inc/header.php';
include 'bdd.php';
if (isset($_GET["succes"])==1) {?>
	<div class="container">
  <div class="alert-success">
    <p>
      Votre réservation à bien était prise en compte.s
    </p>
  </div>
  </div> <?php
}?>
<?php

$req = "SELECT * FROM salle";
$req2 = "SELECT * FROM reservations";
$reqe = $dbh->query($req);
$reqe2 = $dbh->query($req2);
$i=0;



while ($ligne=$reqe->fetch(PDO::FETCH_ASSOC))
				{
					$table[$i]=$ligne["nom_salle"];
					$table2[$i]=$ligne["id_salle"];
					$i++;
				}

if (isset($_POST['submit']))
	{
	    $date = $_POST['date'];
	}

else
	{
	    $date = date('yy-m-d');
	}


?>
<br>
<div class="nav justify-content-end" >
                   <form class="form-inline my-3 my-lg-1" method="POST" action="reservation2.php">
      <input class="form-control mr-sm-1" type="date" name='date' value='<?=$date?>'  placeholder="Search" aria-label="Search">
      <input class="btn btn-outline-success my-4 my-sm-0" type="submit" name="submit"  value="Afficher les disponibilitées"></input>
    </form>
                  </div><br><br>
                 
<div class="col">
	<table class="table table-bordered">
		<thead class="thead-dark">
			<tr>

				<th >Horaires</th>
				<?php 
				
				for ($count=0; $count < $i ; $count++) 
				{?>
					<th value = $table><?=$table[$count];?></th>
					<?php

				}?>
			</tr>
			<?php 
				for ($plage=8; $plage <20 ; $plage=$plage + 2) 
					{ ?>
					<tr>
						<th><?=$plage;?>H/<?=$plage+2;?>H</th>
						<?php
						
						for ($count=0; $count < $i; $count++) 
						{ ?>
							<td>
								<?php

								
								$id_salle = $table2[$count];
								$plage2 = $plage + 2;
								$timestamp = strtotime(''.$plage2.':00'.':00');
								
								$req = $dbh->query("SELECT * FROM reservation r,salle s  WHERE r.id_salle=s.id_salle AND r.heure_debut = '$plage:00:00' AND r.heure_fin = '$plage2:00:00' AND r.jour_resa = '$date' AND s.nom_salle='$table[$count]'");
								
								
								//die();
								$ligne=$req->fetch(PDO::FETCH_ASSOC);
								$salle1 = $ligne['id_salle'] ?? ''; // default: empty string

								
									if ($salle1=='') 
									{?>

								<?php echo"Disponible"?><?php
									}
									else
									{
										echo $ligne['description'];
										echo "<br>";						
									}?>
								
							</td><?php	
							
						}
					}?>
		
					</tr>
		</thead>
	</table>
</div>


<?php
include 'inc/footer.php';
?>
