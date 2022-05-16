<?php
    $codigo_categoria = $_POST['select_alterar'];
    $novo_texto = $_POST['c_novo_texto'];

    echo "Página de atualização";

    echo"<br>O código é: ".$codigo_categoria;
    echo"<br>O novo nome é: ".$novo_texto;
    //Verificar se existe a categoria cadastrada!
    //Criando a SQL de pesquisa
    $sql_pesquisa = 
    "SELECT * FROM `categoria` WHERE `descricao_categoria` = $codigo_categoria";
    
    //Transformando a pesquisa em numero!
    $numero_resultado = mysqli_num_rows()
    //Se não existir... cadastra!
    //Se existir... voltamos para o formulario!
?>