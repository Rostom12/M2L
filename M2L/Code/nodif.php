<?php
include 'inc/header.php';
include 'bdd.php';

if (isset($_POST['sended'])) {
$p1=$_POST['password'];
$p2=$_POST['password2'];
$rec = $_GET['rec'];
$id = $_GET['id'];
$genre = $_GET['g'];
if ($p1 == $p2) {
	// echo "good";
	$hashing = $_POST['password'];
	$hashingAfter = hash('ripemd160', $hashing);
	

	if ($genre ==1) {
	$requete = "UPDATE `client` SET `mdp`= '$hashingAfter' WHERE rec = '$rec' and id = '$id'";
	// var_dump($requete);
	// var_dump($dbh);
	$c = $dbh->query($requete);
	}
	if ($genre == 2) {
	$requete = "UPDATE `organisateur` SET `mdp_organisateur`= '$hashingAfter' WHERE rec = '$rec' and id_organisateur = '$id'";
	$c = $dbh->query($requete);
	}
	// var_dump($c);
	// var_dump($requete);
	echo "bon";
}
}
?>
<div class="container">
	<!-- <div class="bg-danger">
	<h3>Pour renisialiser votre mot de passe entre le telephone de votre compte</h3>
	<h3>Le mail pour vous envoyer</h3>
	</div> -->
	<form method="post" action="">
		<div class = container>
  <div class="row">
    <div class="col">
			<input class="form-control" type="password" name="password" id="password" placeholder="mot de passe * (8 characters minimum)" required="true" minlength="8" required>
	</div>

	<td><button id="displayPassword"><i class="far fa-eye"></i></button><button class="hide" id="displayHidePassword"><i class="far fa-eye-slash"></i></button></td>
    <div class="col">
			<input class="form-control" type="password" name="password2" id="password2" placeholder="Repete votre mot de passe * (8 characters minimum)" required="true" minlength="8" required>
	</div>
	<div class="col">
			<button type="submit" class="btn btn-success" name="sended">Envoyer</button>
	</div>
	</form>
</div>
  <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
        console.log("test")
        $("#displayPassword").click(()=>{
          event.preventDefault();
          $("#password").attr('type', 'text');
          $("#displayPassword").addClass("hide");
          $("#displayHidePassword").removeClass("hide");
        })

        $("#displayHidePassword").click(()=>{
          event.preventDefault();
          $("#password").attr('type', 'password');
          $("#displayHidePassword").addClass("hide");
          $("#displayPassword").removeClass("hide");
        })
      })
    </script>
     <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
        console.log("test")
        $("#displayPassword").click(()=>{
          event.preventDefault();
          $("#password2").attr('type', 'text');
          $("#displayPassword").addClass("hide");
          $("#displayHidePassword").removeClass("hide");
        })

        $("#displayHidePassword").click(()=>{
          event.preventDefault();
          $("#password2").attr('type', 'password2');
          $("#displayHidePassword").addClass("hide");
          $("#displayPassword").removeClass("hide");
        })
      })
    </script>
<?php
include 'inc/footer.php';
?>