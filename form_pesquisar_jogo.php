<?php
    //Obtendo a conexão
    require('connect.php');

    //Criando a SQL de Pesquisa
    $sql_pesquisa = "SELECT * FROM `jogos` WHERE `nome_jogo` = 'Castlevania'";

    //Execução da pesquisa
    $resultado = mysqli_query($conexao, $sql_pesquisa);
    
    //Tranformando o valor em vetor
    $vetor = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Jogo</title>
</head>
<body>
    Nome do Jogo: <?php echo $vetor[1];?><br>
    Destino da imagem do jogo: <?php echo $vetor[3];?><br>   
    <img src=<?php echo $vetor[3];?>>
</body>
</html>