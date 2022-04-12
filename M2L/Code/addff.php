<?php
include 'inc/header.php';
if (isset($_SESSION['stat'])) {
$z = $_SESSION['stat'];
include 'bdd.php';
//$_SESSION['stat'];
$z = $_SESSION['stat'];
$id = $z['id_organisateur'];


?>
<div class="container">
	<div class="col-8">
		<h3>Ajouter une formation</h3>
		<?php if (isset($_GET['error'])){ ?>
			<p class="btn-warning">Il manque un champs</p>
		<?php }
		if (isset($_GET['good']) == 1) {
			?>
			<div class="alert alert-success">
				<p>
					Votre formation est bien en ligne
				</p>
			</div>
			<?php
		}
		 ?>

		
<form method="POST" action="addco.php">
		  <!-- <div class="form-row">
		    
		  </div> -->
		  <div class="form-group">
		    <input type="text" class="form-control" id="inputAddress" placeholder="Nom de l'activiter" name="nom" required="true">
		  </div>
	<!-- <div id="content">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div> -->
		  <div class="form-group">
		    <textarea name="desription" placeholder="Description de la formation" cols="30" rows="10" class="form-control" required="true"></textarea>
		  </div>
		  <div class="form-group">
		  	
		  </div>

		  <div class="form-group col">
		      <input type="inputAddress" class="form-control" id="inputprix" placeholder="Lieu" name="lieux">
		    </div>
		  <div class="form-group col">
		      <input type="text" class="form-control" id="inputprix" placeholder="Prix en €" name="prix">
		    </div>
		<div class="row">
		  <div class="form-group col">
		      <input type="date" class="form-control" id="inputprix" placeholder="" name="datedebu">
		    </div>
		
		  <div class="form-group col">
		      <input type="date" class="form-control" id="inputprix" placeholder="" name="datefin">
		    </div>
		  </div>

</div>

		<!-- 		  <div class="form-group">
		    <label for="exampleFormControlFile1">une photo</label>
		    <input type="file" class="form-control-file" id="file">
		  </div> -->
		  
		  <button type="submit" class="btn btn-success" name="sended">Envoyer</button><br><br>
</form>
	</div>
	<div class="col-4"></div>			
</div>

<?php
}
else{
	header('location:index.php');
}
include 'inc/footer.php';
?>