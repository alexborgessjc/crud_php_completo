<?php
    //Importando a página de connect
    require("connect.php");

    //Obtendo os valores do formulário
    $nome_jogo = $_POST["c_nome"];  
    $id_categoria = $_POST["categoria_jogo"];
     
    //Mostrando informações da imagem
    if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0)
	{				
		echo "Você enviou o arquivo: <strong>" . $_FILES['arquivo']['name'] . "</strong><br />";
		echo "Este arquivo é do tipo: <strong>" . $_FILES['arquivo']['type'] . "</strong><br />";
		echo "Temporáriamente foi salvo em: <strong>" . $_FILES['arquivo']['tmp_name'] . "</strong><br />";
		echo "Seu tamanho é: <strong>" . $_FILES['arquivo']['size'] . "</strong> Bytes<br /><br />";
    }
    else
	{
    ?>
        <script>
            alert("Você não enviou nenhum arquivo!");
            history.go(-1);
        </script>
    <?php		
	}
    //******** Verificando se já existe um  jogo cadastrado com o mesmo nome ******

    //Gerando a SQL de PESQUISA do nome do jogo
    $pesquisar_nome = "SELECT * FROM `jogos` WHERE nome_jogo = '$nome_jogo'";

    //Executando a SQL de pesquisa do nome do jogo
    $resultado_nome = mysqli_query($conexao, $pesquisar_nome);

    //Retornando o numero de linhas(objetos) encontrados
    $numero_retorno = mysqli_num_rows($resultado_nome);
    
    //Verificando se existe algum retorno    
    if($numero_retorno == 0)
    {
        //Gerando a SQL de inserção(Cadastrar) do jogo
        $sql_cadastrar = "INSERT INTO `jogos`(`nome_jogo`,`id_categoria`,`local_imagem`) VALUES ('$nome_jogo',$id_categoria,'teste')";
        //Executando a SQL
        mysqli_query($conexao, $sql_cadastrar);
        //Imprimindo na tela             
        ?>
            <script>
                //alert("Jogo cadastrado!");
                //window.location.replace("form_cadastrar_jogo.php");
            </script>
        <?php
    }else{
        ?>
            <script>
                //alert("Jogo já cadastrado");
                //javascript:history.back();
            </script>
        <?php
    }     
?>