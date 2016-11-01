<link rel="stylesheet" href="agence.css">
<link rel="stylesheet" href="messages.css">
<?php   include("entete_agence.php");
        require_once('../connect_bd.php');  /* pour ce connecter a la BD*/

?>



<div id="table">
    <h3>Liste des messages</h3>
<table class="table">
    <!-- noms des colonnes -->
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Téléphone</th>
        <th>Email</th>
        <th>Date</th>
        <th>Message</th>
        <th>Statut</th>
        <th>Supprimer</th>
    </tr>

<?php
    $requete = $bdd->query('SELECT * FROM messagevisiteurs ORDER BY id_Visiteurs DESC');  // selectionne toutes les donnees de la table travel par son id

    while($donnees = $requete->fetch())   // fetch cree un tableau associatif
    {
        echo '<tr>
            <td>'.$donnees['nom'].'</td>
            <td>'.$donnees['prenom'].'</td>
            <td>'.$donnees['telephone'].'</td>
            <td>'.$donnees['email'].'</td>
            <td>'.$donnees['dateMessage'].'</td>
            <td>'.$donnees['message'].'</td>
            <td>'.$donnees['statut'].'</td>
            <td><a href="supprimer.php?id_Visiteurs='.$donnees['id_Visiteurs'].'"class="btn btn-primary">Supprimer</a></td>
            </tr>';
    }
?>
</table>
</div>