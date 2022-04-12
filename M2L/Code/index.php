<?php
include 'inc/header.php';
if (isset($_GET['success']) ==1) {
  ?>
  <div class="container">
  <div class="alert-success">
    <p>
      Vous êtes connecter
    </p>
  </div>
  </div>
  <?php
}

?>
<body><br><br>

  <div class = "container pt-3 " >
    <section>
         <h2>
            Bienvenue sur le site officielle de la Maison des Ligues de Lorraine
         </h2>
         <p>
          <blockquote class="blockquote">
            La Maison des Ligues de Lorraine (M2L) a pour mission de fournir des espaces et des services aux différentes ligues sportives régionales de Lorraine et à d’autres structures hébergées. La M2L est une structure financée par le Conseil Régional de Lorraine dont l'administration est déléguée au Comité Régional Olympique et Sportif de Lorraine (CROSL).
            Installée depuis 2003 dans la banlieue Nancéienne, la M2L accueille l'ensemble du mouvement sportif Lorrain qui représente près de 6 500 clubs, plus de 525 000 licenciés et près de 50 000 bénévoles.
         </p></blockquote>
      </section>
</div>
<div class = "container">
  <div class="row">
    <div class="col-8">

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <div class="carousel-item">
      <img class="d-block w-100" src="img/Lionel-Messi-PSG-Paris-Saint-Germain.jpg" alt="Second slide">
     </div>
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/mbappe.jpg" alt="First slide">
    </div>
    
    <div class="carousel-item">
      <img class="d-block w-100" src="img/PSG-Nantes_Parc_des_Princes_05.jpg" alt="Third slide">
    </div> 
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>
    <div class="col-4">
                <div class=container>
                    <section class="right">
                        <div class="card">
                            <div class="card-header text-center">
                                <h2>
                                    DERNIÈRES INFOS
                                </h2>
                            </div>
                            <div class="card-body overflow-auto" style="height: 50vh">
                                <h4>
                                <a class="not_img" onclick="window.open(this.href, 'https://www.football365.fr/psg-trois-dossiers-chauds-table-10026966.html#item=1'); return false;" href="https://www.football365.fr/psg-trois-dossiers-chauds-table-10026966.html#item=1" style="color:#366799">PSG, TROIS DOSSIERS CHAUDS SUR LA TABLE
</a></h4>
                                <p>Le Paris Saint-Germain est à pied d’œuvre pour assurer la continuité de son projet. Le club parisien planche sur la prolongation de trois joueurs cadres. </p>
                                </p>
                            <div class="hr"></div><h4>
                               <a class="not_img" onclick="window.open(this.href, 'https://www.football365.fr/le-fils-de-didier-drogba-sest-volatilise-10026834.html#item=1', 'resizable=yes,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=yes,dependent=no,width=800,left=300,height=500,top=100'); return false;" href="https://www.football365.fr/le-fils-de-didier-drogba-sest-volatilise-10026834.html#item=1" style="color:#366799">LE FILS DE DIDIER DROGBA S’EST VOLATILISÉ
</a></h4>
                                </p><p>Plusieurs informations en provenance du Portugal feraient état de la disparition d'Isaac Drogba, le fils Didier Drogba et joueur à l'Académica de Coimbra.</p>
                               
                                
                                <div class="hr"></div><h4>
                                <a class="not_img" onclick="window.open(this.href, 'https://www.lequipe.fr/France-Football/Article/Sadio-mane-c-est-deja-une-grande-victoire-que-de-resister-a-tout-ca/1321290', 'resizable=yes,status=no,location=no,toolbar=no=800,left=300,height=500,top=100'); return false;" href="https://www.lequipe.fr/France-Football/Article/Sadio-mane-c-est-deja-une-grande-victoire-que-de-resister-a-tout-ca/1321290" style="color:#366799">Sadio Mané : « C'est déjà une grande victoire que de résister à tout "ça" »</a></h4>
                                <p>Héros du sacre sénégalais à la Coupe d'Afrique des nations, en février 2022, l'attaquant de Liverpool Sadio Mané assume sa différence au sein d'un milieu où sa réserve, sa modestie et sa normalité revendiquée font de lui un élément forcément à part.</p>

                               

                            </div>
                        </div>


                    </section>
                </div>
            </div>
        </div>
    </div>
</body><br><br><br>
<?php
include('inc/footer.php');
?>