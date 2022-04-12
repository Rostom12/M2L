<?php
include 'inc/header.php';
include 'bdd.php';
if (isset($_GET['nom'])) {
$id = $_GET['nom'];
// var_dump($id);
$nn = "SELECT nom FROM client WHERE id = $id";
$n =$dbh->query($nn)->fetch();
// var_dump($n);
$nnn = $n['nom'];
if (isset($_POST['submit'])) {
$nom =$_POST['nom'];
$up="UPDATE `client` SET `nom`='$nom' WHERE id= $id";
$updat =$dbh->query($up);
header("location: myinfo.php?sucess");

}
?>
<form method="POST" action="">
	<div class="form-group col">
                      <label for="nom">Nom</label>
                      <input type="text" name="nom" class="form-control" id="nom" placeholder="<?php echo $nnn ?>" required="true">
                      <br/>
				
                  <a type="submit" class="btn btn-danger" href="javascript:history.back()">Page Précédente</a>
                  <button name="submit" type="submit" class="btn btn-info">modifier</button>
    </div>

</form>
<?php
}
if (isset($_GET['prenom'])) {
$id = $_GET['prenom'];
// var_dump($id);
$nn = "SELECT prenom FROM client WHERE id = $id";
$n =$dbh->query($nn)->fetch();
// var_dump($n);
$nnn = $n['prenom'];
if (isset($_POST['submit'])) {
$prenom =$_POST['prenom'];
$up="UPDATE `client` SET `prenom`='$prenom' WHERE id= $id";
$updat =$dbh->query($up);
header("location: myinfo.php?sucess");

}
?>
<form method="POST" action="">
	<div class="form-group col">
                      <label for="prenom">Prenom</label>
                      <input type="text" name="prenom" class="form-control" id="prenom" placeholder="<?php echo $nnn ?>" required="true">
                      <br/>
					<a type="submit" class="btn btn-danger" href="javascript:history.back()">Page Précédente</a>
                  <button name="submit" type="submit" class="btn btn-info">modifier</button>
    </div>

</form>
<?php
}




if (isset($_GET['mp'])) {

$id = $_GET['mp'];
if (isset($_POST['submitz'])) {
   $mot=$_POST['mot'];

        $hashingAfter = hash('ripemd160', $mot);
        $up="UPDATE `client` SET `mdp`='$hashingAfter' WHERE id= $id";
        $updat =$dbh->query($up);
        // var_dump($updat);
        // die;
        header("location: myinfo.php?sucess");
      
    }
    ?>
    <div class="container">
      <form action="" method="POST">
        <div class="row">
          <div class="col">
            <label for="text">Votre Nouveau mot de passe :</label>
          </div>
          <div class="col">
           <input type="text" name="mot" class="form-control" required>
          </div>
          <div class="col">
            <input type="submit" class="btn btn-light" name="submitz">
          </div>
        </div>
      </form>
    </div>
    <?php
}
if (isset($_GET['tel'])) {
$id = $_GET['tel'];
// var_dump($id);

$nn = "SELECT tel FROM client WHERE id = $id";
$n =$dbh->query($nn)->fetch();
// var_dump($n);
$nnn = $n['tel'];
if (isset($_POST['submit'])) {
$tel =$_POST['tel'];
$up="UPDATE `client` SET `tel`='$tel' WHERE id= $id";
$updat =$dbh->query($up);
header("location: myinfo.php?sucess");

}
?>
<form method="POST" action="">
	<div class="form-group col">
                      <label for="nom">Telephone</label>
                      <input type="text" name="tel" class="form-control" id="tel" placeholder="<?php echo $nnn ?>" required="true">
                      <br/>
				
                  <a type="submit" class="btn btn-danger" href="javascript:history.back()">Page Précédente</a>
                  <button name="submit" type="submit" class="btn btn-info">modifier</button>
    </div>

</form>
<?php
}
if (isset($_GET['mail'])) {
$id = $_GET['mail'];
// var_dump($id);

$nn = "SELECT mail FROM client WHERE id = $id";
$n =$dbh->query($nn)->fetch();
// var_dump($n);
$nnn = $n['mail'];

if (isset($_POST['submit'])) {
$mail =$_POST['mail'];
$up="UPDATE `client` SET `mail`='$mail' WHERE id= $id";
$updat =$dbh->query($up);
header("location: myinfo.php?sucess");

}
?>
<form method="POST" action="">
  <div class="form-group col-md-6">
                      <label for="nom">mail</label>
                      <input type="text" name="mail" class="form-control" id="mail" placeholder="<?php echo $nnn ?>" required="true">
                      <br/>
        
                  <a type="submit" class="btn btn-danger" href="javascript:history.back()">Page Précédente</a>
                  <button name="submit" type="submit" class="btn btn-info">modifier</button>
    </div>

</form>
<?php
}
if (isset($_GET['supp'])) {
$id = $_GET['supp'];
$demande = "INSERT INTO `supr`(`id_client`, `datee`) VALUES ($id,current_timestamp())";
$dbh->query($demande);

?>
<div class="container">
  <a href="myinfo.php?prienconte" class="btn-outline-success"> < RETOUR</a>
</div>
<?php
}
include 'inc/footer.php';
?>