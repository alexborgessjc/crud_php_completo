<?php
    //Importando a página de connect
    require("../connect.php");

    //Obtendo os valores do formulário
    $usuario = $_POST["c_usuario"];  
    $senha2 = $_POST["c_senha"];
    $nome = $_POST["c_nome"];
    $cpf = $_POST["c_cpf"];

    //criptografando a senha para salvar no BD
    $senha = md5($senha2);

    //Gerando a SQL de inserção(Cadastrar) do usuario        
    $sql_cadastrar = "INSERT INTO `usuarios`(`usuario`, `senha`, `nome`, `cpf`) VALUES ('$usuario','$senha','$nome',$cpf)";
        
    //Executando a SQL
    mysqli_query($conexao, $sql_cadastrar);
?>
    <script>
        alert("Usuário cadastrado!");
        window.location.replace("../index.html");
    </script>
