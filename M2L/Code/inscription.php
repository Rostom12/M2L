<?php include 'inc/header.php';
include 'bdd.php'; ?>

   <div class="container">
      
      <div class="row mt-4">
         <div class="col">
            <h2>Inscription</h2>
            <p>
               Veuillez remplir le formulaire pour vous inscrire.
            </p><span class="red">* champs obligatoire</span>
            <?php if(isset($_GET['error'])){
                  if($_GET['error']==1){
                     ?>
                     <div class="alert alert-danger" role="alert">
                       Une erreur s'est produite désolé réessayer ultérieurement.
                       <!-- , ou votre mail existe déjà. -->
                     </div>
                     <?php
                  }
                  if($_GET['error']==2){
                     ?>
                     <div class="alert alert-danger" role="alert">
                      Vous êtes déjà chez nous !!
                     </div>
                     <?php
                  }
               }
            ?>
              <?php if (isset($_GET['malin'])){ ?>
                <p class="btn-warning">Il manque un champs</p>
              <?php } 
              if (isset($_POST['submits'])) {
echo "";
                }else{ ?>

                <div class="formulaire">
                <form action="" method="POST">
                    <div class="row">
                      <div class="col">
                        <input class="form-check-input" type="radio" name="genre" id="exampleRadios1" value="1" checked>
                      <label class="form-check-label" for="materialChecked2">Particulier</label>
                      </div>
                      <div class="col">
                        <input class="form-check-input" type="radio" name="genre" id="exampleRadios1" value="2">
                      <label class="form-check-label" for="materialChecked2">Professionnel</label>
                      </div>
                      <div class="col">
                        <button name="submits" type="submit" class="btn btn-primary">S'inscrire</button>
                      </div>
                </div>
                
                </form>
                </div>



<?php } if (isset($_POST['submits'])) {
$genre= $_POST['genre'];
if ($genre == 1) {

?>
            <div class="formulaire">
<form method="POST" action="t2.php">

<input type="hidden" name="genre" value="<?= $genre ?>">
                  <p>vous êtes en format particulier</p>
                <div class="form-row">
                    <div class="form-group col">
                      <label for="nom">Nom*</label>
                      <input type="text" name="nom" class="form-control" id="nom" placeholder="Dupont" required="true">
                    </div>
                    <div class="form-group col">
                      <label for="prenom">Prénom</label>
                      <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Jean">
                    </div>
                  </div>
                <div class="row">
                  
                <div class="col">
                    <label for="inputState">Téléphone*</label>
                    <input type="text" class="form-control" name="telephone" placeholder="0909090900" required="true">
                  </div>
                  <div class="col">
                    <label for="inputState">Date de naissance</label>
                    <input type="date" class="form-control" placeholder="France" name="date">
                  </div>
                </div>  
                 
               </div>
                <?php
                if(isset($_GET['error'])){
                  if($_GET['error']==2){
                     ?>
                     <div class="alert alert-danger" role="alert">
                      Un compte enregister à ce mail existe déjà.
                     </div>
                     <?php
                  }
               }?>
                  <div class="form-row">
                     <div class="form-group col">
                      <label for="mail">Votre mail* (utiliser un mail accessible):</label>
                      <input type="email" name="mail" class="form-control" id="mail" placeholder="jean.dupont@gmail.com" required="true">
                    </div>

                  <tr>
                     <div class="form-group col">
                      <label for="password">Votre mot de passe * (8 characters minimum) :</label>
                      <input type="password" name="motdepasse" class="form-control" id="password" placeholder="Mot de passe"  required="true" minlength="8" required>
                    </div>
      
      <td><button class="btn btn-outline-info" id="displayPassword"><i class="far fa-eye"></i></button><button class="btn btn-outline-info" class="hide" id="displayHidePassword"><i class="far fa-eye-slash"></i></button></td>

        </tr>
                    <!-- Material checked -->
                    <!-- <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="materialChecked2" name="condition[]" required="true" checked>
                      <label class="form-check-label" for="materialChecked2">J'accepte les condition de <a href="confi.php">confidentialité</a></label>
                    </div> -->
                  </div>
                  <div class="row">
                    <div class="col"><button name="submit" type="submit" class="btn btn-primary">S'inscrire</button>
</div>
               </form>
<?php


}
elseif ($genre == 2) {
  ?>
              <div class="formulaire">
<form method="POST" action="t2.php">

<input type="hidden" name="genre" value="<?= $genre ?>">
                  <p>Vous êtes en format professionnel</p>
                <div class="form-row">
                    <div class="form-group col">
                      <label for="nom">Nom*</label>
                      <input type="text" name="nom" class="form-control" id="nom" placeholder="Dupont" required="true">
                    </div>
                    
                <div class="col">
                    <label for="inputState">Téléphone*</label>
                    <input type="text" class="form-control" name="telephone" placeholder="0909090900" required="true">
                  </div>
                </div>  
                 
               </div>
                <?php
                if(isset($_GET['error'])){
                  if($_GET['error']==2){
                     ?>
                     <div class="alert alert-danger" role="alert">
                      Un compte enregister à ce mail existe déjà.
                     </div>
                     <?php
                  }
               }?>
                  <div class="form-row">
                     <div class="form-group col">
                      <label for="mail">Votre mail* (utiliser un mail accessible):</label>
                      <input type="email" name="mail" class="form-control" id="mail" placeholder="jean.dupont@gmail.com" required="true">
                    </div>

                  <tr>
                     <div class="form-group col">
                      <label for="password">Votre mot de passe * (8 characters minimum) :</label>
                      <input type="password" name="motdepasse" class="form-control" id="password" placeholder="Mot de passe"  required="true" minlength="8" required>
                    </div>
      
      <td><button class="btn btn-outline-info" id="displayPassword"><i class="far fa-eye"></i></button><button class="btn btn-outline-info"s class="hide" id="displayHidePassword"><i class="far fa-eye-slash"></i></button></td>

        </tr>
                    <!-- Material checked -->
                    <!-- <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="materialChecked2" name="condition[]" required="true" checked>
                      <label class="form-check-label" for="materialChecked2">J'accepte les condition de <a href="confi.php">confidentialité</a></label>
                    </div> -->
                  </div>
                  <div class="row">
                    <div class="col"><button name="submit" type="submit" class="btn btn-primary">S'inscrire</button>
</div>
               </form>
  <?php
}


} ?>



               
               <br/>
                  <div class="col"><a class="btn btn-info" href="connect.php">Se connecter
                  </a></div>
                  </div>
            </div>
         </div>
      </div>
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
    </script><br><br>

<?php include 'inc/footer.php'; ?>