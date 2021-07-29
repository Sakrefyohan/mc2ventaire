<form id="form_search" method="get" action="consultation.php">

    <input type="checkbox" name="check_etat" id="check_etat" /> <?php include("../section/form-etat.php"); ?> <br />
    <input type="checkbox" name="check_modele" id="check_modele" /><?php include("../section/form-model.php"); ?> <br />
    <p> NE PAS COCHER DE CATEGORIE SI UN MODELE EST RENSEIGNE</p>
    <input type="checkbox" name="check_categorie" id="check_categorie" /><?php include("../section/form-categorie.php"); ?><br />
    <input type="checkbox" name="check_numeroContrat" id="check_numeroContrat" /><?php include("../section/form-numeroContrat.php"); ?>
    <br />
    <br />

    <input type="submit" value="Envoyer" id="bouton_envoyer"/><br>
</form>

<br />

