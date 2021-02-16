<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Sistema de vendas</title>
</head>
<body>
    <?php
        require_once "includes/db.php";//importa o arquivo de conexão ao db
        require_once "functions.php";
        $ordem = $_GET['o'] ?? "i";
        $chave = $_GET['c'] ?? "";
        env_email("destino@email", "remetente@email")//inserir destinatário e remetente para envio do relatório diário de vendas
    ?>
    <div id="container">
        <?php include_once "header.php"; ?>
        <h2>Vendedores cadastrados:</h2>
        <!-- Form de ordenação e busca dos vendedores-->
        <form method="get" id="busca" action="index.php">
            <strong>Ordenar: </strong>
            <a href="index.php?o=i&c=<?php echo $chave;?>">ID</a> | 
            <a href="index.php?o=n&c=<?php echo $chave;?>">Nome</a> |
            <a href="index.php?o=e&c=<?php echo $chave;?>">E-Mail</a> |
            <a href="index.php"><strong>Mostrar todos</strong></a> |
            <strong>Buscar: </strong><input type="text" name="c" size="15" maxlength="100"/>
            <input type="submit" value="OK"/>
        </form>
        <!-- Exibição dos vendedores-->
        <table class='listagem'>
            <tr><th>ID<th>NOME<th>E-MAIL<th>OPÇÕES</tr>
            <?php
                $q = "select id, nome, email from vendedores ";//query de exibição
                
                if(!empty($chave)){//busca na lista de vendedores por id, nome ou email
                    $q .= "Where id like '%$chave%' OR nome like '%$chave%' OR email like '%$chave%' ";
                }

                switch ($ordem) {//ordenador da exibição dos vendedores
                    case "n":
                        $q .= "order by nome";
                        break;
                    case "e":
                        $q .= "order by email";
                        break;
                    default:
                        $q .= "order by id";
                }

                $busca = $db->query($q);
                if(!$busca) {
                    echo msg_erro("Erro na busca");
                } else {
                    if($busca->num_rows == 0) {
                        echo msg_aviso("Nenhum vendedor cadastrado");
                    } else {
                        while($reg=$busca->fetch_object()){
                            echo "<tr><td>$reg->id";
                            echo "<td><a href='vendas.php?id=$reg->id'>$reg->nome</a>";
                            echo "<td>$reg->email";
                            echo "<td><a href='edit.php?id=$reg->id'><span class='material-icons'>edit</span></a>";
                            echo "<a href='delete.php?id=$reg->id'><span class='material-icons'>delete</span></a>";
                        }
                    }
                }
            ?>
        </table>
    </div>
    <?php include_once "footer.php";?>
</body>
</html>