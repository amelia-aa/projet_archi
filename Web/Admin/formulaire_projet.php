<?php   include("entete_agence.php");
require_once('../connect_bd.php');  /* pour ce connecter a la BD*/
require_once('fonction.php');
?>


<div id="ajoutClient" class="row">
    <p>Ajouter un projet</p>

    <form class="form-horizontal" name="formClient" id="ajoutClient" method="post" action="formulaire_projet.php"  enctype="multipart/form-data">
        <div class=" col-lg-5  col-md-5  col-sm-5  col-sx-5">
            <div class="form-group">
                <label id="label" >Nom* :</label>
                <input type="text" class="form-control" name="nomClient" id="nomClient" required="required" value="<?php if (!empty($_POST['nomClient'])) echo htmlentities(trim($_POST['nomClient'])); ?>">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Prénom* :</label>
                <input type="text" class="form-control" name="prenomClient" id="prenomClient" required="required" value="<?php if (!empty($_POST['prenomClient'])) echo htmlentities(trim($_POST['prenomClient'])); ?>">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Nom du projet :</label>
                <input type="text" class="form-control" name="nomProjet" id="nomProjet"  value="<?php if (!empty($_POST['nomProjet'])) echo htmlentities(trim($_POST['nomProjet'])); ?>">
                <p class="help-block"></p>
            </div>
            <h5>(* champs obligatoires)</h5>
        </div>
        <div class=" col-lg-1  col-md-1  col-sm-1  col-sx-1"></div>
        <div class=" col-lg-5 col-md-5  col-sm-5  col-sx-5">
            <div class="form-group">
                <label id="label" >Image 1 :</label>
                <input type="file" class="form-control" name="image1" id="image1" value="<?php if (!empty($_POST["image1"])) echo htmlentities(trim($_POST['image1'])); ?>">
            </div>

            <div class="form-group">
                <label id="label" >Image 2 :</label>
                <input type="file" class="form-control" name="image2" id="image2" value="<?php if (!empty($_POST["image2"])) echo htmlentities(trim($_POST['image2'])); ?>">
            </div>

            <div class="form-group">
                <label id="label" >Image 3 :</label>
                <input type="file" class="form-control" name="image3" id="image3" value="<?php if (!empty($_POST["image3"])) echo htmlentities(trim($_POST['image3'])); ?>">
            </div>

            <div class="form-group">
                <label id="label" >Image 4 :</label>
                <input type="file" class="form-control" name="image4" id="image4" value="<?php if (!empty($_POST["image4"])) echo htmlentities(trim($_POST['image4'])); ?>">
            </div>
    
        
            <div class="form-group">
                <div class="input-group" id="statut">
                    <select name="statut"  class="form-control selectpicker " value="<?php if (!empty($_POST['statut'])) echo htmlentities(trim($_POST['statut'])); ?>">
                        <<option value="" >Choisir si neuf ou ancien </option>
                        <option value="Particulier">Neuf</option>
                        <option value="Entreprise">Ancien</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label id="label" >Commentaire :</label>
                <textarea rows="5" cols="50" class="form-control"  name="commentaire" id="commentaire"  maxlength="999" style="resize:none" value="<?php if (!empty($_POST['commentaire'])) echo htmlentities(trim($_POST['commentaire'])); ?>"></textarea>

                <button id="bouton" type="submit" name="envoi" class="btn btn-primary">Enregistrer</button>
            </div> 

</div>
</form>
</div>

<?php

if (isset($_POST['envoi'])) {
    // on affecte chaque donnée entrée dans le formulaire projets à une variable
    $nomClient = htmlentities($_POST['nomClient'], ENT_QUOTES);
    $prenomClient = htmlentities($_POST['prenomClient'], ENT_QUOTES);
    $nomProjet = htmlentities($_POST['nomProjet'], ENT_QUOTES);

    $image1=recupImage('image1');
    $image2=recupImage('image2');
    $image3=recupImage('image3');
    $image4=recupImage('image4');

    $statut = $_POST['statut'];
    $commentaire = htmlentities($_POST['commentaire'], ENT_QUOTES);

    /// on interroge la BDD pour récupérer l'id_Client   ///
    $requete = $bdd->prepare('SELECT * FROM client WHERE nomClient = :mynomClient AND prenomClient = :myprenomClient');

    $requete->execute(array(
        'mynomClient' => $nomClient,
        'myprenomClient' => $prenomClient
    ));
    $resultat= $requete->fetch();

    //Récupération de l'ID
    $idClient = $resultat['id_Client'];

/// on recupere les donnees entrees pour les mettrent dans la base  ///
    $requete = $bdd->prepare('INSERT INTO projets
        (nomProjet,statut,image1,image2,image3,image4,commentaire,id_Client)
        VALUES(:mynomProjet,:mystatut,:myimage1, :myimage2,:myimage3,:myimage4,:mycommentaire,:myidClient)');

    $requete->execute(array(
        'mynomProjet' => $nomProjet,
        'mystatut' => $statut,
        'myimage1' => $image1,
        'myimage2' => $image2,
        'myimage3' => $image3,
        'myimage4' => $image4,
        'mycommentaire' => $commentaire,
        'myidClient' => $idClient
    ));
}

?>