<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Editar dados do vendedor</title>
</head>
<body>
    <?php
        require_once "includes/db.php";//importa o arquivo de conexão ao db
        require_once "functions.php";
    ?>
    <div id="container">
        <?php include_once "header.php"; ?>
        <h2>Editar dados do vendedor:</h2>
        <?php
            $id = $_GET['id'] ?? 0;//recebe o id do vendedor
            if(!isset($_POST['id'])) {//verifica se existe algum post com o id, caso negativo retorna o formulário de cadastro
                require "forms/edit-form.php";
            } else {
                $id = $_POST['id'] ?? null;
                $nome = $_POST['nome'] ?? null;
                $email = $_POST['email'] ?? null;
                
                if(empty($id) || empty($nome) || empty($email)) {
                    echo msg_erro("Todos os campos são obrigatórios!");
                } else {
                    $q = "update vendedores set nome='$nome', email='$email' where id='$id'";
                    
                    if($db->query($q)) {
                        echo msg_sucesso("Dados do vendedor $nome alterado com sucesso!");
                    } else {
                        echo msg_erro("Não foi possível alterar os dados do vendedor $nome, verifique os dados e tente novamente.");
                    }                 
                }
            }
            echo voltar();
        ?>
    </div>
    <?php include_once "footer.php";?>
</body>
</html>