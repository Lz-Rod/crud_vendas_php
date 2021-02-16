<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Cadastrar nova venda</title>
</head>
<body>
    <?php
        require_once "includes/db.php";//importa o arquivo de conexão ao db
        require_once "functions.php";
    ?>
    <div id="container">
        <?php include_once "header.php"; ?>
        <h2>Cadastrar nova venda:</h2>
        <?php
            if(!isset($_POST['id_vendedor'])) {//verifica se existe algum post com o id, caso negativo retorna o formulário de cadastro
                require "forms/new-venda-form.php";
            } else {
                $id_vendedor = $_POST['id_vendedor'] ?? null;
                $valor_venda = $_POST['valor_venda'] ?? null;
                
                if(empty($id_vendedor) || empty($valor_venda)) {
                    echo msg_erro("Todos os campos são obrigatórios!");
                } else {
                    $q = "insert into vendas (id_vendedor, valor_venda, data_venda) values ('$id_vendedor', '$valor_venda', now())";
                    
                    if($db->query($q)) {
                        echo msg_sucesso("Venda cadastrada com sucesso!");
                    } else {
                        echo msg_erro("Não foi possível cadastrar a venda, verifique os dados e tente novamente.");
                    }                 
                }
            }
            echo voltar();
        ?>
    </div>
    <?php include_once "footer.php";?>
</body>
</html>