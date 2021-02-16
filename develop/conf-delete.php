<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Excluir cadastro</title>
</head>
<body>
    <?php
        require_once "includes/db.php";//importa o arquivo de conexão ao db
        require_once "functions.php";
    ?>
    <div id="container">
        <?php include_once "header.php"; ?>
        <h2>Excluir cadastro do vendedor:</h2>
        <?php
            $id = $_GET['id'] ?? 0;//recebe o id do vendedor
            $q = "delete from vendedores where id='$id'";

            $delete = $db->query($q);//executa a exclusão dos dados

            echo msg_sucesso("Cadastro excluído com sucesso!");

            echo voltar();
        ?>
    </div>
    <?php include_once "footer.php";?>
</body>
</html>