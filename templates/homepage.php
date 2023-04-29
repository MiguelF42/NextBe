<?php 

$title = 'Homepage';

$loader = '';

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
                <form action="?action=reservation" method="post">
                    <label for="departure-airport">Point de départ :
                        <input type="text" name="departure-airport" id="departure-airport" class="searching">
                    </label>
                    <label for="arrival-airport">Destination :
                        <input type="text" name="arrival-airport" id="arrival-airport" class="searching">
                    </label>
                    <label for="departure-date">Date de départ :
                        <input name="departure-date" id="departure-date" type="date" min="">
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

ob_start();

?>
<script>
    const myHeaders = new Headers();

    const dpAirport = document.getElementById('departure-airport');
    const arAirport = document.getElementById('arrival-airport');

    dpAirport.oninput = (e) => {search(e);};
    arAirport.oninput = (e) => {search(e);};

    function search(e) 
    {
        let url = window.location.href.split('?')[0];
        let data = e.target.value;

        const myInit = {
            method: 'POST',
            header: myHeaders,
            mode: 'cors',
            cache: 'default',
            body: {
                search: data
            }
        };

        fetch(url+'?action=airports',myInit);
    } 

</script>
<?php

$script = ob_get_clean();

require('layout.php');

?>