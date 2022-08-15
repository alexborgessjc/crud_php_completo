<?php
    //Iniciando ou mantendo a session
    session_start();

    //mostrando o valor da session
    echo "Você está logado ".$_SESSION["nome"];    
?>