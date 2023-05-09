<?php

use Application\Lib\Tools;

ob_start();

?>
<link rel="stylesheet" href="../css/models.css">
<?php

$loader = ob_get_clean();

ob_start();

?>
<div class="title-div">
    <h1>Modèles d'avion :</h1>
</div>
<div class="data">
    <?php
        foreach($modelsFull as $modelF)
        {
            ?>
            <div class="container">
                <div class="model">
                    <?= $modelF[0]->getName() ?>
                </div>
                <div class="seats">
                    <?php
                        foreach($modelF[1] as $seat)
                        {
                            ?>
                            <div><?= $seat['quantity'].' '.$seat['name'] ?></div>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <?php
        }
    ?>
</div>
<?php

$content = ob_get_clean();

$script = '';

require('adminPanelLayout.php');