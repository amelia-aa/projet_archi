
<?php   include("entete_agence.php");
require_once('../connect_bd.php');  /* pour ce connecter a la BD*/
require_once('fonction.php');
?>


<div id="ajoutClient" class="row">
    <p>Ajouter un client</p>

    <form class="form-horizontal" name="formClient" id="ajoutClient" method="post" action="formulaire_client.php"  enctype="multipart/form-data">
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
            <h5>(* champs obligatoires)</h5>
        </div>
        <div class=" col-lg-1  col-md-1  col-sm-1  col-sx-1"></div>
        <div class=" col-lg-5 col-md-5  col-sm-5  col-sx-5">
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
            
                <button id="bouton" type="submit" name="envoi" class="btn btn-primary">Enregistrer</button>
        </div>
               
        </div>
        
        </form>

</div>

<?php

if (isset($_POST['envoi'])) {
    // on affecte chaque donnée entrée dans le formulaire client à une variable
    $nomClient = htmlentities($_POST['nomClient'], ENT_QUOTES);
    $prenomClient = htmlentities($_POST['prenomClient'], ENT_QUOTES);
    $numRue = htmlentities($_POST['numRue'], ENT_QUOTES);
    $nomRue = htmlentities($_POST['nomRue'], ENT_QUOTES);
    $codePostal = htmlentities($_POST['codePostal'], ENT_QUOTES);
    $ville = htmlentities($_POST['ville'], ENT_QUOTES);
    $email = htmlentities($_POST['emailClient'], ENT_QUOTES);
    $telFixe = htmlentities($_POST['telFixe'], ENT_QUOTES);
    $telPortable = htmlentities($_POST['telPortable'], ENT_QUOTES);

    
    /// on recupere les donnees entrees pour les mettrent dans la base  ///
    $requete = $bdd->prepare('INSERT INTO client
        (nomClient,prenomClient,numRue,nomRue,codePostal,ville,emailClient,telFixe,telPortable)
        VALUES(:mynomClient,:myprenomClient,:mynumRue,:mynomRue,:mycodePostal,:myville,:myemail,:mytelFixe,:mytelPortable)');

    $requete->execute(array(
        'mynomClient' => $nomClient,
        'myprenomClient' => $prenomClient,
        'mynumRue' => $numRue,
        'mynomRue' => $nomRue,
        'mycodePostal' => $codePostal,
        'myville' => $ville,
        'myemail' => $email,
        'mytelFixe' => $telFixe,
        'mytelPortable' => $telPortable
    ));

}

if (!empty($nomClient) && !empty($prenomClient) && !empty($numRue)&& !empty($nomRue) && !empty($codePostal) && !empty($ville)&& !empty($email) && !empty($telFixe) && !empty($telPortable)){
    echo '<script language=javascript> alert ("Votre formulaire a été envoyé.");</script>';
    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="agence.php" </SCRIPT>';
}

?>
