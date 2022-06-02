<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Página de Resultado da busca</h1>
    <?php
        $resultado_radio = $_GET['tipo_busca'];
        if($resultado_radio == 'todos')
        {
            echo "Você selecionou a busca por todos!"; 
        }        
        else{
            ?>  
                Digite o nome do jogo:<input type="text" name="nome_jogo">        
            <?php 
         }   
    ?>
</body>
</html>