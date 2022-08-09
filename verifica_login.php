<?php		
	//Recebendo os valores
	$usuario = $_POST['c_login'];
	$senha2 = $_POST['c_senha'];
	
	//Criptografando a senha
	$senha = md5($senha2);
	
	//Conectando com o banco para fazer a consulta do usuario
	require('connect.php');
	
	//SQL de pesquisa de usuario e senha
	$sql_pesquisa ="select * from `usuarios` where `usuario` = '$usuario' AND `senha` = '$senha'";
	$resultado_usuario = mysqli_query($conexao,$sql_pesquisa);
	
	//tranformando em numero o resultado da pesquisa
	$numero_pesquisa = mysqli_num_rows($resultado_usuario);
	
	//mostrando na tela o numero de resultado de usuarios
	if($numero_pesquisa != 1)
	{
?>
		<script language='JavaScript'>
			document.location.href="dadosinvalidos.html";
		</script>				
<?php	
	}
	else
	{		
		//Login e a senha est�o corretos
			
		//Inicia a session
		session_start();
		
		//Criando o vetor do usuario
		$vetor = mysqli_fetch_array($resultado_usuario);
				
		//Registrando esta variavel na session
        $_SESSION["nome"] = $vetor['nome'];
		
		//Registrando esta variavel na session
        $_SESSION["codigo"] = $vetor['cod_cliente'];
		
		//Registrando esta variavel na session
        $_SESSION["imagem"] = $vetor['nome_imagem'];
		
		//Redirecionando para a Tela de Logado		
	?>
		<script language='JavaScript'>
			document.location.href="logado.php";
		</script>
	<?php
    }
?>
