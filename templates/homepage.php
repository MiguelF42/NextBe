<?php 

$title = 'Homepage';

ob_start(); ?>
<h1>You are on the Homepage</h1>
<p>
    Then you must start your project now!
    <br>
    I hope this tools helped you to start
</p>
<?php

$content = ob_get_clean();

require('layout.php');

?>