<?php
if (isset($_GET["mes"]))
{
    if ($_GET["mes"] == "pasDeDroit")
    {
        echo "Désolé, vous n'avez pas accès à la zone d'administration";
    }
    else
    {
        // pas dans la base
        echo "Désolé, vous n'êtes pas un utilisateur authentifié.";
    }
}

include('../includes/head.php');
include('../includes/header.php');
?>

<form action="../traitements/trt-authentification.php" method="post">
    <div class="form-group">
        <label for="Login">Identifiant : </label>
        <input type="text" name="login" id="login" class="form-control">
    </div>
    <div class="form-group">
         <label for="MdP">Mot de passe : </label>
        <input type="password" name="MdP" id="MdP" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" value="Se connecter" class="btn btn-primary">
    </div>
    Vous souhaitez entrer dans la zone d'administration ? Contactez-nous : <a href="mailto:?subject='Demande d\'entrer
    dans la zone d\'administration du club de Handball">ICI</a>
</form>

<?php 
include('../includes/footer.php');
?>