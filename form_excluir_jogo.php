<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Jogo</title>
</head>
<body>
    <h2>Excluir Jogo</h2>
    <form action="excluir_categoria.php" method="post">
        <table border="1">
            <tr>
                <td>ID do Jogo</td>
                <td>Nome do Jogo</td>
                <td>Selecionar</td>
            </tr>
            <?php
                //Conexão com o banco
                require("connect.php");

                //Gerando a SQL de PESQUISA dos jogos existentes no BD
				$pesquisar_jogos = "SELECT * FROM `jogos`";

                //Executando a SQL e armazenando o resultado em uma variavel
				$resultado_jogos = mysqli_query($conexao, $pesquisar_jogos);

                //Obtendo o numero de linhas retornadas na pesquisa
				$numero_resultado = mysqli_num_rows($resultado_jogos);

                if($numero_resultado == 0)
                {
                    ?>
                        <!-- Aqui tem Javascript!-->
                        <script>
                            alert("Não existe jogos cadastrados!");
                            window.location.replace("index.html");
                        </script>
                    <?php
                }
                else
                {
                    //Existe jogos cadastrados!
                    for($i = 0  ; $i < $numero_resultado; $i++)
                    {
                        //Gerando um vetor com as categorias
					    $vetor_jogos = mysqli_fetch_array($resultado_jogos);
                        echo"
                            <tr>
                                <td>$vetor_jogos[0]</td>
                                <td>$vetor_jogos[1]</td>
                                <td><input type='radio' name='check_categoria' value=$vetor_jogos[0]></td>
                            </tr>
                            ";
                    }
                }                
            ?>            
        </table>
        <br><input type="submit" value="Excluir">
    </form>
</body>
</html>