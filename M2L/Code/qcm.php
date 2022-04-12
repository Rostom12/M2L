<?php
include 'inc/header.php';
include 'bdd.php';

    $idf = $_GET['idf'];
    if(!isset($_POST["b1"]))
    {
        ?>
    <div class="container">
       <h3> Selectionnez votre niveau : </h3>
       <form action="qcm.php?idf=<?= $idf ?>" method="post">
       <div class="row">
        <div class="col">
       <input type="radio" name="niveau" value="0" checked> Débutant 
        </div>
        <div class="col">
            
       <input type="radio" name="niveau" value="1"> Confirmé 
        </div>
       <div class="col">
           <input type="submit" class="btn btn-outline-success" value="Envoyer" name="b1">
       </div>
       </div>
       </form>
   </div>



        <?php
    }else{
        echo "</center>";
        $niveau = $_POST["niveau"];
        $req = "select * from questions where niveau = $niveau order by rand() limit 10";
        $cpt = 1;
        ?>
        <div class="container form">
        <div class="row">
        <form action="res.php?idf=<?= $idf ?>" method="post">
        <?php
        foreach($dbh->query($req) as $ligne)
        {
            ?><div class="col"><h3> Question <?= $cpt ?> : <?= $ligne["libelleq"] ?>"<br></h3></div>
            <?php
            $cpt++;
            $req2 = "select * from reponses where idq = ".$ligne["idq"];
            $res2 = $dbh->query($req2);
            foreach($res2 as $ligne2)
            {?>
                <div class="col">
                <input type="radio" name="<?=$ligne["idq"];?>" value="<?=$ligne2["idr"];?>" required>
                    <?=$ligne2["libeller"]."<br>";?>
                </div>
            
            <?php
            }

        }
?>
<div class="col">
        
    <input  type="submit" class="btn btn-outline-secondary" value="Corriger">
    <a onclick="javascript:history.back();" class="btn btn-outline-info"> Retour</a>

</div>
<?php
        ?>
    </form>
        </div>
    </div>
        <?php
    }
include 'inc/footer.php';
?>