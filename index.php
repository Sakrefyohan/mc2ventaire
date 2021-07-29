<?php

/* Page de démarrage
 * Ici tout les branchement sont fait selon une hierarchie très précise.
 * Bien lire et comprendre les redirection de page.
 *  
 *
 * */
session_start();


include("section/header.php");
?>
    <div class="body-bloc">
        <h1>MC2A - INVENTAIRE</h1>
        <h2>L'outils d'inventaire du SI MC2A</h2>

        <div id="intern_bloc">

            <br />
            <div class="section-bloc">
                <h3>Ajout de Materiel / Consommable</h3>

                <p><?php if(isset($_SESSION['ERROR_Consommable'])){echo $_SESSION['ERROR_Consommable'];} ?></p>

                <?php include("formulaire/add_stock_consommable.php"); ?>

                <br />

            </div>
            <br />
            <div class="section-bloc">
                <h3>Sortie de Materiel / Consommable</h3>

                <p><?php if(isset($_SESSION['ERROR_delete'])){echo $_SESSION['ERROR_delete'];} ?></p>

                <?php include("formulaire/delete_stock_materiel.php"); ?>

                <br />

            </div>
            <br />
        </div>

            <p class="bouton_application"><a href="consultation\consultation.php">Consultation</a></p>

    </div>

<?php session_destroy(); ?>
	</body>
</html>