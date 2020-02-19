<?php
include('../includes/head.php');
include('../includes/header.php')
?>
<div class="container">
    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail4">
            </div>
            <div class="form-group col-md-6">
                <label for="inputName">Nom</label>
                <input type="text" class="form-control" id="inputName">
            </div>
        </div>
        <div class="form-group">
            <label for="contenumessage">Votre message</label>
            <textarea class="form-control" id="contenumessage" rows="3"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-warning">Envoyer</button>
        </div>
    </form>
</div>

<?php
include('../includes/footer.php');
?>