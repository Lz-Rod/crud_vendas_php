<?php    
    //função para envio de relatório diário
    function env_email($destinatario, $remetente) {
        include "includes/db.php";
        $data = date('Y-m-d');
        $hora = date('H:i:s');
        $q_email = "select sum(valor_venda) from vendas where data_venda='$data'";
        $busca_email = $db->query($q_email);
        $reg = $busca_email->fetch_array();
        $res = array_sum($reg)/2;


        if($hora >= '23:59:00') {
            $headers = "MIME-Version: 1.1\r\n";
            $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
            $headers .= "From: $remetente\r\n"; 
            $headers .= "Return-Path: $remetente\r\n"; 
            $texto = "O total em vendas do dia $data foi R$ $res.";
            $envio = mail($destinatario, "Relatório diário $data", $texto, $headers);
            
            if($envio) 
            echo msg_sucesso("Relatório diário enviado com sucesso!");
            else
            echo msg_erro("O Relatório diário não pôde ser enviado.");
        } 

    }

    // ícone de voltar ao index
    function voltar() {
        return "<a href='index.php'><span class='material-icons md-36'>arrow_back</span></a>";
    }

    //Notificações do sistema
    function msg_sucesso($m) {
        $resp = "<div class='sucesso'><span class='material-icons'>check_circle</span>$m</div>";
        return $resp;
    }

    function msg_aviso($m) {
        $resp = "<div class='aviso'><span class='material-icons'>info</span>$m</div>";
        return $resp;
    }

    function msg_erro($m) {
        $resp = "<div class='erro'><span class='material-icons'>error</span>$m</div>";
        return $resp;
    }