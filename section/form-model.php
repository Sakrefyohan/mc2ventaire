    <label for="modele">Modele : </label>
    <select name="modele" id="modele">
        <?php

        include('traitement/connexion_bdd.php');


        $req = $bdd->prepare('SELECT * FROM modele ORDER BY id ASC');
        $req->execute();

        while($resultat = $req->fetch())
        { ?>

            <option value="<?php echo $resultat['modele']?>"><?php echo $resultat['modele']?></option>
        <?php }

        $req->closeCursor();
        ?>
    </select>