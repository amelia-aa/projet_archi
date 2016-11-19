<link rel="stylesheet" href="detail_client.css">

<?php   include("entete_agence.php");
require_once('../connect_bd.php');  /* pour ce connecter a la BD*/

require_once('fonction.php');
?>


<div id="btn"><a href="list_clients.php" class="btn btn-primary">Retour</a></div>
<div id="table">
    <table class="table">

<?php
if(!empty($_GET['id_Client']) && (is_numeric($_GET['id_Client'])) && !empty($_GET['id_Projet']) && (is_numeric($_GET['id_Projet'])))
{
    $myid_Client = $_GET['id_Client'];
    $myid_Projet= $_GET['id_Projet'];

    // selectionne toutes les donnees de la table clients et projets par  id_client
    $requete = $bdd->query("SELECT * FROM clients, projets WHERE clients.id_Client=projets.id_Client AND clients.id_Client ='".$myid_Client."'AND projets.id_Projet =".$myid_Projet);  // selectionne toutes les donnees de la table client par son id_client
    
    $donnees = $requete->fetch(); // fetch cree un tableau associatif clé son les nom des colonnes

    $vignette1 = str_replace('upload','thumb',$donnees['image1']);
    $vignette2 = str_replace('upload','thumb',$donnees['image2']);
    $vignette3 = str_replace('upload','thumb',$donnees['image3']);
    $vignette4 = str_replace('upload','thumb',$donnees['image3']);

    echo '<h3 id="h3">Client : '.$donnees['nomClient'].' '.$donnees['prenomClient'].'</h3>
          <tr><th>Adresse : </th><td>'.$donnees['numRue']. ' ' . $donnees['nomRue']. ' - ' . $donnees['codePostal']. ' ' . $donnees['ville'].'</td></tr>
          <tr><th>Email : </th><td>'.$donnees['emailClient'].'</td></tr>
          <tr><th>Téléphone fixe : </th><td>'.$donnees['telFixe'].'</td></tr>
          <tr><th>Téléphone portable : </th><td>'.$donnees['telPortable'].'</td></tr>
          <tr><th>Nom du projet : </th><td>'.$donnees['nomProjet'].'</td></tr>
          <tr><th>Date du projet : </th><td>'.$donnees['dateProjet'].'</td></tr>
          <tr><th>Type de réalisation : </th><td>'.$donnees['statut'].'</td></tr>
          <tr><th>Commentaire : </th><td>'.$donnees['commentaire'].'</td></tr>
          <tr><th>Photos : </th><td><figure><img src='.$vignette1.'></figure></td><td><figure><img src='.$vignette2.'></figure></td>
                <td><figure><img src='.$vignette3.'></figure></td><td><figure><img src='.$vignette4.'></figure></td>
          </tr>';
}
else
{
    header('Location:essais-detail.php');
}
?>

    </table>
</div>


