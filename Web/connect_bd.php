<?php

////// Insertion en Base de Données   //////
try /// on se connecte à la BD  ///
{
    $bdd = new PDO('mysql:host=localhost; dbname=architecte;charset=utf8', 'root', '');
} /// en cas d'erreur, on affiche un message et on arrete tout  ///
catch (Exception $e)
{
    die('erreur:' . $e->getMessage());
}
?>