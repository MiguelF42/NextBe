<?php

ob_start();

foreach($airports as $airport)
{
    ?>
    <option value="<?= $airport->getIdAirport() ?>"><?= $airport->getName().' | '.$airport->getCountry() ?></option>
    <?php
}

$options = ob_get_clean();

ob_start();

?>
<link rel="stylesheet" href="../css/flight-manager.css">
<?php

$loader = ob_get_clean();

ob_start();

?>
<div class="title-div">
    <h1>Gestion des vols :</h1>
</div>
<form action="./flights-manager" method="post">
    <div class="date">
        <label for="date-departure">Date et heure de départ :
            <input type="datetime-local" name="date_departure" id="date_departure">
        </label>
        <label for="date-arrival">Date et heure d'arrivé :
            <input type="datetime-local" name="date_arrival" id="date_arrival">
        </label>
    </div>
    <div class="airport">
        <label for="airport_departure">Aéroport de départ :
            <select name="airport_departure" id="airport_departure">
                <?= $options ?>
            </select>
        </label>
        <label for="airport_arrival">Aéroprt d'arrivé :
            <select name="airport_arrival" id="airport_arrival">
                <?= $options ?>
            </select>
        </label>
    </div>
    <div class="plane">
        <label for="plane">Choix de l'avion :
            <select name="id_plane" id="plane">
                <?php
                foreach($planes as $plane)
                {
                    ?>
                    <option value="<?= $plane->getIdPlane() ?>"><?= $plane->getIdPlane()?></option>
                    <?php
                }
                ?>
            </select>
        </label>
    </div>
    <div class="pilots">
    <label for="pilot">Choix du pilote :
            <select name="id_pilot" id="pilot">
            <?php
            foreach($pilots as $pilot)
            {
                ?>
                <option value="<?= $pilot->getIdPilot() ?>"><?= $pilot->getIdPilot()?></option>
                <?php
            }
            ?>
            </select>
        </label>
    </div>
    <button type="submit">Création du vol</button>
</form>
<div class="data">
    <?php
        foreach($flights as $flight)
        {
            ?>
            <div class="flight">
                <div class="dates">
                    <p>Date et heure de départ : <?= $flight->getDateDeparture()->format('d M. Y') ?></p>
                    <p>Date et heure d'arrivé : <?= $flight->getDateArrival()->format('d M. Y') ?></p>
                </div>
                <div class="airports">
                    <p>Aéroport de départ : <?= $flight->getAirportDeparture() ?></p>
                    <p>Aéroport d'arrivé : <?= $flight->getAirportArrival() ?></p>
                </div>
                <div class="plane">
                    <p>Avion : <?= $flight->getIdPlane() ?></p>
                </div>
                <div class="pilot">
                    <p>Pilote : <?= $flight->getIdPilot() ?></p>
                </div>
            </div>
            <br>
            <?php
        }
    ?>
</div>
<?php

$content = ob_get_clean();

$script = '';

require('adminPanelLayout.php');

?>