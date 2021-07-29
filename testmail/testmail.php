<?php

/* Page de mailing automatique en cas de manquement dans l'inventaire*/
/* NE PAS MODIFIER */
include('../traitement/connexion_bdd.php');
$i = 0;
$categorieList = array();
$quantiteList = array();
// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
$headers = "From: MC2VENTAIRE <mc2ventaire@mc2a.fr>\r\n".
    "MIME-Version: 1.0" . "\r\n" .
    "Content-type: text/html; charset=UTF-8" . "\r\n";
/**********************************************/



/* Modifier les catégorie nécessaire au trie*/
$etat = 'NEUF';
$etat2 = 'RECYCLAGE';

$req1 = $bdd->prepare('SELECT * FROM categorie ORDER BY type ASC');
$req1->execute();

/* Méthode afin de verifier l'inventaire
 * Cette page est ajouté a la sortie de materiel qui permet la vérification a chaque sortie de materiel.
 * Déplacer cette page ou alors lancer une tâche journalier pour acceder a cette page pour verifier tout les jours.
 *
 * */
while($resultat = $req1->fetch())
{

    $categorie = $resultat['type'];
    $req2 = $bdd->prepare('SELECT * FROM materiel WHERE categorie = ? AND (etat = ? OR etat = ?)');
    $req2->execute(array($categorie, $etat, $etat2));
    $quantiteNeuf = 0;
    $quantiteRecyclage = 0;

    while($resultat = $req2->fetch())
    {
        if ($etat == 'NEUF'){
            ++$quantiteNeuf;
        }else {$quantiteNeuf = 0;}

        if($etat2 == 'RECYCLAGE'){
            ++$quantiteRecyclage;
        }else {$quantiteRecyclage = 0;}
    }

    $total = $quantiteRecyclage + $quantiteNeuf;

    /* Définir les catégorie a prendre en comtpe dans le calcule de la rupture du stock
     * Modifier "$total" pour qu'il correspondent à la quantité d'objet nécéssaire pour la commande du stock.
    */
    if ($total < 5 AND (
        $categorie == 'Ecran' OR
        $categorie == 'Imprimante Simple' OR
        $categorie == 'Base Accueil' OR
        $categorie == 'Clavier' OR
        //$categorie == 'Clavier Ergonomique' OR
        $categorie == 'PC AIO' OR
        $categorie == 'PC Fixe' OR
        $categorie == 'PC Portable' OR
        $categorie == 'Souris' OR
        $categorie == 'Souris Ergonomique')) {

        /* Mail HTML très baqique : voir pour PHPMailer pour une configuration plus complète du mail.*/
        $message = "<!DOCTYPE html>
                    <html>
                    <head>
                        <style>
                            @import url('https://fonts.googleapis.com/css2?family=Archivo:wght@200&display=swap');
                        </style>
                        <meta charset='utf-8' />
                        <title>MC2VENTAIRE</title>
                    </head>
                    <body>
                    <div class='body-bloc'>
                        <h1>MC2A - INVENTAIRE</h1>
                        <h2>L'outils d'inventaire du SI MC2A</h2>
                    
                        <p>RUPTURE DE STOCK : $categorie
                            <br /> Il reste actuellement : $quantiteNeuf $etat et $quantiteRecyclage $etat2
                            <br /> Total : $total
                          
                        </p>
                    </div>
                    
                    </body>
                    </html>";

        /*Ici l'ajout des expéditeurs*/
        $to = "y.sakref@mc2a.fr , l.ramefison@mc2a.fr";

        /* Fonction d'envoie du mail */
        mail($to,"Rupture de Stock",$message,$headers);
    }

    $req2->closeCursor();

}

$req1->closeCursor();
















