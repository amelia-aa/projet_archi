<?php   include("entete_agence.php");
require_once('../connect_bd.php');  /* pour ce connecter a la BD*/
?>


<table class="table">

    <tr><th>Nom </th><th>Prénom </th><th>Nom du projet</th><th>Detail</th><th>Modifier</th><th>Supprimer projet</th></tr>  <!-- noms des colonnes -->

    <?php
    // selectionne toutes les donnees de la table clients et table projets par id_
    $requete = $bdd->query('SELECT * FROM clients, projets WHERE clients.id_Client=projets.id_Client ORDER BY id_Projet DESC');  
    
    while($donnees = $requete->fetch())   // fetch cree un tableau associatif
    {
        echo '<tr><td>'.$donnees['nomClient'].'</td>              
                <td>'.$donnees['prenomClient'].'</td>
                <td>'.$donnees['nomProjet'].'</td> 
                <td><a href="detail_client.php?id_Client='.$donnees['id_Client'].'&& id_Projet='.$donnees['id_Projet'].'"class="btn btn-success">Detail</a></td>                
                <td><a href="modifier_client.php?id_Client='.$donnees['id_Client'].'&& id_Projet='.$donnees['id_Projet'].'"class="btn btn-info">Modifier</a></td>
                <td><a href="supprimer_projet.php?id_Client='.$donnees['id_Client'].'&& id_Projet='.$donnees['id_Projet'].'"class="btn btn-warning">Supprimer</a></td>';
    }
    ?>

</table>



