<?php
    //Importando a página de connect
    require("connect.php");

    //Obtendo os valores do formulário
    $nome_jogo = $_POST["c_nome"];  
    $id_categoria = $_POST["categoria_jogo"];
     
    //Mostrando informações da imagem
    if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0)
	{			
        //Mostrando na tela as ifnormações do arquivo enviado	
		echo "Você enviou o arquivo: <strong>" . $_FILES['arquivo']['name'] . "</strong><br />";
		echo "Este arquivo é do tipo: <strong>" . $_FILES['arquivo']['type'] . "</strong><br />";
		echo "Temporáriamente foi salvo em: <strong>" . $_FILES['arquivo']['tmp_name'] . "</strong><br />";
		echo "Seu tamanho é: <strong>" . $_FILES['arquivo']['size'] . "</strong> Bytes<br /><br />";
        
        //Armazenando o nome do arquivo e o local da imagem(o local temporário)
        $nome = $_FILES['arquivo']['name'];
        $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
								
		//Obtendo a extensão do arquivo e aramzenando em uma variável
		$extensao = strrchr($nome, '.');
				
		//Convertendo o texto em minúsculo
		$extensao = strtolower($extensao);

        if(strstr('.jpg;.jpeg;.gif;.png', $extensao))
		{ 
            // Cria um nome único para esta imagem
			// Evita que duplique as imagens no servidor.
			$novoNome = md5(microtime()) . $extensao;
					
			// Concatena a pasta com o nome
			$destino = 'images/capas/' . $novoNome; 

            // tenta mover o arquivo para o destino
			if( @move_uploaded_file( $arquivo_tmp, $destino  ))
			{
				echo "Arquivo salvo com sucesso em : <strong>" . $destino . "</strong><br />";
				echo "<img src=\"" . $destino . "\" />";	          	
			}
			else
			{	
				echo "Erro ao salvar o arquivo.<br/>";
			}
        }
        else
        {
            echo "Você poderá enviar apenas arquivos \"*.jpg;*.jpeg;*.gif;*.png\"<br />";
        }
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
        $sql_cadastrar = "INSERT INTO `jogos`(`nome_jogo`,`id_categoria`,`local_imagem`) VALUES ('$nome_jogo',$id_categoria,'$destino')";
        //Executando a SQL
        mysqli_query($conexao, $sql_cadastrar);
        //Imprimindo na tela             
        ?>
            <script>
                alert("Jogo cadastrado!");
                window.location.replace("form_cadastrar_jogo.php");
            </script>
        <?php
    }else{
        ?>
            <script>
                alert("Jogo já cadastrado");
                javascript:history.back();
            </script>
        <?php
    }     
?>