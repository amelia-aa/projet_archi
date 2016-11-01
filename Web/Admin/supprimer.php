
<?php

    require_once('../connect_bd.php');  /* pour ce connecter a la BD*/

    if(!empty($_GET['id_Visiteurs']) && (is_numeric($_GET['id_Visiteurs'])))         // verifier si id est renseigné et s'il est numerique
    {
    //Suppression ligne
    $requete = $bdd->query('DELETE FROM messagevisiteurs WHERE id_Visiteurs ='.$_GET['id_Visiteurs']);
    header('Location:messages.php');
    }

?>