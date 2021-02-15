<?php
    //CONEXÃO COM O DB
    $db = new mysqli("localhost", "root", "", "db_sis_vendas"); //informar host, user, password e db
    
    if($db->connect_errno) {//faz o tratamento de erros para problemas de conexão com db
        echo "<p>Encontrei um erro $db->errno --> $db->connect_error</p>";
        die();
    }

    //RESOLUÇÃO DE PROBLEMAS COM ACENTUAÇÃO
    $db->query("SET NAMES 'utf8'");
    $db->query("SET character_set_connection=utf8");
    $db->query("SET character_set_client=utf8");
    $db->query("SET character_set_results=utf8");