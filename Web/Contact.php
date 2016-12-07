
<link rel="stylesheet" href="contact.css">

<?php   
    include("entete_accueil.php");   // pour inclure l'entete dans la page
    require_once('connect_bd.php');  // pour ce connecter a la BD
?>

<div id="contact" class="row">

    <div id="form" class="col-lg-6 col-md-6 col-sm-6 col-sx-6">
        <form name="contactForm" id="contactForm" method="post" action="contact.php" >
            <div class="control-group form-group">
                <div class="controls">
                    <label id="label">Nom* :</label>
                    <input type="text" class="form-control" name="nom" id="nom" required="required" value="<?php if (!empty($_POST['nom'])) echo htmlentities(trim($_POST['nom'])); ?>">
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label id="label">Prénom* :</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" required="required" value="<?php if (!empty($_POST['prenom'])) echo htmlentities(trim($_POST['prenom'])); ?>">
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label id="label">Téléphone* :</label>
                    <input type="text" class="form-control"  name="telephone" id="telephone" pattern="^[0]{1}[0-9]{9}$" required="required" placeholder="0606060606" value="<?php if (!empty($_POST['telephone'])) echo htmlentities(trim($_POST['telephone'])); ?>">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label id="label">Email* :</label>
                    <input type="email" class="form-control" name="email" id="email" pattern="^[A-Za-z0-9.]+@[A-Za-z0-9.]+\.[A-Za-z]{2,4}$" required="required" value="<?php if (!empty($_POST["email"])) echo htmlentities(trim($_POST['email'])); ?>">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label id="label">Message* :</label>
                    <textarea rows="5" cols="50" class="form-control" name="message" id="message" required="required"  maxlength="999" style="resize:none" value="<?php if (!empty($_POST['message'])) echo htmlentities(trim($_POST['message'])); ?>"></textarea>
                </div>
            </div>

            <div class="control-group form-group">
                <div class="input-group">
                    <select name="situation" id="situation" class="form-control selectpicker" required="required" value="<?php if (!empty($_POST['situation'])) echo htmlentities(trim($_POST['situation'])); ?>">
                        <option value="" >*Veuillez préciser si vous êtes un particulier ou une entreprise :</option>
                        <option value="Particulier">Particulier</option>
                        <option value="Entreprise">Entreprise</option>
                    </select>
                </div>
                <br>
                <button id="bouton" type="submit" name="envoi" class="btn btn-primary">Envoyer</button>

            </div>
            
        </form>
<br><br><div></div>
    </div>

    <div id="coordo">
        <section id="adresse">
            <p id="ad"><img id="img" src="adresse.png" width="25px" height="25px" alt="logo adresse">
                10 Impasse Salinié - 31100 TOULOUSE</p>
        </section>
        <section id="">
            <p><img id="img" src="iphone.png" width="25px" height="25px" alt="logo iphone">06 77 92 45 72    
                <img id="img" src="phone2.png" width="25px" height="25px" alt="logo phone">05 61 41 75 90
            </p>
        </section>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-1 col-sx-1"></div>
    <div id="map" class="col-lg-5 col-md-5 col-sm-5 col-sx-5">
        <div style="width: 100%" id="sous_map">
            <iframe width="100%" height="400"
                    src="http://www.mapsdirections.info/fr/creez-une-carte-google/map.php?width=100%&height=400&hl=en&q=10%20Impasse%20Salini%C3%A9%2031100%20Toulouse+(Agence%20d'Architecte%20Joaquim%20Andr%C3%A9)&ie=UTF8&t=&z=13&iwloc=A&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                <a href="http://www.mapsdirections.info/fr/creez-une-carte-google/">Créez une Carte Google</a> by
                <a href="http://www.mapsdirections.info/fr/">Carte de France</a>
            </iframe>
        </div>
    </div>

</div>
<br><br><br>



<?php
$erreur=false;

if (isset($_POST['envoi']))
{
    $nom = htmlentities($_POST['nom'], ENT_QUOTES);
    if(empty($nom)){
        echo '<script language=javascript> alert ("Veuillez remplir le champ Nom");</script>';
        $erreur=true;

    }

    $prenom = htmlentities($_POST['prenom'], ENT_QUOTES);
    if(empty($prenom)){
        echo '<script language=javascript> alert ("Veuillez remplir le champ Prénom");</script>';
        $erreur=true;
    }

    $telephone = htmlentities($_POST['telephone'], ENT_QUOTES);
    if( preg_match("#^[0]{1}[0-9]{9}$#",$_POST['telephone'])){
        $telephone =($_POST['telephone']);
    }
    else{
        echo '<script language=javascript> alert ("Veuillez entrer un téléphone à 10 chiffres sans espace");</script>';
        $erreur=true;

    }

    $email = htmlentities($_POST['email'], ENT_QUOTES);
    if( preg_match("#^[A-Za-z0-9.]+@[A-Za-z0-9.]+\.[A-Za-z]{2,4}$#",$_POST['email'])){
        $email =($_POST['email']);
    }
    else{
        echo '<script language=javascript> alert ("Veuillez entrer un email correct");</script>';
        $erreur=true;

    }

    $date = date("Y/m/d"); // date du jour

    $message = htmlentities($_POST['message'], ENT_QUOTES);


    $situation = $_POST['situation'];
    if(empty($situation)){
        echo '<script language=javascript> alert ("Veuillez faire un choix sur la liste");</script>';
        $erreur=true;
    }

    if(!$erreur){

        /// on recupere les donnees entrees dans la base  ///
        $requete = $bdd->prepare('INSERT INTO messagevisiteurs
        (nom,prenom,telephone,email,dateMessage,message,statut)
        VALUES(:mynom,:myprenom,:mytelephone,:myemail,:mydateMessage,:mymessage,:mystatut)');

        $requete->execute(array(
            'mynom' => $nom,
            'myprenom' => $prenom,
            'mytelephone' => $telephone,
            'myemail' => $email,
            'mydateMessage' => $date,
            'mymessage' => $message,
            'mystatut' => $situation,

        ));
    }
}

if (!empty($nom) && !empty($prenom) && !empty($telephone)&& !empty($email) && !empty($message) && !empty($situation)){
    echo '<script language=javascript> alert ("Votre message a été envoyé");</script>';
    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="accueil.php" </SCRIPT>';
}

?>
