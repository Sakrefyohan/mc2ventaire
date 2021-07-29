<form class="form_stock" method="post" action="..\traitement\traitement_delete_stock_materiel.php">

        <?php include("section/form-model.php"); ?>
        <br />
        <br />
        <?php include("section/form-categorie.php"); ?>
        <br />
        <br />
        <?php include("section/form-etat.php"); ?>
        <br />
        <br />
        <label for="number">Quantité : </label><input type="number" name="number" id="number" />
        <br />
        <br />
        <?php include("section/form-numeroContrat.php"); ?>
        <br />
        <br />
        <input type="submit" value="Sortir Materiel" id="bouton_envoyer"/><br>

</form>
<br />