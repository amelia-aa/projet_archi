<?php   include("entete_agence.php");
        require_once('../connect_bd.php');  /* pour ce connecter a la BD*/

?>


<div id="ajoutActivite" class="row">
    <p>Ajouter une prestation </p>

    <form class="form-horizontal" name="ajoutActivite" id="ajoutActivite" method="post" action="formulaire_travaux.php" >
        <div class=" col-lg-5 col-md-5  col-sm-5  col-sx-5">
            <div class="form-group">
                <label id="label" >Nom du projet :</label>
                <select name="nomProjet" class="form-control selectpicker" >
                <option value="" ></option>
                <?php
                $reponse = $bdd->query('SELECT * FROM projets ORDER BY id_Projet DESC');
                while ($donnees = $reponse->fetch())
                    {
                ?>
                        <option value="<?php echo $donnees['nomProjet'] ?>"><?php echo $donnees['nomProjet']?></option>
                <?php
                    }
                ?>
                </select>
                <p class="help-block"></p>
            </div>
            <div class="form-group">
                <label id="label" >Nom de l'entreprise :</label>
                <select name="nomEnt" class="form-control selectpicker" >
                <option value="" ></option>
                <?php
                $reponse = $bdd->query('SELECT * FROM entreprises ORDER BY id_Entreprise DESC');
                while ($donnees = $reponse->fetch())
                    {
                ?>
                        <option value="<?php echo $donnees['nomEnt'] ?>"><?php echo $donnees['nomEnt']?></option>
                <?php
                    }
                ?>
                </select>
                <p class="help-block"></p>
            </div>
        </div>
            <div class=" col-lg-1  col-md-1  col-sm-1  col-sx-1"></div>
            <div class=" col-lg-5 col-md-5  col-sm-5  col-sx-5">
            <div class="form-group">
                <label id="label" >Prestation :</label>
                <input type="text" class="form-control" name="activite" id="activite"  value="<?php if (!empty($_POST['activite'])) echo htmlentities(trim($_POST['activite'])); ?>">
                <p class="help-block"></p>
            </div>

            <div class="form-group">
                <label id="label" >Description des travaux </label>
                <textarea rows="5" cols="50" class="form-control"  name="description" id="description"  maxlength="999" style="resize:none" value="<?php if (!empty($_POST['description'])) echo htmlentities(trim($_POST['description'])); ?>"></textarea>

                <button id="bouton" type="submit" name="envoi" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </form>
</div>

<?php
if (isset($_POST['envoi'])) {
    $nomProjet = ($_POST['nomProjet']);
    $nomEntreprise = ($_POST['nomEnt']);
    $activite = htmlentities($_POST['activite'], ENT_QUOTES);
    $description = htmlentities($_POST['description'], ENT_QUOTES);

    /// on interroge la BDD pour récupérer l'id_Projets  ///
    $requete = $bdd->prepare('SELECT * FROM projets WHERE nomProjet = :mynomProjet');

    $requete->execute(array(
        'mynomProjet' => $nomProjet,
    ));
    $resultat= $requete->fetch();

    //Récupération de l'ID
    $idProjet = $resultat['id_Projet'];


    /// on interroge la BDD pour récupérer l'id_Entreprises  ///
    $requete = $bdd->prepare('SELECT * FROM entreprises WHERE nomEnt = :mynomEnt');

    $requete->execute(array(
        'mynomEnt' => $nomEntreprise,
    ));
    $resultat= $requete->fetch();

    //Récupération de l'ID
    $idEntreprise = $resultat['id_Entreprise'];


    /// on recupere les donnees entrees pour les mettrent dans la base  ///
    $requete = $bdd->prepare('INSERT INTO travaux
        (activite,description,id_Projet,id_Entreprise)
        VALUES(:myactivite,:mydescription,:myidProjets,:myidEntrprises)');

    $requete->execute(array(
        'myactivite'=> $activite,
        'mydescription'=> $description,
        'myidProjets'=> $idProjet,
        'myidEntrprises'=> $idEntreprise
    ));
}

if (!empty($activite)){
    echo '<script language=javascript> alert ("Données enregistrés.");</script>';
    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="messages.php" </SCRIPT>';
}

?>