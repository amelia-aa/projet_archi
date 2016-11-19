


<?php include("accueil.php");
require_once('connect_bd.php');

?>







<div>
<form class="form-horizontal" name="formClient" id="ajoutClient" method="post" action="essais.php"    enctype="multipart/form-data">

    <div class="form-group">
        <label id="label" >Image 1 :</label>
        <input type="file" class="form-control" name="image1" id="image1" >
        <input id="bouton" type="submit" name="envoi" class="btn btn-primary">
    </div>
</form>
</div>
    <?php

    if (isset($_POST['envoi']))   // "isset" fonction qui verifie si presence de la variable send ou si la personne a cliquer sur valider
    {


 function recupImage($name){

            ///// VERIFICATION de L'EXTENSION du FICHIER PHOTO /////

            $namenospace = str_replace(' ', '', $_FILES[$name]['name']);  //enleve les espaces dans les noms des fichiers
            $namelower = strtolower($namenospace);  // mettre les noms des fichiers photo en minuscules
            $extension = pathinfo($namelower, PATHINFO_EXTENSION);   // extrait l'extension
            $extensionOK = array('jpg', 'jpeg', 'gif', 'png');  // creation d'un tableau avec des extension possibles pour les photos

            if (in_array($extension, $extensionOK))  // on compare les extension avec les extension de $extensionOK
            {
                $destination = 'upload/';   //destination des photos dans le dossier upload
                $nom = $destination .$namelower;
                move_uploaded_file($_FILES[$name]['tmp_name'],$nom);
                return $nom;

            } else {
               echo 'L\'extension n\'est pas valide';
                exit();  //on arrete le script a ce niveau
            }
}
        $nomImage1=recupImage('image1');
        echo $nomImage1;

        $requete = $bdd->prepare('INSERT INTO projets
        (image1, id_Client) VALUES(:myimage1,24)');

        $requete->execute(array(
            'myimage1' => $nomImage1
        ));

    }



    ?>

