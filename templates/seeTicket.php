<?php

$title = 'Billet';

$dt = strtotime($ticket['date_departure']);
$at = strtotime($ticket['date_arrival']);
$f = rand(1000,9999);
$d = chr(rand(65,90)).rand(1,9);

ob_start();

?>
<link rel="stylesheet" href="../css/seeTicket.css?<?= time() ?>">
<?php

$loader = ob_get_clean();

ob_start();

?>
<div class="data">
    <div class="top-info">
        <div class="passenger">
            <p>NOM DU PASSAGER</p>
            <span>JOHN DOE</span>
        </div>
        <div class="flight">
            <p>NUMERO DE VOL</p>
            <span>F<?= $f ?></span>
        </div>
        <div class="departure">
            <p>DECOLLAGE</p>
            <span><?= date('j M Y G:i',) ?></span>
        </div>
        <div class="arrival">
            <p>ATTERRISAGE</p>
            <span><?= date('j M Y G:i',) ?></span>
        </div>
    </div>
    <div class="from-to">
        <div class="from">
            <h3><?= $ticket['country_departure'] ?></h3>
            <p><?= $ticket['airport_departure'] ?></p>
        </div>
        <div class="sign">
            <span>=></span>
        </div>
        <div class="to">
            <h3><?= $ticket['country_arrival'] ?></h3>
            <p><?= $ticket['airport_arrival'] ?></p>
        </div>
    </div>
    <div class="seat-info">
        <div class="gate">
            <p>Porte</p>
            <span><?= $d ?></span>
        </div>
        <div class="id-seat">
            <p>Numéro de siège</p> 
            <span><?= $ticket['id_seat'] ?></span>
        </div>
        <div class="seat-cat">
            <p>Catégorie</p> 
            <span><?= $ticket['seat_cat'] ?></span>
        </div>
        <div class="price">
            <p>Prix</p>
            <span><?= $ticket['price'] ?>€</span>
        </div>
    </div>
</div>
<div class="purchase">
    <h2>VOL F<?= $f ?></h2>
    <div class="travel">
        <p><span><?= $ticket['country_departure'] ?></span> => <span><?= $ticket['country_arrival'] ?></span></p>
    </div>
    <div class="info">
        <div class="gate in-info">
            <p>Porte</p>
            <span><?= $d ?></span>
        </div>
        <div class="seat-cat in-info">
            <p>Catégorie</p>
            <span><?= $ticket['seat_cat'] ?></span>
        </div> 
        <div class="id-seat in-info">
            <p>Numéro de siège</p>
            <span><?= $ticket['id_seat'] ?></span>
        </div>
    </div>
    <div class="price">
        <p>Prix</p>
        <h3><?= $ticket['price'] ?>€</h3>
    </div>
    <form action="./<?= $id ?>" method="post">
        <button type="submit">Réserver</button>
    </form>
</div>
<?php

$content = ob_get_clean();

$script = '';

require('layout.php');
