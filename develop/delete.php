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
            $q = "select id, nome, email from vendedores where id='$id'";

            $busca = $db->query($q);//busca para os dados do vendedor

            if(!$busca) {
                echo msg_erro("Busca falhou! $db->error");//testa a busca e se falhar retorna o erro
            } else {
                if($busca->num_rows >= 1) {//caso exista algum dado retornará os dados dentro da tabela
                    $reg = $busca->fetch_object();
                    echo "<h3>ID: $reg->id</h3>";
                    echo "<h3>Nome: $reg->nome</h3>";
                    echo "<h3>Email: $reg->email</h3>";
                    echo msg_aviso('Tem certeza que deseja excluir esse cadastro? As vendas desse vendedor também serão excluídas do sistema!');
                    echo "<p><a href='conf-delete.php?id=$reg->id'><button>Excluir</button></a>";
                    echo "<a href='index.php'><button>Cancelar</button></a></p>";
                } else {
                    echo msg_aviso("Nenhum registro encontrado!");//retorna essa mensagem caso não encontrar os dados
                }
            }
            echo voltar();
        ?>
    </div>
    <?php include_once "footer.php";?>
</body>
</html>