<?php
    //Atribuindo os valores passados por POST
    $codigo_categoria = $_POST['select_alterar'];
    $novo_texto = $_POST['c_novo_texto'];   
    
    //Verificar se existe a categoria cadastrada!
    //Importando a conexao
    require("connect.php");

    //Criando a SQL de pesquisa
    $sql_pesquisa = 
    "SELECT * FROM `categoria` WHERE `descricao_categoria` = '$novo_texto'";

    //executando a pesquisa
    $resultado_pesquisa = mysqli_query($conexao,$sql_pesquisa); 
    
    //Transformando a pesquisa em numero!
    $numero_resultado = mysqli_num_rows($resultado_pesquisa);   

    //Verificando se existe algum registro
    if($numero_resultado != 0)
    {       
        //Aqui entra se já existe um valor com o valor informado
        ?>
        <script>
            alert("Existe categoria com este nome já cadastrado!");
            window.location.replace("form_alterar_categoria.php");
        </script>
        <?php
    }
    else
    {
        //Aqui entra SE A categoria está disponível para cadastrar
        //Gerando a SQL de ATUALIZAÇÃO
        $sql_cadastrar = "UPDATE `categoria`SET `descricao_categoria`= '$novo_texto' WHERE `id_categoria` = $codigo_categoria";
        //Executando a SQL
        mysqli_query($conexao, $sql_cadastrar);
        //Mensagem na tela
        ?>
        <script>
            alert("Categoria alterada com sucesso!");
            window.location.replace("form_alterar_categoria.php");
        </script>
        <?php
    }
?>