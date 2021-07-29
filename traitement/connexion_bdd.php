<?php
/* Page de connexion à la base de donnée
    Cette page est ajouter avant chaque requête de chaque page.
    modifier les champs "HOST" "dbname" pour modifier la configuration,
    Remplacer 'Root' et '' par le mot de passe de connexion
*/
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=mc2ventaire;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
