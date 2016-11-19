<?php
if (!empty($nomClient) && !empty($prenomClient) && !empty($numRue)&& !empty($nomRue) && !empty($codePostal) && !empty($ville)&& !empty($email) && !empty($telFixe) && !empty($telPortable)){
$nomClient = htmlentities($_POST['nomClient'], ENT_QUOTES);
$prenomClient = htmlentities($_POST['prenomClient'], ENT_QUOTES);
$numRue = htmlentities($_POST['numRue'], ENT_QUOTES);
$nomRue = htmlentities($_POST['nomRue'], ENT_QUOTES);
$codePostal = htmlentities($_POST['codePostal'], ENT_QUOTES);
$ville = htmlentities($_POST['ville'], ENT_QUOTES);
$email = htmlentities($_POST['emailClient'], ENT_QUOTES);
$telFixe = htmlentities($_POST['telFixe'], ENT_QUOTES);
$telPortable = htmlentities($_POST['telPortable'], ENT_QUOTES);

$nomProjet = htmlentities($_POST['nomProjet'], ENT_QUOTES);

$image1=recupImage('image1');
$image2=recupImage('image2');
$image3=recupImage('image3');
$image4=recupImage('image4');

$statut = $_POST['statut'];


$description = htmlentities($_POST['description'], ENT_QUOTES);

/// on recupere les donnees entrees pour les mettrent dans la base  ///
$requete = $bdd->prepare('INSERT INTO client
(nomClient,prenomClient,numRue,nomRue,codePostal,ville,emailClient,telFixe,telPortable)
VALUES(:mynomClient,:myprenomClient,:mynumRue,:mynomRue,:mycodePostal,:myville,:myemail,:mytelFixe,:mytelPortable)');

$requete->execute(array(
'mynomClient' => $nomClient,
'myprenomClient' => $prenomClient,
'mynumRue'=>$numRue,
'mynomRue'=>$nomRue,
'mycodePostal'=>$codePostal,
'myville'=>$ville,
'myemail' => $email,
'mytelFixe' => $telFixe,
'mytelPortable'=>$telPortable,
));


/// on interroge la BDD pour récupérer l'id_Client   ///
$requete = $bdd->prepare('SELECT * FROM client WHERE nomClient = :mynomClient AND prenomClient = :myprenomClient');

$requete->execute(array(
'mynomClient' => $nomClient,
'myprenomClient' => $prenomClient
));
$resultat= $requete->fetch();
//Récupération de l'ID
$idClient = $resultat['id_Client'] ;

$requete = $bdd->prepare('INSERT INTO projets
(nomProjet,statut,image1,image2,image3,image4,description, id_Client)
VALUES(:mynomProjet,:mystatut,:myimage1, :myimage2,:myimage3,:myimage4,:mydescription,:myidClient)');

$requete->execute(array(
'mynomProjet' => $nomProjet,
'mystatut' => $statut,
'myimage1' => $image1,
'myimage2' => $image2,
'myimage3' => $image3,
'myimage4' => $image4,
'mydescription' => $description,
'myidClient' => $idClient
));


if($requete == true)
{
echo '<script language=javascript> alert ("Votre formulaire a été envoyé.");</script>';
echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="agence.php" </SCRIPT>';
}
else

}

?>