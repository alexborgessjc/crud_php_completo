<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Jogo</title>
</head>
<body>
    <h1>Página de Busca de Jogos: </h1>
    <form method="GET" action="buscar_jogo.php">
        <input type="radio" name="tipo_busca" value="por_nome">Buscar Jogo por nome.<br>
        <input type="radio" name="tipo_busca" value="todos">Buscar todos os jogos.<br>
        <input type="submit" value="Ir">
    </form>
</body>
</html>