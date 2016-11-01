<?php   include("agence.php");
require_once('../connect_bd.php');  /* pour ce connecter a la BD*/
require_once('fonction.php');
?>


<div id="ajoutClient" class="row">
    <p>Ajouter un client</p>

    <form class="form-horizontal" name="formClient" id="ajoutClient" method="post" action="essais2.php"  enctype="multipart/form-data">
        <div class=" col-lg-5  col-md-5  col-sm-5  col-sx-5">
            <div class="form-group">
                <label id="label" >Nom :</label>
                <input type="text" class="form-control" name="nomClient" id="nomClient"  value="<?php if (!empty($_POST['nomClient'])) echo htmlentities(trim($_POST['nomClient'])); ?>">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Prénom :</label>
                <input type="text" class="form-control" name="prenomClient" id="prenomClient"  value="<?php if (!empty($_POST['prenomClient'])) echo htmlentities(trim($_POST['prenomClient'])); ?>">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Numéro rue :</label>
                <input type="text" class="form-control" name="numRue" id="numRue"  value="<?php if (!empty($_POST['numRue'])) echo htmlentities(trim($_POST['numRue'])); ?>">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Nom rue :</label>
                <input type="text" class="form-control" name="nomRue" id="nomRue"  value="<?php if (!empty($_POST['nomRue'])) echo htmlentities(trim($_POST['nomRue'])); ?>">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Code postal :</label>
                <input type="text" class="form-control" name="codePostal" id="codePostal"  value="<?php if (!empty($_POST['codePostal'])) echo htmlentities(trim($_POST['codePostal'])); ?>">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Ville :</label>
                <input type="text" class="form-control" name="ville" id="ville"  value="<?php if (!empty($_POST['ville'])) echo htmlentities(trim($_POST['ville'])); ?>">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Email :</label>
                <input type="email" class="form-control" name="emailClient" id="emailClient" pattern="^[A-Za-z0-9.]+@[A-Za-z0-9.]+\.[A-Za-z]{2,4}$"  value="<?php if (!empty($_POST["emailClient"])) echo htmlentities(trim($_POST['emailClient'])); ?>">
            </div>
            <div class="form-group">
                <label id="label" >Téléphone fixe :</label>
                <input type="text" class="form-control"  name="telFixe" id="telFixe" pattern="^[0]{1}[0-9]{9}$"  placeholder="05..." value="<?php if (!empty($_POST['telFixe'])) echo htmlentities(trim($_POST['telFixe'])); ?>">
            </div>
            <div class="form-group">
                <label id="label" >Téléphone portable :</label>
                <input type="text" class="form-control"  name="telPortable" id="telPortable" pattern="^[0]{1}[0-9]{9}$"  placeholder="06..." value="<?php if (!empty($_POST['telPortable'])) echo htmlentities(trim($_POST['telPortable'])); ?>">
            </div>
        </div>
        <div class=" col-lg-1  col-md-1  col-sm-1  col-sx-1"></div>
        <div class=" col-lg-5 col-md-5  col-sm-5  col-sx-5">
            <div class="form-group">
                <label id="label" >Nom du projet :</label>
                <input type="text" class="form-control" name="nomProjet" id="nomProjet"  value="<?php if (!empty($_POST['nomProjet'])) echo htmlentities(trim($_POST['nomProjet'])); ?>">
                <p class="help-block"></p>
            </div>
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
                        <option value="" >Choisir si réalisation ou réhabilitation </option>
                        <option value="Particulier">Réalisation</option>
                        <option value="Entreprise">Réhabilitation</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label id="label" >Description :</label>
                <textarea rows="5" cols="50" class="form-control"  name="description" id="description"  maxlength="999" style="resize:none" value="<?php if (!empty($_POST['description'])) echo htmlentities(trim($_POST['description'])); ?>"></textarea>

                <input id="bouton" type="submit" name="envoi" class="btn btn-primary">
            </div>


</div>
</form>
</div>


<?php

if (isset($_POST['envoi'])) {

    $nomClient = htmlentities($_POST['nomClient'], ENT_QUOTES);
    $prenomClient = htmlentities($_POST['prenomClient'], ENT_QUOTES);

    $nomProjet = htmlentities($_POST['nomProjet'], ENT_QUOTES);

   $image1=recupImage('image1');
    $image2=recupImage('image2');
    $image3=recupImage('image3');
    $image4=recupImage('image4');

    $statut = $_POST['statut'];
    $description = htmlentities($_POST['description'], ENT_QUOTES);


    /// on interroge la BDD pour récupérer l'id_Client   ///
    $requete = $bdd->prepare('SELECT * FROM client WHERE nomClient = :mynomClient AND prenomClient = :myprenomClient');

    $requete->execute(array(
        'mynomClient' => $nomClient,
        'myprenomClient' => $prenomClient
    ));
    $resultat= $requete->fetch();


    //Récupération de l'ID
    $idClient = $resultat['id_Client'] ;
   //$idClient = "25";

    /// on recupere les donnees entrees pour les mettrent dans la base  ///
  $requete = $bdd->prepare('INSERT INTO projets
        (nomProjet,statut,image1,image2,image3,image4,description,id_Client)
        VALUES(:mynomProjet,:mystatut,:myimage1,:myimage2,:myimage3,:myimage4,:mydescription,:myidClient)');

    /*     $requete = $bdd->query('INSERT INTO projets
          (id_Projets, id_Client)
          VALUES(1, 25)'); */

    $requete->execute(array(
          'mynomProjet' => $nomProjet,
          'mystatut' => $image1,
          'myimage1' => $image2,
          'myimage2' => $image3,
          'myimage3' => $image4,
          'myimage4' => $statut,
          'mydescription' => $description,
          'myidClient' => $idClient

      ));

}
?>