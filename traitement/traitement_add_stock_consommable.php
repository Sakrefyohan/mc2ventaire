<?php
session_start();


// Vérification de la validité des informations
$modele = $_POST['modele'];
if ($modele == '.null'){
    $modele = '';
}
$categorie = $_POST['categorie'];
$etat = $_POST['etat'];
$quantite = $_POST['number'];
$date_entree = date('y/m/d');
$numero_contrat = $_POST['numero_contrat'];

include('../traitement/connexion_bdd.php');

// Insertion

for ($i = 1; $i <= $quantite; $i++) {
    try
    {
        $req = $bdd->prepare('INSERT INTO materiel(modele, categorie, etat, date_entree, numero_contrat) VALUES(?, ?, ?, ?,?)');
        $req->execute(array($modele, $categorie, $etat, $date_entree,$numero_contrat));
        $req->closeCursor(); // Termine le traitement de la requête
        $_SESSION['ERROR_Consommable'] = "$quantite $categorie - $categorie Ajouté.";
    }catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
        $_SESSION['ERROR_Consommable'] = $e->getMessage();
    }
}

//rediriger l'utilisateur comme ceci :

header('Location: ..\index.php');
