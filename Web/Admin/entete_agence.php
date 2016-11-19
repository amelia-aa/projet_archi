

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agence d'architecte Joaquim André</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="js/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

    <!--Balise script jQuery pour le fonctionnement du menu -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="agence.js"></script>

    <link rel="stylesheet" href="agence.css">
    <link rel="stylesheet" href="formulaire.css">
</head>

<body>
<header>
    <div class="entete" >
        <img class="img-fluid" src="Bandeau.jpg" alt="image bandeau">
    </div>

<div id="menu">
    <nav class="navbar navbar-default" >
        <div class="container-fluid" id="sous-menu">
            <div id="navbar1" class="navbar-collapse collapse">
                <ul class="nav navbar-nav" >
                    <li><a href="messages.php">Messages</a></li>
                    <li><a href="#">Clients</a>
                        <ul>  <!-- menu secondaire -->
                            <li><a href="formulaire_client.php" >Ajouter un client</a></li>
                            <li><a href="formulaire_projet.php" >Ajouter un projet</a></li>
                            <li><a href="list_clients.php" >Liste des clients</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Entreprises</a>
                        <ul>  <!-- menu secondaire -->
                            <li><a href="formulaire_entreprise.php" >Ajouter une entreprise</a></li>
                            <li><a href="formulaire_travaux.php" >Ajouter une activité</a></li>
                            <li><a href="list_entreprises.php" >Liste des entreprises</a></li>
                        </ul>
                    </li>

                </ul>
            </div>

        </div>
    </nav>
</div>
</header>






</body>
</html>


