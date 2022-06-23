<?php   
    //Importando o banco
    require("connect.php");

    //Obtendo o ID do jogo do formulário
    $id_jogo = $_POST['check_jogo'];
    
    //Verificando se existe o jogo
    $sql_pesquisa_jogo = "SELECT * FROM `jogos`";

    //Executando a pesquisa de categorias
    $resultado_pesquisa = mysqli_query($conexao,$sql_pesquisa_jogo);

    //Obtendo o numero de linhas retornadas na pesquisa
    $numero_resultado = mysqli_num_rows($resultado_pesquisa);

    if($numero_resultado == 0)
    {
        ?>
            <!-- Aqui tem Javascript!-->
            <script>
                alert("Não existe o jogo selecionado!");
                window.location.replace("form_excluir_jogo.php");
            </script>
        <?php
    }
    else
    {
        //Jogo encontrado! Criando a SQL de exclusao do jogo
        $sql_excluir_jogo = "DELETE FROM `jogos` WHERE id_jogo = $id_jogo";

        //Tranformando o resultado em um vetor
        $vetor_jogo = mysqli_fetch_array($resultado_pesquisa);

        //Excluindo a capa do jogo
        unlink($vetor_jogo[3]);

        //Executando a SQL
        mysqli_query($conexao, $sql_excluir_jogo);
        
        ?>
            <!-- Aqui tem Javascript!-->
            <script>
                //alert("Jogo excluido!");
                //window.location.replace("form_excluir_jogo.php");
            </script>
        <?php
    }
?>