<?php

use Application\Lib\Tools;

ob_start();

?>
<link rel="stylesheet" href="../css/planes.css">
<?php

$loader = ob_get_clean();

ob_start();

?>
<div class="title-div">
    <h1>Avions de la Compagnie :</h1>
</div>
<div class="data">
    <?php
        foreach($planes as $plane)
        {
            ?>
            <div class="container">
                <div class="model">
                    <?= $plane['model'] ?>
                </div>
                <div class="company">
                    <?= $plane['company'] ?>
                </div>
                <div class="circulation">
                    <?= $plane['circulation_date'] ?>
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