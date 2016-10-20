
<link rel="stylesheet" href="Contact.css">

<?php include("Accueil.php"); ?>

<div id="contact" class="row">
    
    <div id="form" class=" col-lg-5 col-lg-5-offset-1 col-md-5 col-md-5-offset-1 col-sm-5 col-sm-5-offset-1 col-sx-5">
        <form name="contactForm" id="contactForm" method="post" action="Contact.php" onsubmit="return verif_form();" >
            <div class="control-group form-group">
                <div class="controls">
                <br>
                    <label id="label">Nom :</label>
                    <input type="text" class="form-control" name="nom" id="nom" required >
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label id="label">Prénom :</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" required >
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label id="label">Téléphone :</label>
                    <input type="text" class="form-control"  name="telephone" id="telephone" required >
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label id="label">Email :</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label id="label">Message :</label>
                    <textarea rows="5" cols="50" class="form-control"  name="message" id="message" required  maxlength="999" style="resize:none"></textarea>
                </div>
            </div>

            <div class="control-group form-group">
                    <div class="input-group">
                        <select name="situation" id="situation" class="form-control selectpicker" required >
                            <option value="" >Veuillez préciser si vous êtes un particulier ou une entreprise :</option>
                            <option value="Particulier">Particulier</option>
                            <option value="Entreprise">Entreprise</option>
                        </select>
                    </div>
                <br>
                <button id="bouton" type="submit" name="envoi" class="btn btn-primary">Envoyer</button>

            </div>

            <div id="success"></div>

        </form>

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
        <section id="">
            <p></p>
        </section>
    </div>
<br><br>
    <div id="map" class="col-lg-5 col-md-5 col-sm-5 col-sx-6">
        <div style="width: 100%" id="sous_map">
            <iframe width="100%" height="478"
                    src="http://www.mapsdirections.info/fr/creez-une-carte-google/map.php?width=100%&height=600&hl=en&q=10%20Impasse%20Salini%C3%A9%2031100%20Toulouse+(Agence%20d'Architecture%20Joaquim%20Andr%C3%A9)&ie=UTF8&t=&z=13&iwloc=A&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                <a href="http://www.mapsdirections.info/fr/creez-une-carte-google/">Créez une Carte Google</a> by
                <a href="http://www.mapsdirections.info/fr/">Carte de France</a>
            </iframe>
        </div>
        <br />
    </div>

</div>

<br><br>

<?php
// Fonction verifie le n° de telephone
function verif_num($param){
    $num = str_replace (' ','',$param);  // on remplace l'espace par rien
    if (is_numeric($num)){
        return $num;
    }
    else {

        return "erreur";
    }
}

?>



<?php

if (isset($_POST['envoi']))

{
    $nom = htmlentities($_POST['nom'], ENT_QUOTES);
    $prenom = htmlentities($_POST['prenom'], ENT_QUOTES);

    if(isset($_POST['telephone']))
    {
        $telephone = verif_num($_POST['telephone']);
        if($telephone=="erreur"){
           echo '<script>alert("Veuillez entrer un numéro de téléphone");
               </script>';
        }
        else{
            $email = htmlentities($_POST['email'], ENT_QUOTES);

            $date = date("Y/m/d"); // date du jour

            $message = htmlentities($_POST['message'], ENT_QUOTES);

            $situation = $_POST['situation'];


            /// on se connecte à la BD  ///
            try
            {
                $bdd = new PDO('mysql:host=localhost; dbname=architecte', 'root', '');
            } /// en cas d'erreur, on affiche un message et on arrete tout  ///
            catch (Exception $e)
            {
                die('erreur:' . $e->getMessage());
            }

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

}

 if (!empty($nom) && !empty($prenom) && !empty($telephone)&& !empty($email) && !empty($message) && !empty($situation) ){
     echo '<script language="javascript">';
     echo 'alert("Message envoyé")';
     echo '</script>';
 }

?>

<!-- fonction verifie si champ situation est selectionné
<script>
    function verif_tel(){
    var telephone = document.getElementById("telephone").value;
        if (isNaN(telephone)) {
            alert("Veuillez renseigner le numéro de téléphone");
            document.getElementById("telephone").focus();
            return false;
        }
        return true;
    }
</script>-->
