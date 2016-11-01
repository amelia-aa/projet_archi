<?php   include("entete_agence.php");
require_once('../connect_bd.php');  /* pour ce connecter a la BD*/

?>


<div id="ajoutEntreprise" class="row">
    <p>Ajouter une entreprise</p>

    <form class="form-horizontal" name="ajoutEntreprise" id="ajoutEntreprise" method="post" action="formulaire_entreprise.php" >
        <div class=" col-lg-5  col-md-5  col-sm-5  col-sx-5">
            <div class="form-group">
                <label id="label" >Nom de l'entreprise :</label>
                    <input type="text" class="form-control" name="nomEntreprise" id="nomEntreprise"  value="<?php if (!empty($_POST['nomEntreprise'])) echo htmlentities(trim($_POST['nomEntreprise'])); ?>">
                    <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Numéro SIRET :</label>
                <input type="text" class="form-control" name="numSiret" id="numSiret"  value="<?php if (!empty($_POST['numSiret'])) echo htmlentities(trim($_POST['numSiret'])); ?>">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <p></p><label id="label" >Numéro rue :</label>
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
                    <input type="email" class="form-control" name="email" id="email" pattern="^[A-Za-z0-9.]+@[A-Za-z0-9.]+\.[A-Za-z]{2,4}$"  value="<?php if (!empty($_POST["email"])) echo htmlentities(trim($_POST['email'])); ?>">
            </div>

        </div>
            <div class=" col-lg-1  col-md-1  col-sm-1  col-sx-1"></div>
            <div class=" col-lg-5 col-md-5  col-sm-5  col-sx-5">
            <div class="form-group">
                <label id="label" >Téléphone fixe :</label>
                    <input type="text" class="form-control"  name="telFixe" id="telFixe" pattern="^[0]{1}[0-9]{9}$"  placeholder="05..." value="<?php if (!empty($_POST['telFixe'])) echo htmlentities(trim($_POST['telFixe'])); ?>">
            </div>
            <div class="form-group">
                <label id="label" >Téléphone mobile :</label>
                    <input type="text" class="form-control"  name="telPortable" id="telPortable" pattern="^[0]{1}[0-9]{9}$"  placeholder="06..." value="<?php if (!empty($_POST['telPortable'])) echo htmlentities(trim($_POST['telPortable'])); ?>">
            </div>
            <div class="form-group">
                <label id="label" >Personne à contacter :</label>
                <input type="text" class="form-control" name="personneContact" id="personneContact"  value="<?php if (!empty($_POST['personneContact'])) echo htmlentities(trim($_POST['personneContact'])); ?>">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Activité :</label>
                    <input type="text" class="form-control" name="activite" id="activite"  value="<?php if (!empty($_POST['activite'])) echo htmlentities(trim($_POST['activite'])); ?>">
                    <p class="help-block"></p>
            </div>

            <div class="form-group">
                <label id="label" >Description des travaux </label>
                    <textarea rows="5" cols="50" class="form-control"  name="description" id="description"  maxlength="999" style="resize:none" value="<?php if (!empty($_POST['description'])) echo htmlentities(trim($_POST['description'])); ?>"></textarea>

                <button id="bouton" type="submit" name="envoi" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </form>
    
</div>


<?php
    if (isset($_POST['envoi'])) {
        $nomEntreprise = htmlentities($_POST['nomEntreprise'], ENT_QUOTES);
        $numSiret = htmlentities($_POST['numSiret'], ENT_QUOTES);
        $numRue = htmlentities($_POST['numRue'], ENT_QUOTES);
        $nomRue = htmlentities($_POST['nomRue'], ENT_QUOTES);
        $codePostal = htmlentities($_POST['codePostal'], ENT_QUOTES);
        $ville = htmlentities($_POST['ville'], ENT_QUOTES);
        $email = htmlentities($_POST['email'], ENT_QUOTES);
        $telFixe = htmlentities($_POST['telFixe'], ENT_QUOTES);
        $telPortable = htmlentities($_POST['telPortable'], ENT_QUOTES);
        $personneContact = htmlentities($_POST['personneContact'], ENT_QUOTES);
        $activite = htmlentities($_POST['activite'], ENT_QUOTES);
        $description = htmlentities($_POST['description'], ENT_QUOTES);

/// on recupere les donnees entrees pour les mettrent dans la base  ///
        $requete = $bdd->prepare('INSERT INTO entreprise
        (nomEnt,numSiret,numRue,nomRue,codePostal,ville,email,telFixe,telPortable,personneContact,activite,description)
        VALUES(:mynomEnt,:mynumSiret,:mynumRue,:mynomRue,:mycodePostal,:myville,:myemail,:mytelFixe,:mytelPortable,:mypersonneContact,:myactivite,:mydescription)');

        $requete->execute(array(
            'mynomEnt' => $nomEntreprise,
            'mynumSiret' => $numSiret,
            'mynumRue' => $numRue,
            'mynomRue' => $nomRue,
            'mycodePostal' => $codePostal,
            'myville' => $ville,
            'myemail' => $email,
            'mytelFixe' => $telFixe,
            'mytelPortable' => $telPortable,
            'mypersonneContact'=> $personneContact,
            'myactivite'=> $activite,
            'mydescription'=> $description
        ));

}
?>