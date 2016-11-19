<?php   include("entete_agence.php");
require_once('../connect_bd.php');  /* pour ce connecter a la BD*/
require_once('fonction.php');
?>


<div id="ajoutClient" class="row">
    <p>Ajouter un projet</p>

    <form class="form-horizontal" name="formClient" id="ajoutClient" method="post" action="formulaire_projet.php"  enctype="multipart/form-data">
        <div class=" col-lg-5  col-md-5  col-sm-5  col-sx-5">
        <div class="row">
        <div class=" col-lg-5  col-md-5  col-sm-5  col-sx-5">
            <div class="form-group">
                <label id="label" >Nom du client :</label>
                <select name="nom" class="form-control selectpicker" >
                <option value="" ></option>
                <?php
                $reponse = $bdd->query('SELECT * FROM clients ORDER BY id_Client DESC');
                while ($donnees = $reponse->fetch())
                    {
                ?>
                        <option value="<?php echo html_entity_decode($donnees['nomClient']) ?>"><?php echo html_entity_decode($donnees['nomClient'])?></option>
                <?php
                    }
                ?>
                </select>
                <p class="help-block"></p>
            </div>
            </div>
            <div class=" col-lg-1  col-md-1  col-sm-1  col-sx-1"></div>
            <div class=" col-lg-5  col-md-5  col-sm-5  col-sx-5">
            <div class="form-group">
                <label id="label" >Prénom du client :</label>
                <select name="prenom" class="form-control selectpicker" >
                <option value="" ></option>
                <?php
                $reponse = $bdd->query('SELECT * FROM clients ORDER BY id_Client DESC');
                while ($donnees = $reponse->fetch())
                    {
                ?>
                        <option value="<?php echo html_entity_decode($donnees['prenomClient']) ?>"><?php echo html_entity_decode($donnees['prenomClient'])?></option>
                <?php
                    }
                ?>
                </select>
                <p class="help-block"></p>
            </div>
            </div>
         </div>   
            <div class="form-group">
                <label id="label" >Nom du projet :</label>
                <input type="text" class="form-control" name="nomProjet" id="nomProjet"  value="<?php if (!empty($_POST['nomProjet'])) echo htmlentities(trim($_POST['nomProjet'])); ?>">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Date du projet :</label>
                <input type="date" class="form-control date" name="dateProjet" id="dateProjet" placeholder="jj/mm/aaaa" value="<?php if (!empty($_POST['dateProjet'])) echo htmlentities(trim($_POST['dateProjet'])); ?>">
                <p class="help-block"></p>
            </div>
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
                        <option value="" >Choisir si neuf ou ancien </option>
                        <option value="neuf">Neuf</option>
                        <option value="ancien">Ancien</option>
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
    $nomClient = htmlentities($_POST['nom'], ENT_QUOTES);
    $prenomClient = htmlentities($_POST['prenom'], ENT_QUOTES);
    $nomProjet = htmlentities($_POST['nomProjet'], ENT_QUOTES);
    /*$dateProjet = new DateTime($_POST['dateProjet']);*/
    $dateProjet = date("Y-m-d",strtotime($_POST['dateProjet']));

    //echo $nomClient.'  ' .$prenomClient. "Je suis à la date  ".$dateProjet;

    $statut = $_POST['statut'];

    ///// TRAITEMENT DES PHOTOS /////

    $image1=recupImage('image1');
        $namenospace = str_replace(' ', '', $_FILES['image1']['name']);  //enleve les espaces dans les noms des fichiers
        $namelower = strtolower($namenospace);  // mettre les noms des fichiers photo en minuscules
        $extension = pathinfo($namelower, PATHINFO_EXTENSION);   // extrait l'extension
        $extensionOK = array('jpg', 'jpeg', 'gif', 'png');  // creation d'un tableau avec des extension possibles pour les photos

        if (in_array($extension, $extensionOK))  // on compare les extension avec les extension de $extensionOK
        {
            $destination = '../upload/';   //destination des photos dans le dossier upload
            $nom = $destination . $namelower;

            move_uploaded_file($_FILES['picture']['tmp_name'], $nom); // $img

            if ($extension == 'jpg' || $extension == 'jpeg') {

                imageCreateVignetteJpeg($nom, $namelower); // $nom : chemin du fichier  $namelower: nom du fichier en minuscule
            } else if ($extension == 'gif') {

                imageCreateVignetteGif($nom, $namelower);
            } else {

                imageCreateVignettePng($nom, $namelower);
            }
        } else {
            echo 'L\'extension n\'est pas valide';
            exit();  //on arrete le script a ce niveau
        }


    $image2=recupImage('image2');
        $namenospace = str_replace(' ', '', $_FILES['image2']['name']);  //enleve les espaces dans les noms des fichiers
        $namelower = strtolower($namenospace);  // mettre les noms des fichiers photo en minuscules
        $extension = pathinfo($namelower, PATHINFO_EXTENSION);   // extrait l'extension
        $extensionOK = array('jpg', 'jpeg', 'gif', 'png');  // creation d'un tableau avec des extension possibles pour les photos

        if (in_array($extension, $extensionOK))  // on compare les extension avec les extension de $extensionOK
        {
            $destination = '../upload/';   //destination des photos dans le dossier upload
            $nom = $destination . $namelower;

            move_uploaded_file($_FILES['picture']['tmp_name'], $nom); // $img

            if ($extension == 'jpg' || $extension == 'jpeg') {

                imageCreateVignetteJpeg($nom, $namelower); // $nom : chemin du fichier  $namelower: nom du fichier en minuscule
            } else if ($extension == 'gif') {

                imageCreateVignetteGif($nom, $namelower);
            } else {

                imageCreateVignettePng($nom, $namelower);
            }
        } else {
            echo 'L\'extension n\'est pas valide';
            exit();  //on arrete le script a ce niveau
        }


    $image3=recupImage('image3');
        $namenospace = str_replace(' ', '', $_FILES['image3']['name']);  //enleve les espaces dans les noms des fichiers
        $namelower = strtolower($namenospace);  // mettre les noms des fichiers photo en minuscules
        $extension = pathinfo($namelower, PATHINFO_EXTENSION);   // extrait l'extension
        $extensionOK = array('jpg', 'jpeg', 'gif', 'png');  // creation d'un tableau avec des extension possibles pour les photos

        if (in_array($extension, $extensionOK))  // on compare les extension avec les extension de $extensionOK
        {
            $destination = '../upload/';   //destination des photos dans le dossier upload
            $nom = $destination . $namelower;

            move_uploaded_file($_FILES['picture']['tmp_name'], $nom); // $img

            if ($extension == 'jpg' || $extension == 'jpeg') {

                imageCreateVignetteJpeg($nom, $namelower); // $nom : chemin du fichier  $namelower: nom du fichier en minuscule
            } else if ($extension == 'gif') {

                imageCreateVignetteGif($nom, $namelower);
            } else {

                imageCreateVignettePng($nom, $namelower);
            }
        } else {
            echo 'L\'extension n\'est pas valide';
            exit();  //on arrete le script a ce niveau
        }


    $image4=recupImage('image4');
        $namenospace = str_replace(' ', '', $_FILES['image4']['name']);  //enleve les espaces dans les noms des fichiers
        $namelower = strtolower($namenospace);  // mettre les noms des fichiers photo en minuscules
        $extension = pathinfo($namelower, PATHINFO_EXTENSION);   // extrait l'extension
        $extensionOK = array('jpg', 'jpeg', 'gif', 'png');  // creation d'un tableau avec des extension possibles pour les photos

        if (in_array($extension, $extensionOK))  // on compare les extension avec les extension de $extensionOK
        {
            $destination = '../upload/';   //destination des photos dans le dossier upload
            $nom = $destination . $namelower;

            move_uploaded_file($_FILES['picture']['tmp_name'], $nom); // $img

            if ($extension == 'jpg' || $extension == 'jpeg') {

                imageCreateVignetteJpeg($nom, $namelower); // $nom : chemin du fichier  $namelower: nom du fichier en minuscule
            } else if ($extension == 'gif') {

                imageCreateVignetteGif($nom, $namelower);
            } else {

                imageCreateVignettePng($nom, $namelower);
            }
        } else {
            echo 'L\'extension n\'est pas valide';
            exit();  //on arrete le script a ce niveau
        }


    $commentaire = htmlentities($_POST['commentaire'], ENT_QUOTES);

    /// on interroge la BDD pour récupérer l'id_Client   ///
    $requete = $bdd->prepare('SELECT * FROM clients WHERE nomClient = :mynomClient AND prenomClient = :myprenomClient  ');

    $requete->execute(array(
        'mynomClient' => $nomClient,
        'myprenomClient' => $prenomClient
    ));
    $resultat= $requete->fetch();

    //Récupération de l'ID
    $idClient = $resultat['id_Client'];

echo $nomProjet.' '.$dateProjet.' '.$statut.' '.$image1.' '.$image2.' '.$image3.' '.$image4.' '.$commentaire.' '.$idClient;

        $projet= html_entity_decode($nomProjet);

/// on recupere les donnees entrees pour les mettre dans la base  ///
    $requete = $bdd->prepare('INSERT INTO projets
        (nomProjet,dateProjet,statut,image1,image2,image3,image4,commentaire,id_Client)
        VALUES(:mynomProjet,:mydateProjet,:mystatut,:myimage1, :myimage2,:myimage3,:myimage4,:mycommentaire,:myidClient)');

    $requete->execute(array(
        'mynomProjet' => $projet,
        'mydateProjet' => $dateProjet,
        'mystatut' => $statut,
        'myimage1' => $image1,
        'myimage2' => $image2,
        'myimage3' => $image3,
        'myimage4' => $image4,
        'mycommentaire' => $commentaire,
        'myidClient' => $idClient
    ));

}
if (!empty($projet)&& !empty($dateProjet) && !empty($statut)){
    echo '<script language=javascript> alert ("Données enregistrés.");</script>';
    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="messages.php" </SCRIPT>';
}
?>