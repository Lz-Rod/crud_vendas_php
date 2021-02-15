<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "includes/db.php";
        require_once "functions.php";
    ?>
    <div id="container">
        <?php
            include_once "header.php";
            $id = $_GET['id'] ?? 0;//recebe o id do vendedor

            $q = "select vendedores.id, vendedores.nome, vendedores.email, vendas.comissao, vendas.valor_venda, vendas.data_venda from vendas join vendedores where id_vendedor='$id' and id='$id'";//query de exibição                
            
            $busca = $db->query($q);

            echo "<h2>Detalhes das vendas</h2>";

            if(!$busca) {
                echo "Busca falhou! $db->error";//testa a busca e se falhar retorna o erro
            } else {
                if($busca->num_rows >= 1) {//caso exista algum dado retornará os dados dentro da tabela
                    $reg = $busca->fetch_object();
                    echo "<h3>ID: $reg->id</h3>";
                    echo "<h3>Nome: $reg->nome</h3>";
                    echo "<h3>Email: $reg->email</h3>";
                    echo "<table class='vendas'>";
                        echo "<tr><th>VALOR COMISSÃO<th>VALOR DA VENDA<th>DATA DA VENDA<th>OPÇÕES";
                        while($reg=$busca->fetch_object()){
                            echo "<tr><td>R$ ".number_format($reg->comissao,2,",",".");
                            echo "<td>R$ ".number_format($reg->valor_venda,2,",",".");
                            echo "<td>".implode("/",array_reverse(explode("-",$reg->data_venda)));
                            echo "<td>".editar().deletar();
                        }
                    echo "</table>";
                } else {
                    echo "<p>Nenhum registro encontrado!</p>";//retorna essa mensagem caso não encontrar os dados
                }
            }
            echo voltar();
        ?>
    </div>
    <?php include_once "footer.php";?>
</body>
</html>