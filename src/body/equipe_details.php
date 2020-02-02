<?php
require_once '../includes/Database.php';
require_once '../class/EquipeBase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

$equipes = new EquipeBase();
$tbListEquAct = $equipes->getEquipesActives($o_conn);

include('../includes/head.php');
include('../includes/header.php');
?>
<div>
    <a href="equipe_liste.php"><img src="../../resources/img/img_button/back.png" alt="retour" title="Retour"
            style="width:50px;height:30px" />&ensp;Liste des équipes</a>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;

</div>
<h2>Calendrier et résultats de l'équipe
    <?php echo $tbListEquAct[$_GET["idequ"] - 1]['equ_libelle'] . " (" . $tbListEquAct[$_GET["idequ"] - 1]['equ_division'] . " )"  ?>
    <a href="equipe_liste.php"><img src="../../resources/img/img_button/ranking.png" alt="Classement"
            title="Classement de l'équipe" style="width:100px;height:75px" /></a>
</h2><br>
<div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.5/iframeResizer.min.js"></script>
    <script>
    if (!window._rsz) {
        window._rsz = function() {
            var i = iFrameResize({
                checkOrigin: false,
                interval: 100
            });
        };
        if (document.readyState != "loading") {
            _rsz()
        } else {
            document.addEventListener("DOMContentLoaded", _rsz)
        }
    }
    </script><iframe id="<?php $id_widget = $tbListEquAct[$_GET["idequ"] - 1]['equ_widget_id']; ?>"
        src="https://scorenco.com/widget/<?php echo $id_widget = $tbListEquAct[$_GET["idequ"] - 1]['equ_widget_id']; ?>/?auto_height=true"
        style="display: block; width: 55%; overflow: auto; margin: auto; border-width: 0px;" scrolling="no"></iframe>
</div>