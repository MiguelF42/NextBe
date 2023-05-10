<?php

use Application\Lib\Tools;

ob_start();

?>
<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<link rel="stylesheet" href="../css/reservations.css">
<?php

$loader = ob_get_clean();

ob_start();

?>
<div class="title-div">
    <h1>Vos réservations :</h1>
</div>
<div class="data">
    <table id='table'>
        <thead>
            <tr>
                <th>Aéroport de départ</th>
                <th>Pays de départ</th>
                <th>Date et heure de départ</th>
                <th>Aéroport de d'arrivé</th>
                <th>Pays de d'arrivé</th>
                <th>Date et heure de d'arrivé</th>
                <th>Catégorie du siège</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($reservations as $row)
                {
                    ?>
                    <tr>
                        <td><?= $row['airport_departure'] ?></td>
                        <td><?= $row['country_departure'] ?></td>
                        <td><?= $row['date_departure'] ?></td>
                        <td><?= $row['airport_arrival'] ?></td>                        
                        <td><?= $row['country_arrival'] ?></td>
                        <td><?= $row['date_arrival'] ?></td>
                        <td><?= $row['seat_cat'] ?></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</div>
<?php

$content = ob_get_clean();

ob_start();

?>
<script>
    $(document).ready( function () {
        $('#table').DataTable();
    } );
</script>
<?php

$script = ob_get_clean();

require_once($panel.'PanelLayout.php');