<?php
// session_start();
include('inc/header.php');
 if(isset($_GET['yes'])){
                ?>
                   <div class="alert alert-success" role="alert">
                     Votre message a été envoyé.
                   </div>
                   <?php
                
             }
             if (isset($_GET['success'])) {
               ?>
               <div class="alert alert-success">
                 Veuillez vous connecter maintenant
               </div>
               <?php
             }
?>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <?php
                if (isset($_GET['erreur']) == 2) {
                  ?>
                  <p class="alert-danger">
                  Vos identifiant ne sont pas bon
                </p>
                <?php
                }
              ?>
            <h5 class="card-title text-center">Connectez-vous</h5>
            <form class="form-signin" action="t1.php" method="POST">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" name="mail" placeholder="Mail" required autofocus>
              </div>
<br>
              <div class="form-label-group">
                <input type="password" id="password" class="form-control" name="password" placeholder="Mot de passe" required>
              </div>

      <td><button  class="btn btn-outline-info" id="displayPassword"><i class="far fa-eye"></i></button><button class="btn btn-outline-info" class="hide" id="displayHidePassword"><i class="far fa-eye-slash"></i></button></td>
              <br>
<?php
                if (isset($_GET['erreur']) == 1) {
                  ?>
                  <p class="alert-warning">
                  Veuillez préciser si vous êtes Professionnel ou Particulier
                </p>
                <?php
                }else{
                ?>
                <p>
                  
                </p>
              <?php }
              ?>
              <div class="container">
                <div class="row">
                        <div class="col-3">
                        <input class="form-check-input" type="radio" name="genre" id="exampleRadios1" value="1" checked>
                      <label class="form-check-label" for="materialChecked2">Particulier</label>
                      </div>
                      <div class="col-3">
                        <input class="form-check-input" type="radio" name="genre" id="exampleRadios1" value="2">
                      <label class="form-check-label" for="materialChecked2">Administrateur</label>
                      </div>
                     <!--  <div class="col-3">
                       <input class="form-check-input" type="radio" name="genre" id="exampleRadios1" value="3">
                     <label class="form-check-label" for="materialChecked2">Autre</label>
                     </div> -->
              </div>
              </div>
              <div class="form-group">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="dropdownCheck2">
                  <label class="form-check-label" for="dropdownCheck2">
                       Se souvenir de moi
                  </label>
              </div>
              </div>
              
              <button class="btn btn-lg btn-outline-primary btn-block text-uppercase" name="submit" type="submit">Connectez-vous</button>
              <hr class="my-4">
              <a class="btn btn-lg btn-outline-info btn-block text-uppercase" href="rec.php" type="submit"><!-- <a class="fabs mr-2"> -->Mot de passe oublier<!-- </a> --></a>
              <a class="btn btn-lg btn-outline-info btn-block text-uppercase" value="Se connecter" href="inscription.php" type="submit">S'inscrire</a>
              
              
            </form>
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
    </script>
<?php
include('inc/footer.php');
?>