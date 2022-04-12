<?php
include('inc/header.php');
if (isset($_GET['yes'])) {
    ?>
    <div class="alert alert-success" role="alert">
        Votre message a été envoyé.
    </div>
    <?php

}
?>
    <br><br><br>
    <style>
        .hr{
            border: 1px solid silver;
            margin-bottom: 5%;
        }
    </style>
    <div class=container>
        <div class="row">
            <div class="col-8">
                <section class="left">
                    <div class="card">
                        <div class="card-header text-center">CONTACT</div>

<!--                    <h2>-->
<!--                        CONTACT-->
<!--                    </h2>-->
                    <div class="card-body">
                    <p class="msg"></p>
                    <form action="message.php" method="post">
                        Nom :<br>
                        <input type="text" name="nom" required="" class="form-control"><br><br>
                        Prénom :<br>
                        <input type="text" name="prenom" required="" class="form-control"><br><br>
                        Mail :<br>
                        <input type="email" name="mail" required="" class="form-control"><br><br>
                        Téléphone :<br>
                        <input type="text" name="telephone" required="" class="form-control"><br><br>
                        Message :<br>
                        <textarea name="message" rows="7" cols="75" placeholder="votre message..." class="form-control"
                                  required=""></textarea><br><br>
                        <button type="submit" class="btn btn-success" name="sended">Envoyer</button>
                    </form>
                    </div>
                    </div>
            </div>
            <div class="col-4">
                <div class=container>
                    <section class="right">
                        <div class="card">
                            <div class="card-header text-center">
                                <h2>
                                    COORDONNÉES
                                </h2>
                            </div>
                            <div class="card-body overflow-auto" style="height: 50vh">
                                <h4>Maison des Ligues de Lorraine</h4>
                                <p>
                                    <br>
                                    13 rue Jean Moulin - BP 70001<br>
                                    54510 TOMBLAINE<br>
                                    Tél. : 03.83.18.87.02<br>
                                    Fax : 03.83.18.87.03<br>
                                    Email : <a href="mailto:contact@m2l.fr">contact@m2l.fr</a>
<!--                                    <br><br>-->
<!--                                    <br>-->
                                </p>
<div class="hr"></div>
                                <h4>Directeur</h4>
                                <p>
                                    <br>
                                    <span class="name">Lucien SAPIN</span><br>
                                    Tél. : 03 83 18 87 02<br>
                                    Fax : 03 83 18 87 03<br>
                                    Email : <a href="mailto:lucien.gastaldello@m2l.fr">lucien.gastaldello@m2l.fr</a>
<!--                                    <br><br>-->
<!--                                    <br>-->
                                </p>
                                <div class="hr"></div>
                                <h4>Chargée Impact Emploi</h4>
                                <p>
                                    <br>
                                    <span class="name">Nathalie GENAIS</span><br>
                                    Tél. : 03 83 18 87 05<br>
                                    Email : <a href="mailto:martine.genoux@m2l.fr">martine.genoux@m2l.fr</a>
<!--                                    <br><br>-->
<!--                                    <br>-->
                                </p>
                                <div class="hr"></div>
                                <h4>Chargée d’infographie</h4>
                                <p>
                                    <br>
                                    <span class="name">Lorette GIROUX</span><br>
                                    Tél. : 03 83 18 87 06<br>
                                    Email : <a href="mailto:lorette.bossart@m2l.fr">lorette.bossart@m2l.fr</a>
<!--                                    <br><br>-->
<!--                                    <br>-->
                                </p>
                                <div class="hr"></div>
                                <h4>Secrétaire Comptable</h4>
                                <p>
                                    <br>
                                    <span class="name">Martine DUPONT</span><br>
                                    Tél. : 03 83 18 87 07<br>
                                    Fax : 03 83 18 87 03<br>
                                    Email : <a href="mailto:jeannine.vuillemard@m2l.fr">jeannine.vuillemard@m2l.fr</a>
                                </p>
                            </div>
                        </div>


                    </section>
                </div>
            </div>
        </div>
    </div><br><br>
<?php
include('inc/footer.php');
?>