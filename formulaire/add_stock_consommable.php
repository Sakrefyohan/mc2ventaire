<form class="form_stock" method="post" action="..\traitement\traitement_add_stock_consommable.php">
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
    <p>Ecrire "Retour" en cas de retour de matériel depuis les centres.</p>
    <?php include("section/form-numeroContrat.php"); ?>
    <br />
    <br />
    <a href="http://glpi/front/contract.php?is_deleted=0&as_map=0&criteria%5B0%5D%5Blink%5D=AND&criteria%5B0%5D%5Bfield%5D=view&criteria%5B0%5D%5Bsearchtype%5D=contains&criteria%5B0%5D%5Bvalue%5D=M-MC2&search=Rechercher&itemtype=Contract&start=0&_glpi_csrf_token=374c0ad2dcc328e57016df2bd8c6c085708cb3e0aa872075d2619e1851d30fcf" target="_blank">Lien des contrat GLPI</a>
    <br />
    <br />

    <input type="submit" value="Ajouter Consommable / Materiel" id="bouton_envoyer"/><br>

</form>
<br />