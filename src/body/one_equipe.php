<div class="col-sm-12 col-md-4 col-lg-3">
    <div class="card" style="margin-bottom: 10px">
        <img class="card-img-top" src="../../resources/galerie/<?php echo $incrCard ?>.jpg" alt="">
        <h4 class="car-title">
            <?php echo $tbListEquActAndEntrain[$incrCard]['equ_libelle'] . " (" . $tbListEquActAndEntrain[$incrCard]['equ_division'] . " )" ?>
        </h4>
        <div class="card-body">
            <p class="car-text"><strong>Entraîneur :</strong>
                <?php echo $tbListEquActAndEntrain[$incrCard]['per_prenom'] . " " . $tbListEquActAndEntrain[$incrCard]['per_nom']; ?>
            </p>
            <p class="car-text"><strong>Entrainement :</strong>
                <?php echo $tbListEquActAndEntrain[$incrCard]['equ_jour_entrain']; ?></p>
            <p class="car-text"><strong>Heure :
                </strong><?php echo $tbListEquActAndEntrain[$incrCard]['equ_heure_entrain']; ?>
            </p>
            <a class="btn btn-warning"
                href="equipe_details.php?action=show&idequ=<?php echo $tbListEquActAndEntrain[$incrCard]['equ_id']; ?>">Détails</a>
            <a class="btn btn-success"
                href="equipe_add_up.php?action=update&idequ=<?php echo $tbListEquActAndEntrain[$incrCard]['equ_id']; ?>">Manage</a>
        </div>
    </div>
</div>