<?php   include("entete_agence.php");
require_once('../connect_bd.php');  /* pour ce connecter a la BD*/
?>

<?php
if(!empty($_POST)){ 
    extract($_POST);
    $myid_Client = $_GET['id_Client'];
    $sql = ("UPDATE clients,projets  
    SET nomClient='$nomClient',prenomClient='$prenomClient', numRue='$numRue',nomRue='$nomRue',codePostal='$codePostal',
    ville='$ville',emailClient='$emailClient',telFixe='$telFixe',telPortable='$telPortable',nomProjet='$nomProjet',
    dateProjet='$dateProjet',image1='$image1',image2='$image2',image3='$image3',image4='$image4',statut='$statut',commentaire='$commentaire'
    WHERE id_Projet = projets.id_Projet 
    AND clients.id_Client=$myid_Client");
}
    $sql=("SELECT * FROM clients 
            INNER JOIN projets 
            ON projets.id_Client = clients.id_Client 
            WHERE clients.id_Client= $myid_Client");
    $req = $bdd->query($sql);
    $donnees= $req->fetch();


?>

<?php/*  autre methode qui ne marche pas!!!!!!!!!!!!!!!!!!!

<?php
/// recuperer les infos de la table clients
    if(!empty($_GET['id_Client']) && (is_numeric($_GET['id_Client'])) && !empty($_GET['id_Projet']) && (is_numeric($_GET['id_Projet'])) )      // verifier si id est renseigné
    {
        $myid_Client = $_GET['id_Client'];
        $myid_Projet = $_GET['id_Projet'];
        $requete = $bdd->query("SELECT * FROM clients INNER JOIN projets 
                                ON clients.id_Client=projets.id_Client
                                WHERE id_Client =$myid_Client AND id_Projet =$myid_Projet");  // selectionne toutes les donnees de la table client par son id_client

        $requete->execute(array(
        'mynomClient' => $nomClient,
        'myprenomClient' => $prenomClient,
        'mynomProjet' => $nomProjet

    ));
        
        
        $donnees=$requete->fetch();   // fetch cree un tableau associatif clé son les nom des colonnes
    }    
?>

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


        // on affecte chaque donnée entrée dans le formulaire projet à une variable
        $nomProjet = htmlentities($_POST['nomProjet'], ENT_QUOTES);
        $dateProjet = ($_POST['dateProjet']);
        $statut = htmlentities($_POST['statut'], ENT_QUOTES);
        
        $image1=recupImage('image1');
        $image2=recupImage('image2');
        $image3=recupImage('image3');
        $image4=recupImage('image4');

        $commentaire = htmlentities($_POST['commentaire'], ENT_QUOTES);

        /// on recupere les donnees modifiées  pour les mettrent dans la base  ///
        $requete = $bdd->prepare("UPDATE clients, projets 
        SET clients.nomClient=:mynomClient,clients.prenomClient=:myprenomClient,clients.numRue=:mynumRue,clients.nomRue=:mynomRue,
            clients.codePostal=:mycodePostal,clients.ville=:myville,clients.emailClient=:myemail,clients.telFixe=:mytelFixe,clients.telPortable=:mytelPortable,projets.nomProjet=:mynomProjet,projets.dateProjet=:mydateProjet,projets.statut=:mystatut,projets.image1=:myimage1,
            projets.image2=:myimage2,projets.image3=:myimage3,projets.image4=:myimage4,projets.commentaire=:mycommentaire  
        WHERE clients.id_Client=projets.id_Client 
        AND clients.id_Client=$myid_Client");

        $requete->execute(array(
            'mynomClient' => $nomClient,
            'myprenomClient' => $prenomClient,
            'mynumRue' => $numRue,
            'mynomRue' => $nomRue,
            'mycodePostal' => $codePostal,
            'myville' => $ville,
            'myemail' => $email,
            'mytelFixe' => $telFixe,
            'mytelPortable' => $telPortable,
            'id_Client' => $myid_Client
           
            'mynomProjet' => $nomProjet,
            'mydateProjet' => $dateProjet,
            'mystatut' => $statut,
            'myimage1' => $image1,
            'myimage2' => $image2,
            'myimage3' => $image3,
            'myimage4' => $image4,
            'mycommentaire' => $commentaire,
            'id_Projet' => $myid_Projet
        ));
        
       
    }

?>


*/
?>





<div id="modifierClient" class="row">
    <p>Modifier un dossier client </p> 
    <form class="form-horizontal" name="formModifClient" id="modifierClient" method="post" action=""  enctype="multipart/form-data">
        <div class=" col-lg-5  col-md-5  col-sm-5  col-sx-5">
        
            <div class="form-group">
                <label id="label" >Nom :</label>
                <input type="text" class="form-control" name="nomClient" id="nomClient" value="<?php echo $donnees['nomClient'] ?>">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Prénom :</label>
                <input type="text" class="form-control" name="prenomClient" id="prenomClient" value="<?php echo $donnees['prenomClient'] ?>">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Numéro rue :</label>
                <input type="text" class="form-control" name="numRue" id="numRue"  value="<?php echo $donnees['numRue'] ?>">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Nom rue :</label>
                <input type="text" class="form-control" name="nomRue" id="nomRue"  value="<?php echo $donnees['nomRue'] ?>">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Code postal :</label>
                <input type="text" class="form-control" name="codePostal" id="codePostal"  value="<?php echo $donnees['codePostal'] ?>">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Ville :</label>
                <input type="text" class="form-control" name="ville" id="ville"  value="<?php echo $donnees['ville'] ?>">
                <p class="help-block"></p>
            </div>     
            <div class="form-group">
                <label id="label" >Email :</label>
                <input type="email" class="form-control" name="emailClient" id="emailClient" pattern="^[A-Za-z0-9.]+@[A-Za-z0-9.]+\.[A-Za-z]{2,4}$"  value="<?php echo $donnees['emailClient'] ?>">
            </div>
            <div class="form-group">
                <label id="label" >Téléphone fixe :</label>
                <input type="text" class="form-control"  name="telFixe" id="telFixe" pattern="^[0]{1}[0-9]{9}$"  value="<?php echo $donnees['telFixe'] ?>">
            </div>
            <div class="form-group">
                <label id="label" >Téléphone portable :</label>
                <input type="text" class="form-control"  name="telPortable" id="telPortable" pattern="^[0]{1}[0-9]{9}$"  value="<?php echo $donnees['telPortable'] ?>">
            </div>
        </div>
        <div class=" col-lg-1  col-md-1  col-sm-1  col-sx-1"></div>
        <div class=" col-lg-5 col-md-5  col-sm-5  col-sx-5">
            <div class="form-group">
                <label id="label" >Nom du projet :</label>
                <input type="text" class="form-control" name="nomProjet" id="nomProjet"  value="<?php echo $donnees['nomProjet'] ?>">
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Date du projet :</label>
                <input type="date" class="form-control date" name="dateProjet" id="dateProjet"  value="<?php echo $donnees['dateProjet'] ?>">
                <p class="help-block"></p>
            </div>
        
            <div class="form-group">
                <label id="label" >Image 1 :</label>
                <input type="file" class="form-control" name="image1" id="image1" value="<?php echo $donnees['image1'] ?>">
            </div>

            <div class="form-group">
                <label id="label" >Image 2 :</label>
                <input type="file" class="form-control" name="image2" id="image2" value="<?php echo $donnees['image2'] ?>">
            </div>

            <div class="form-group">
                <label id="label" >Image 3 :</label>
                <input type="file" class="form-control" name="image3" id="image3" value="<?php echo $donnees['image3'] ?>">
            </div>

            <div class="form-group">
                <label id="label" >Image 4 :</label>
                <input type="file" class="form-control" name="image4" id="image4" value="<?php echo $donnees['image4'] ?>">
            </div>
     
            <div class="form-group">
                <div class="input-group" id="statut">
                    <select name="statut"  class="form-control selectpicker " value="<?php echo $donnees['statut'] ?>">
                        <option value="" >Choisir si neuf ou ancien </option>
                        <option value="neuf">Neuf</option>
                        <option value="ancien">Ancien</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label id="label" >Commentaire :</label>
                <textarea rows="5" cols="50" class="form-control"  name="commentaire" id="commentaire"  maxlength="999" style="resize:none" value="<?php echo $donnees['commentaire'] ?>"></textarea>

                <button id="bouton" type="submit" name="envoi" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>

    </form>
</div>




