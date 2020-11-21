<?php
    session_start();
    session_destroy();
    header( 'Location: recipe_trial.php' )
?>