<?php
    //Obtendo os valores
    $nome = $_GET['nome_jogo'];
   
    //obtendo conexao
    require("connect.php");

    //SQL de buscar
    $sql_busca_jogo = "SELECT * FROM `jogos` WHERE `nome_jogo` LIKE '$nome%'";

    //Executando a busca
    $resultado_busca = mysqli_query($conexao,$sql_busca_jogo);

    //Transformando o resultado em números
    $resultado_numero = mysqli_num_rows($resultado_busca);

    //Verificando se existe algo cadastrado
    if($resultado_numero == 0)
    {
        ?>                        
             <script>
                alert("Jogo não encontrado");
                window.location.replace("form_buscar_jogo.php");
            </script>
        <?php
    }else{
        ?>
        <table border="1">
            <tr>
                <th>Nome do Jogo</th>
                <th>Capa do jogo</th>
            </tr>
            <tr>
        <?php
        //Laço de repetição
        for($i=0; $i < $resultado_numero;$i++)
        {
            //Tranformando o resultado em vetor
            $vetor_jogos = mysqli_fetch_array($resultado_busca);
            //Imprimindo na tela
            echo "<td>".$vetor_jogos[1]."</td>";   
            echo "<td><img src=".$vetor_jogos[3]." width=200 height=200></td>";                 
        }   
        echo"</tr></table>";
    }