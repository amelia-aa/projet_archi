
<link rel="stylesheet" href="Contact.css">

<?php include("Accueil.php"); ?>

<div id="contact" class="row">
    
    <div id="form" class=" col-lg-5 col-lg-5-offset-1 col-md-5 col-md-5-offset-1 col-sm-5 col-sm-5-offset-1 col-sx-5">
        <form name="sentMessage" id="contactForm" method="post" action="bin/contact_me.php" novalidate >
            <div class="control-group form-group">
                <div class="controls">
                <br>
                    <label id="label">Nom :</label>
                    <input type="text" class="form-control" name="nom" id="nom" required data-validation-required-message="Veuillez rentrer votre nom.">
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label id="label">Prénom :</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" required data-validation-required-message="Veuillez rentrer votre prénom.">
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label id="label">Télèphone :</label>
                    <input type="tel" class="form-control"  name="telephone" id="telephone" required data-validation-required-message="Veuillez rentrer votre numéro de télèphone.">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label id="label">Email :</label>
                    <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Veuillez rentrer votre adresse email.">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label id="label">Message :</label>
                    <textarea rows="5" cols="50" class="form-control"  name="message" id="message" required data-validation-required-message="Veuillez rentrer votre message." maxlength="999" style="resize:none"></textarea>
                </div>
            </div>

            <div class="control-group form-group">
                    <div class="input-group">
                        <select name="situation" class="form-control selectpicker" required data-validation-required-message="Veuillez faire un choix.">
                            <option  value=" ">Veuillez préciser si vous êtes un particulier ou une entreprise :</option>
                            <option>Particulier</option>
                            <option>Entreprise</option>
                        </select>
                    </div>
                <br>
                <button id="bouton" type="submit" name="envoi" class="btn btn-primary">Envoyer</button>

            </div>

            <div id="success"></div>


        </form>

    </div>

    <div id="map" class="col-lg-5 col-md-5 col-sm-5 col-sx-6">
        <div style="width: 100%" id="sous_map">
            <iframe width="100%" height="600"
                    src="http://www.mapsdirections.info/fr/creez-une-carte-google/map.php?width=100%&height=600&hl=en&q=10%20Impasse%20Salini%C3%A9%2031100%20Toulouse+(Agence%20d'Architecture%20Joaquim%20Andr%C3%A9)&ie=UTF8&t=&z=13&iwloc=A&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                <a href="http://www.mapsdirections.info/fr/creez-une-carte-google/">Créez une Carte Google</a> by
                <a href="http://www.mapsdirections.info/fr/">Carte de France</a>
            </iframe>
        </div>
        <br />
    </div>

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