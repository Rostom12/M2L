<?php
include("inc/header.php");
include("bdd.php");
		//	var_dump($_SESSION['stat']);
		$z = $_SESSION['client'];
		$id = $z["id_c"];
		
		if (isset($_GET['sucess']) && $_GET['sucess']==1) {
				?> 
				<div class="row">
					<div class="col">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
						  <strong>Vous modifier votre profile!</strong>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
					</div>
				</div>
				<?php
			} 
			if (isset($_GET['prienconte'])) {
				?>
				<div class="row">
					<div class="col">
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
						  <strong>La suppression du compte se fera dans les plus bref délais</strong>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
					</div>
				</div>
				<?php
			}
?>
<div class="container">
	<div class="row">
		<div class="col-8">
			<?php
			$r = "SELECT * FROM client WHERE id_c = $id";
			$r = $dbh->query($r)->fetch();
			// var_dump($r);
			 	//Recupere toute les annonces
			    $query="SELECT * FROM `client` WHERE id_c = $id ORDER BY id_c DESC  ";
			    //Foreach parcours le tableau; il va faire ligne par ligne et la ligne s'appel $ligne.
			    $nn = $dbh->query($query);
			    foreach ($nn as $ligne) {   						?>
			    <form method="post" action="addTraitement.php">
		  <div class="form-row">
		    
		    <div class="form-group col-md-4">
		      <label for="inputPassword4">Nom : </label>
		      <?php echo $r['nom_c']; ?>
		    	<a href='my.php?nom=<?php echo $id; ?>' class='btn btn-info' style="width:185px;" style="height:55px;">Modifier</a>
		    </div>
		    <div class="form-group col-md-4">
		      <label for="inputEmai">Prénom : </label>
		      <?php echo $r['prenom_c']; ?>
		    	<a href='my.php?prenom=<?php echo $id; ?>' class='btn btn-info' style="width:185px;" style="height:55px;">Modifier</a>
		    </div>
		    <div class="form-group col-md-4">
		      <label for="inputEmai">Mot de passe : </label>
		    	<a href='my.php?mp=<?php echo $id; ?>' class='btn btn-info' style="width:185px;" style="height:55px;">Modifier</a>
		    	<br/>
		    	<a href='rec.php' class='btn btn-danger' style="width:185px;" style="height:55px;">Mot de passe oublié ?</a>		      
		    </div>
		    
		  </div>
		  <div class="form-row">
		    <div class="form-group col-md-4">
		      <label for="inputState">Téléphone :</label>
		      <?php echo $r['tel_c']; ?>
		    	<a href='my.php?tel=<?php echo $id; ?>' class='btn btn-info' style="width:185px;" style="height:55px;">Modifier</a>
		    </div>
		    <div class="form-group col-md-4">
		      <label for="inputState">Mail :</label>
		      <?php echo $r['mail_c']; ?>
		    		<a href='my.php?mail=<?php echo $id; ?>' class='btn btn-info' style="width:185px;" style="height:55px;">Modifier</a>
		    </div>
		  </div>
		<!-- 		  <div class="form-group">
		    <label for="exampleFormControlFile1">une photo</label>
		    <input type="file" class="form-control-file" id="file">
		  </div> -->
		  </div>
		  <div class="form-group">
		    
		  </div>
		  <div class="col">
			<br><br><br><br><br><br>


		    	<a href='my.php?supp=<?php echo $id; ?>' class='btn btn-danger' style="width:185px;" style="height:20px;">Suprimer mon compte</a><?php
			    	} ?>

		</div>
		
		</div>
	</div>
	</div>
	
</div>
	
<?php
include ("inc/footer.php");
?>