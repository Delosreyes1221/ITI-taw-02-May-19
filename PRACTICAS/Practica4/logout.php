<?php
    //Se reinicia la sesion 
    session_start();

    // Se cierra la sesion
    session_destroy();

    header('location: index.php');
?>