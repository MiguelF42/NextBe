<?php

use Application\Lib\Tools;

ob_start();

?>
<link rel="stylesheet" href="../css/account.css">
<?php

$loader = ob_get_clean();

ob_start();

?>
<div class="title-div">
    <h1>Vos réservations :</h1>
</div>
<div class="data">
    <div class="coming-soon">
        <?php 
            foreach($comingSoon as $reservation)
            {
                ?>
                    
                <?php
            }
        ?>
    </div>
    <div class="passed">

    </div>
</div>
<?php

$content = ob_get_clean();

$script = '';

require_once($panel.'PanelLayout.php');