<?php
session_start();
$z = $_SESSION['stat'];
$id = $z['id_organisateur'];
include 'bdd.php';
// var_dump($_POST);
$nom = $_POST['nom'];
$desription = $_POST['desription'];
$lieux=  $_POST['lieux'];
$prix= $_POST['prix'];
$datedebu = $_POST['datedebu'];
$datefin =  $_POST['datefin'];
$ins="INSERT INTO `formation`(`nom_formation`, `description_formation`, `lieu_formation`, `datdebu_formation`, `datdefin_formation`, `prix_formation`,`id_org_formation`) VALUES ('$nom','$desription','$lieux','$datedebu','$datefin',$prix,$id)";
// var_dump($ins);
$dbh->query($ins);

header('location:addff.php?good=1');
?>