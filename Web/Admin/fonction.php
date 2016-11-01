<?php

function recupImage($name){

    ///// VERIFICATION de L'EXTENSION du FICHIER PHOTO /////

    if (isset($_FILES[$name])) {

        $namenospace = str_replace(' ', '', $_FILES[$name]['name']);  //enleve les espaces dans les noms des fichiers
        $namelower = strtolower($namenospace);  // mettre les noms des fichiers photo en minuscules
        $extension = pathinfo($namelower, PATHINFO_EXTENSION);   // extrait l'extension
        $extensionOK = array('jpg', 'jpeg', 'gif', 'png');  // creation d'un tableau avec des extension possibles pour les photos

        if (in_array($extension, $extensionOK))  // on compare les extension avec les extension de $extensionOK
        {
            $destination = '../upload/';   //destination des photos dans le dossier upload
            $nom = $destination . $namelower;
            move_uploaded_file($_FILES[$name]['tmp_name'], $nom);
            return $nom;
            echo 'L\'extension est valide';
        } else {
            echo 'L\'extension n\'est pas valide';
            return "vide";
        }
    } else {
        return "vide";
    }
}
?>