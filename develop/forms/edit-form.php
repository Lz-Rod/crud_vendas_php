<?php
    $q = "select id, nome, email from vendedores where id='$id'";
    $busca = $db->query($q);
    $reg = $busca->fetch_object();
?>

<form action="edit.php" method="post">
    <table>
        <tr><td>ID<td><input type="text" name="id" id="id" size="20" maxlength="11" value="<?php echo $reg->id ?>" readonly>
        <tr><td>Nome<td><input type="text" name="nome" id="nome" size="20" maxlength="255" value="<?php echo $reg->nome ?>">
        <tr><td>E-Mail<td><input type="text" name="email" id="email" size="20" maxlength="100" value="<?php echo $reg->email ?>">
        <tr><td><input type="submit" value="Alterar">
    </table>
</form>