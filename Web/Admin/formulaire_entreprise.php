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
                <label id="label" >Personne à contacter :</label>
                <input type="text" class="form-control" name="personneContact" id="personneContact"  value="<?php if (!empty($_POST['personneContact'])) echo htmlentities(trim($_POST['personneContact'])); ?>">
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


        </div>
        <div class=" col-lg-1  col-md-1  col-sm-1  col-sx-1"></div>
        <div class=" col-lg-5 col-md-5  col-sm-5  col-sx-5">
            <div class="form-group">
                <label id="label" >Email :</label>
                <input type="email" class="form-control" name="email" id="email" pattern="^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$"  value="<?php if (!empty($_POST["email"])) echo htmlentities(trim($_POST['email'])); ?>">
            </div>
            <div class="form-group">
                <label id="label" >Téléphone fixe :</label>
                    <input type="text" class="form-control"  name="telFixe" id="telFixe" pattern="^[0]{1}[0-9]{9}$"  placeholder="05..." value="<?php if (!empty($_POST['telFixe'])) echo htmlentities(trim($_POST['telFixe'])); ?>">
            </div>
            <div class="form-group">
                <label id="label" >Téléphone mobile :</label>
                <input type="text" class="form-control"  name="telPortable" id="telPortable" pattern="^[0]{1}[0-9]{9}$"  placeholder="06..." value="<?php if (!empty($_POST['telPortable'])) echo htmlentities(trim($_POST['telPortable'])); ?>">
                <button id="bouton" type="submit" name="envoi" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </form>    
</div>
<br><br><br><br>

<?php
    if (isset($_POST['envoi'])) {
        $nomEntreprise = htmlentities($_POST['nomEntreprise'], ENT_QUOTES);
        $numSiret = htmlentities($_POST['numSiret'], ENT_QUOTES);
        $personneContact = htmlentities($_POST['personneContact'], ENT_QUOTES);
        $numRue = htmlentities($_POST['numRue'], ENT_QUOTES);
        $nomRue = htmlentities($_POST['nomRue'], ENT_QUOTES);
        $codePostal = htmlentities($_POST['codePostal'], ENT_QUOTES);
        $ville = htmlentities($_POST['ville'], ENT_QUOTES);
        $email = htmlentities($_POST['email'], ENT_QUOTES);
        $telFixe = htmlentities($_POST['telFixe'], ENT_QUOTES);
        $telPortable = htmlentities($_POST['telPortable'], ENT_QUOTES);

//echo $nomEntreprise.' '.$numSiret.' '.$personneContact.' '.$numRue.' '.$nomRue.' '.$codePostal.' '.$ville.' '.$email.' '.$telFixe.' '.$telPortable;

        $entreprise= html_entity_decode($nomEntreprise);
        $personne= html_entity_decode($personneContact);
        $rue= html_entity_decode($nomRue);
        $nomVille= html_entity_decode($ville);


/// on recupere les donnees entrees pour les mettrent dans la base  ///
        $requete = $bdd->prepare('INSERT INTO entreprises
        (nomEnt,numSiret,personneContact,numRue,nomRue,codePostal,ville,email,telFixe,telPortable)
        VALUES(:mynomEnt,:mynumSiret,:mypersonneContact,:mynumRue,:mynomRue,:mycodePostal,:myville,:myemail,:mytelFixe,:mytelPortable)');

        $requete->execute(array(
            'mynomEnt' => $entreprise,
            'mynumSiret' => $numSiret,
            'mypersonneContact'=> $personne,
            'mynumRue' => $numRue,
            'mynomRue' => $rue,
            'mycodePostal' => $codePostal,
            'myville' => $nomVille,
            'myemail' => $email,
            'mytelFixe' => $telFixe,
            'mytelPortable' => $telPortable

        ));

}

if (!empty($nomEntreprise)){
    echo '<script language=javascript> alert ("Données enregistrés.");</script>';
    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="messages.php" </SCRIPT>';
}
?>