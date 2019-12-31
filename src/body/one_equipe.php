<div class="col-sm-12 col-md-4 col-lg-3">
    <div class="card" style="margin-bottom: 10px">
        <img class="card-img-top" src="/SiteWeb_Handball/resources/galerie/<?php echo $incrCard ?>.jpg" alt="">
        <h4 class="car-title">
            <?php echo $tbListEquAct[$incrCard]['equ_libelle'] . " (" . $tbListEquAct[$incrCard]['equ_division'] . " )" ?>
        </h4>
        <div class="card-body">
            <p class="car-text"><strong>Entraîneur :</strong> <?php echo $tbListEquAct[$incrCard]['equ_libelle']; ?>
            </p>
            <p class="car-text"><strong>Entrainement :</strong>
                <?php echo $tbListEquAct[$incrCard]['equ_jour_entrain']; ?></p>
            <p class="car-text"><strong>Heure : </strong><?php echo $tbListEquAct[$incrCard]['equ_heure_entrain']; ?>
            </p>
            <a class="btn btn-warning"
                href="/SiteWeb_Handball/src/body/equipe_details.php?idequ=<?php echo $tbListEquAct[$incrCard]['equ_id']; ?>">Détails</a>
        </div>
    </div>
</div>