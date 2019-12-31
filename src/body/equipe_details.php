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

<h2>Calendrier et résultat de l'équipe <?php echo $tbListEquAct[$_GET["idequ"] - 1]['equ_libelle'] ?></h2>
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
        style="display: block; width: 60%; overflow: auto; margin: auto; border-width: 0px;" scrolling="no"></iframe>
</div>