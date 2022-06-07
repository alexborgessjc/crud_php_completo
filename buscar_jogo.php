<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Jogo</title>
</head>
<body>
    <h1>Página de Resultado da busca</h1>
    <?php
        $resultado_radio = $_GET['tipo_busca'];
        if($resultado_radio == 'todos')
        {
            //obtendo conexao
            require("connect.php");

            //SQL de buscar
            $sql_busca_jogo = "SELECT * FROM `jogos`";

            //Executando a busca
            $resultado_busca = mysqli_query($conexao,$sql_busca_jogo);

            //Transformando a buscar em vetor
            $resultado_numero = mysqli_num_rows($resultado_busca);

            //Verificando se existe algo cadastrado
            if($resultado_numero == 0)
            {
                ?>                        
                     <script>
                        alert("Não existe Jogos cadastrados");
                        window.location.replace("form_buscar_jogo.php");
                    </script>
                <?php
            }else{
                echo "Tem jogo sim!";
            }
        }        
        else{
            ?>  
                <form method="get" action="resultado_buscar_jogo.php">
                    Digite o nome do jogo:<input type="text" name="nome_jogo"><br>
                    <input type="submit" value="Buscar">
                </form>      
            <?php 
         }   
    ?>
</body>
</html>