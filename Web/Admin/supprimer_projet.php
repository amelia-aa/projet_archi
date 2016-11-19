<?php
require_once('../connect_bd.php');

if(!empty($_GET['id_Client']) && is_numeric($_GET['id_Client'])&& !empty($_GET['id_Projet']) && (is_numeric($_GET['id_Projet'])))
{
    

    echo "je suis ici : ".$myid_Client.' '.$myid_Projet;

    $bdd->query("DELETE FROM projets WHERE id_Projet ='".$_GET['id_Projet']."'AND projets.id_Client=".$_GET['id_Client']);

    
    header('Location:list_clients.php');
}
?>

