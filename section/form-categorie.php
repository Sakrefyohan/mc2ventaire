
    <label for="categorie">Catégorie : </label>
        <select name="categorie" id="categorie">
            <?php

            include('traitement/connexion_bdd.php');


                $req = $bdd->prepare('SELECT * FROM categorie ORDER BY type ASC');
                $req->execute();

                while($resultat = $req->fetch())
                { ?>

            <option value="<?php echo $resultat['type']?>"><?php echo $resultat['type']?></option>
            <?php }

            $req->closeCursor();
            ?>
        </select>
