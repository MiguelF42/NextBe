<?php

$title = 'Tickets';

ob_start();

?>
<link rel="stylesheet" href="css/tickets.css?<?= time() ?>">
<?php

$loader = ob_get_clean();

ob_start();

?>
<aside>
   a 
</aside>
<div class="data">
    <?php
    foreach($tickets as $ticket)
    {
        ?>
        <div class="ticket">
            <div class="from-to">
                <div class="from">Départ : <?= $ticket['airport_departure'] ?> | <?= $ticket['country_departure'] ?></div>
                <div class="to">Arrivé : <?= $ticket['airport_arrival'] ?> | <?= $ticket['country_arrival'] ?></div>
            </div>
            <div class="dates">
                <div class="departure">Décollage : <?= $ticket['date_departure'] ?></div>
                <div class="arrival">Atterrissage : <?= $ticket['date_arrival'] ?></div>
            </div>
            <div class="seat-info">
                <div class="seat-cat">Catégorie : <?= $ticket['seat_cat'] ?></div>
                <div class="price">Prix : <?= $ticket['price'] ?>€</div>
            </div>
            <a href="./tickets/<?= $ticket['id_ticket'] ?>"><button>réserver</button></a>
        </div>
        <?php
    }
    ?>
</div>
<?php

$content = ob_get_clean();

$script = '';

require_once('layout.php');

?>