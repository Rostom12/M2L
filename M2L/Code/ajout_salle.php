<?php 
include 'inc/header.php';
include 'bdd.php';
?>
    <div class="form-group p-3">
      <h1>Création de salle</h1>
      <form class="" action="" method="post">
      	 <div class="form-row">
      	 	<div class="form-group col-auto">
        		<input type="text" class="form-control" name="newSalle" placeholder="Nom de la Salle">
        	</div>
        	<div class="form-group col-auto">
        		<input type="text" class="form-control" name="mail" placeholder="Contact">
        	</div>
        	<div class="form-group col-auto">
        		<input type="text" class="form-control" name="description" placeholder="Description">
        	</div>
        	<div class="form-group col-auto">
        		<input type="text" class="form-control" name="max_pers" placeholder="Capacité">
        	</div>
        	<div class="form-group col-auto">
        		<input type="submit" class="btn btn-outline-success my-4 my-sm-0"  name="create" value="Créer">
        	</div>
        </div>
      </form>
      <?php
      if (isset($_POST['create'])) {
        $newSalle=$_POST['newSalle'];
        $mail=$_POST['mail'];
        $description=$_POST['description'];
        $max_pers=$_POST['max_pers'];
        $insert="INSERT INTO salle(`contact`, `nom_salle`, `description`, `capaciter`) VALUES ('$mail','$newSalle','$description',$max_pers)";
        $sendIns = $dbh->query($insert);
      } ?>
    </div>
    <div class="form-group p-3 border bg-light">
      <h3>Liste des salles</h3>
      <form class="" action="" method="post">
          <table class="table table-bordered">
          	<thead class="thead-dark">
            <tr>
              <th>Nom</th>
              <th>Description</th>
              <th>Capacité</th>
            </tr>
            <?php
            if (isset($_POST['supprimer_salle'])) {
              foreach ($_POST as $key => $value) {
                if ($key!='supprimer') {
                  $delete="DELETE FROM salle WHERE id_salle=$key";
                  $sendDel = $dbh->query($delete);
                }
              }
            }
            $select="SELECT * FROM salle";
            $send = $dbh->query($select);
            while ($ligne=$send->fetch(PDO::FETCH_ASSOC)) {
               ?>
                              "<?=$ligne['id_salle']?>"

              <tr>
                <td><?=$ligne['nom_salle']?></td>
                <td><?=$ligne['description']?></td>
                <td><?=$ligne['capaciter']?></td>
                <td><input type="checkbox" name="<?=$ligne['id_salle']?>"></td>
              </tr>

      		
            <?php
            }?>
          </table>
        <input type="submit"  class="btn btn-outline-success my-4 my-sm-0" name="supprimer_salle" value="Supprimer">
      </form>
    </div>

  </body>
</html>

<?php
include 'inc/footer.php';
?>

