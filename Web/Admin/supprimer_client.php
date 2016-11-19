<?php
require_once('../connect_bd.php');

if(!empty($_GET['id_Client']) && is_numeric($_GET['id_Client'])&& !empty($_GET['id_Projet']) && (is_numeric($_GET['id_Projet'])))
{
    $myid_Client = $_GET['id_Client'];
    $myid_Projet= $_GET['id_Projet'];

    $bdd->query("DELETE FROM clients WHERE clients.id_Client='".$myid_Client."'AND projets.id_Projet IS NULL" );

    header('Location:list_clients.php');
}
?>