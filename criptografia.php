<?php
    $senha = "teste123";
    echo $senha;

    //criptografando a senha
    $senha_criptografada = md5($senha);
    echo "<br> a senha criptografada é: ".$senha_criptografada;

?>