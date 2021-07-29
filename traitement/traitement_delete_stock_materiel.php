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
$numero_contrat = $_POST['numero_contrat'];



    include('../traitement/connexion_bdd.php');

// Insertion
for ($i = 1; $i <= $quantite; $i++) {
    try {
        $req = $bdd->prepare('DELETE FROM materiel WHERE modele = ? AND categorie = ? AND etat = ? AND numero_contrat = ? LIMIT 1');
        $req->execute(array($modele, $categorie ,$etat, $numero_contrat));
        $_SESSION['ERROR_delete'] = "Materiel correctement Supprimé.";
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
        $_SESSION['ERROR_delete'] = $e->getMessage();
    }
}

//rediriger l'utilisateur comme ceci :
    $req->closeCursor();

include ('../testmail/testmail.php');

        header('Location: ..\index.php');
