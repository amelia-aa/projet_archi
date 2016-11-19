<?php

    ////// recuperation des images d'un repertoire////////
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




    /////// Creation vignettes images///////
    function imageCreateVignetteJpeg($source,$name){  // $source: chemin de la photo  $name: la destination
    
    // image source
        $img=imagecreatefromjpeg($source);
    
    // Taille de l'image
        $size=getimagesize($source);
    
        /*methode de redimension */
    
    // Image de destination (creation de la zone)
        $img_dest=imagecreatetruecolor(200,200);  // parametre de largeur et hauteur
    
        /*$img_background=imagecolorallocate($img_dest,255,255,255); // rvb couleur rouge, vert, bleu => couleur blanc
        imagefill($img_dest,0,0,$img_background); // remplir le fond */
    
        if ($size[0]>$size[1]){
            $long=200;
            $larg=$size[0]*200/$size[1];
    
            imagecopyresized($img_dest,$img,0,0,$larg/2,0,$larg,$long,$size[0],$size[1]);
        }
        else{
            $larg=200;
            $long= $size[1]*200/$size[0];
            imagecopyresized($img_dest,$img,0,0,0,$long/2,$larg,$long,$size[0],$size[1]);
        }
    
    //On spécifie le type de fichier crée (Format de destination et où on le met dans dossier thumb)
        imagejpeg($img_dest,'../thumb/'.$name,60);
    
        // pour detruire cette image
       // imagedestroy($img_dest);
    }
    
    
    function imageCreateVignetteGif($source,$name){  // $source: chemin de la photo  $name: la destination
    
    // image source
        $img=imagecreatefromGif($source);
    
    // Taille de l'image
        $size=getimagesize($source);
    
        /*methode de redimension */
    
    // Image de destination (creation de la zone)
        $img_dest=imagecreatetruecolor(200,200);  // parametre de largeur et hauteur
    
        /*$img_background=imagecolorallocate($img_dest,255,255,0); // rvb couleur rouge, vert, bleu => couleur jaune
        imagefill($img_dest,0,0,$img_background); // remplir le fond */
    
    
        if ($size[0]>$size[1]){
            $long=200;
            $larg=$size[0]*200/$size[1];
    
            imagecopyresized($img_dest,$img,0,0,$larg/2,0,$larg,$long,$size[0],$size[1]);
        }
        else{
            $larg=200;
            $long= $size[1]*200/$size[0];
            imagecopyresized($img_dest,$img,0,0,0,$long/2,$larg,$long,$size[0],$size[1]);
        }
    
    //On spécifie le type de fichier crée (Format de destination et où on le met dans dossier thumb)
        imagegif($img_dest,'../thumb/'.$name);
    
        // pour detruire cette image
        //imagedestroy($img_dest);
    }
    
    function imageCreateVignettePng($source,$name){  // $source: chemin de la photo  $name: la destination
    
    // image source
        $img=imagecreatefrompng($source);
    
    // Taille de l'image
        $size=getimagesize($source);
    
        /*methode de redimension */
    
    // Image de destination (creation de la zone)
        $img_dest=imagecreatetruecolor(200,200);  // parametre de largeur et hauteur
    
        // couleur de fond
       /* $img_background=imagecolorallocate($img_dest,255,0,255); // rvb couleur rouge, vert, bleu => couleur rose
        imagefill($img_dest,0,0,$img_background); // remplir le fond */
    
        if ($size[0]>$size[1]){
            $long=200;
            $larg=$size[0]*200/$size[1];
    
            imagecopyresized($img_dest,$img,0,0,$larg/2,0,$larg,$long,$size[0],$size[1]);
        }
        else{
            $larg=200;
            $long= $size[1]*200/$size[0];
            imagecopyresized($img_dest,$img,0,0,0,$long/2,$larg,$long,$size[0],$size[1]);
        }
    
    //On spécifie le type de fichier crée (Format de destination et où on le met dans dossier thumb)
        imagepng($img_dest,'../thumb/'.$name);
    
        // pour detruire cette image 
        //imagedestroy($img_dest);
    }




?>