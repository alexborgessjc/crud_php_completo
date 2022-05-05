<?php   
    //Importando o banco
    require("connect.php");

    //Obtendo o ID da categoria do formulário
    $id_categoria = $_POST['check_categoria'];
    
    //Verificando se existe a categoria
    $sql_pesquisa_categoria = "SELECT * FROM `categoria`";

    //Executando a pesquisa de categorias
    $resultado_pesquisa = mysqli_query($conexao,$sql_pesquisa_categoria);

    //Obtendo o numero de linhas retornadas na pesquisa
    $numero_resultado = mysqli_num_rows($resultado_pesquisa);

    if($numero_resultado == 0)
    {
        ?>
            <!-- Aqui tem Javascript!-->
            <script>
                alert("Não existe a categoria selecionada");
                window.location.replace("form_excluir_categoria.php");
            </script>
        <?php
    }
    else
    {
        //Categoria encontrada! Criando a SQL de exclusao da categoria
        $sql_excluir_categoria = "DELETE FROM `categoria` WHERE id_categoria = $id_categoria";

        //Executando a SQL
        mysqli_query($conexao, $sql_excluir_categoria);
        ?>
            <!-- Aqui tem Javascript!-->
            <script>
                alert("Categoria excluida!");
                window.location.replace("form_excluir_categoria.php");
            </script>
        <?php
    }
?>