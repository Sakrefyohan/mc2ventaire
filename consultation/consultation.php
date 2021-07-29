<?php session_start();
include("../section/header.php");

if (isset($_GET['check_modele']))
{
    $modele = $_GET['modele'];
}

if (isset($_GET['check_etat']))
{
    $etat = $_GET['etat'];
}

if (isset($_GET['check_categorie']))
{
    $categorie = $_GET['categorie'];
}
if (isset($_GET['check_numeroContrat']))
{
    $numeroContrat = $_GET['check_numeroContrat'];
}

include('../traitement/connexion_bdd.php');

?>


    <div class="body-bloc">

        <h1>Consultation et génération de rapport</h1>
        <p>Merci de cocher les champs à trier.</p>

        <?php include("../section/form-consult-materiel.php"); ?>


        <form method="post" action="..\index.php" >
            <input type="submit" value="Menu Principale" id="bouton_envoyer"/>
        </form>

    </div>
        <br />
        <br />
    <div class="body-bloc">

        <h1>Rapport Generé :</h1>
        <table>

            <tr>
                <th>Modele</th>
                <th>Catégorie</th>
                <th>État</th>
                <th>Date d'entrée</th>
                <th>Numéro de contrat</th>
            </tr>
        <?php
        //

        //SECTION D'affichage pour les modèles.

        //Si Aucune valeur rien n'est cocher alors affiche toute la base.
        if(!isset($modele) AND !isset($categorie) AND !isset($etat) AND !isset($numeroContrat)) {
            $req = $bdd->prepare('SELECT * FROM materiel ORDER BY modele ASC');
            $req->execute(array());
            $quantite = 0;

            while($resultat = $req->fetch())
            {
                ++$quantite;
                ?>
                <tr>
                    <td><?php echo $resultat['modele']?></td>
                    <td><?php echo $resultat['categorie']?></td>
                    <td><?php echo $resultat['etat']?></td>
                    <td><?php echo $resultat['date_entree']?></td>
                    <td><?php echo $resultat['numero_contrat']?></td>
                </tr>
            <?php  }
        }

       //SECTION D'affichage pour les modèles.
        if(isset($modele) AND !isset($categorie) AND !isset($etat) AND !isset($numeroContrat)) {
            $req = $bdd->prepare('SELECT * FROM materiel WHERE modele = ?');
            $req->execute(array($modele));
            $quantite = 0;

        while($resultat = $req->fetch())
        {
            ++$quantite;
            ?>
            <tr>
                <td><?php echo $resultat['modele']?></td>
                <td><?php echo $resultat['categorie']?></td>
                <td><?php echo $resultat['etat']?></td>
                <td><?php echo $resultat['date_entree']?></td>
                <td><?php echo $resultat['numero_contrat']?></td>
            </tr>
      <?php  }
        }

        //Section D'affichage pour les modèle selon l'état
        if(isset($modele) AND !isset($categorie) AND isset($etat) AND !isset($numeroContrat)) {
            $req = $bdd->prepare('SELECT * FROM materiel WHERE modele = ? AND etat = ?');
            $req->execute(array($modele, $etat));
            $quantite = 0;

            while($resultat = $req->fetch())
            {
                ++$quantite;
      ?>
            <tr>
                <td><?php echo $resultat['modele']?></td>
                <td><?php echo $resultat['categorie']?></td>
                <td><?php echo $resultat['etat']?></td>
                <td><?php echo $resultat['date_entree']?></td>
                <td><?php echo $resultat['numero_contrat']?></td>
            </tr>
            <?php  }
            }

        // Affiche les catégorie selon l'etat
        if (!isset($modele) AND isset($categorie) AND isset($etat) AND !isset($numeroContrat)) {
            $req = $bdd->prepare('SELECT * FROM materiel WHERE categorie = ? AND etat = ?');
            $req->execute(array($categorie, $etat));
            $quantite = 0;

            while($resultat = $req->fetch())
            {
                ++$quantite;
                ?>
                <tr>
                    <td><?php echo $resultat['modele']?></td>
                    <td><?php echo $resultat['categorie']?></td>
                    <td><?php echo $resultat['etat']?></td>
                    <td><?php echo $resultat['date_entree']?></td>
                    <td><?php echo $resultat['numero_contrat']?></td>
                </tr>
                <?php
            }
        }

        //Affiche la catégorie
        if(!isset($modele) AND isset($categorie) AND !isset($etat) AND !isset($numeroContrat)) {
            $req = $bdd->prepare('SELECT * FROM materiel WHERE categorie = ?');
            $req->execute(array($categorie));
            $quantite = 0;

            while($resultat = $req->fetch())
            {
                ++$quantite;
                ?>
                <tr>
                    <td><?php echo $resultat['modele']?></td>
                    <td><?php echo $resultat['categorie']?></td>
                    <td><?php echo $resultat['etat']?></td>
                    <td><?php echo $resultat['date_entree']?></td>
                    <td><?php echo $resultat['numero_contrat']?></td>
                </tr>
            <?php  }
        }
        // Affiche L'état
        if(!isset($modele) AND !isset($categorie) AND isset($etat) AND !isset($numeroContrat)) {
            $req = $bdd->prepare('SELECT * FROM materiel WHERE etat = ?');
            $req->execute(array($etat));
            $quantite = 0;

            while($resultat = $req->fetch())
            {
                ++$quantite;
                ?>
                <tr>
                    <td><?php echo $resultat['modele']?></td>
                    <td><?php echo $resultat['categorie']?></td>
                    <td><?php echo $resultat['etat']?></td>
                    <td><?php echo $resultat['date_entree']?></td>
                    <td><?php echo $resultat['numero_contrat']?></td>
                </tr>
            <?php  }
        }

        if(isset($modele) AND isset($categorie) AND isset($etat) AND isset($numeroContrat)) {
            $req = $bdd->prepare('SELECT * FROM materiel WHERE modele = ? AND categorie = ? AND etat = ? AND numero_contrat = ? ');
            $req->execute(array($modele, $categorie, $etat, $numeroContrat));
            $quantite = 0;

            while($resultat = $req->fetch())
            {
                ++$quantite;
                ?>
                <tr>
                    <td><?php echo $resultat['modele']?></td>
                    <td><?php echo $resultat['categorie']?></td>
                    <td><?php echo $resultat['etat']?></td>
                    <td><?php echo $resultat['date_entree']?></td>
                    <td><?php echo $resultat['numero_contrat']?></td>
                </tr>
            <?php  }
        }

        if(!isset($modele) AND isset($categorie) AND isset($etat) AND isset($numeroContrat)) {
            $req = $bdd->prepare('SELECT * FROM materiel WHERE categorie = ? AND etat = ? AND numero_contrat = ? ');
            $req->execute(array($categorie, $etat, $numeroContrat));
            $quantite = 0;

            while($resultat = $req->fetch())
            {
                ++$quantite;
                ?>
                <tr>
                    <td><?php echo $resultat['modele']?></td>
                    <td><?php echo $resultat['categorie']?></td>
                    <td><?php echo $resultat['etat']?></td>
                    <td><?php echo $resultat['date_entree']?></td>
                    <td><?php echo $resultat['numero_contrat']?></td>
                </tr>
            <?php  }
        }

        if(isset($modele) AND !isset($categorie) AND isset($etat) AND isset($numeroContrat)) {
            $req = $bdd->prepare('SELECT * FROM materiel WHERE modele = ? AND etat = ? AND numero_contrat = ? ');
            $req->execute(array($modele, $etat, $numeroContrat));
            $quantite = 0;

            while($resultat = $req->fetch())
            {
                ++$quantite;
                ?>
                <tr>
                    <td><?php echo $resultat['modele']?></td>
                    <td><?php echo $resultat['categorie']?></td>
                    <td><?php echo $resultat['etat']?></td>
                    <td><?php echo $resultat['date_entree']?></td>
                    <td><?php echo $resultat['numero_contrat']?></td>
                </tr>
            <?php  }
        }

        if(!isset($modele) AND !isset($categorie) AND !isset($etat) AND isset($numeroContrat)) {
            $req = $bdd->prepare('SELECT * FROM materiel WHERE numero_contrat = ? ');
            $req->execute(array($numeroContrat));
            $quantite = 0;

            while($resultat = $req->fetch())
            {
                ++$quantite;
                ?>
                <tr>
                    <td><?php echo $resultat['modele']?></td>
                    <td><?php echo $resultat['categorie']?></td>
                    <td><?php echo $resultat['etat']?></td>
                    <td><?php echo $resultat['date_entree']?></td>
                    <td><?php echo $resultat['numero_contrat']?></td>
                </tr>
            <?php  }
        }

        if(isset($modele) AND !isset($categorie) AND isset($etat) AND isset($numeroContrat)) {
            $req = $bdd->prepare('SELECT * FROM materiel WHERE modele = ? AND etat = ? AND numero_contrat = ? ');
            $req->execute(array($modele, $etat, $numeroContrat));
            $quantite = 0;

            while($resultat = $req->fetch())
            {
                ++$quantite;
                ?>
                <tr>
                    <td><?php echo $resultat['modele']?></td>
                    <td><?php echo $resultat['categorie']?></td>
                    <td><?php echo $resultat['etat']?></td>
                    <td><?php echo $resultat['date_entree']?></td>
                    <td><?php echo $resultat['numero_contrat']?></td>
                </tr>
            <?php  }
        }

        ?>
        </table>

        <p> Resultat retournées :  <?php if(isset($quantite)){echo $quantite;} ?></p>
    </div>
<br />

</body>

<?php $req->closeCursor(); ?>

</html>