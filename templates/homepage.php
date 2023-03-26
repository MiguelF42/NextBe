<?php 

$title = 'Homepage';

ob_start(); ?>
        <header id="home">
            <div id="hero-txt">
                <h1>
                    Let's The World Together!
                </h1>
                <p>
                    Find a flight to travel everywhere you want accross the world
                </p>
            </div>
            <div id="search-bar" class="flex-r flex-r-c">
                <form action="" method="post">
                    <label for="departure-airport">Point de départ
                        <select name="departure-airport" id="departure-airport">
                        </select>
                    </label>
                    <label for="arrival-airport">Destination
                        <select name="arrival-airport" id="arrival-airport">
    
                        </select>
                    </label>
                    <label for="departure-date">Date de départ
                        <input name="departure-date" id="departure-date" type="date" min="">
                    </label>
                    <label for="arrival-date">Date de retour
                        <input name="arrival-date" id="arrival-date" type="date" min="">
                    </label>
                    <button type="submit">Send</button>
                </form>
            </div>
        </header>
        <article>
            <section class="top-dest container">
                
            </section>
            <section class="travel-tips container">

            </section>
            <section class="why-choose container">

            </section>
        </article>
<?php

$content = ob_get_clean();

require('layout.php');

?>