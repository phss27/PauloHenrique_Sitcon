<?php
    

    function getprofessional(){
        require_once('models/conexao.php');

        $sql = "SELECT id, nome FROM profissional";

        $res = $conexao->query($sql);
    
        $qtd = $res -> num_rows;

        $rows = [];

        if($qtd > 0){


            while ($item = $res->fetch_object()) {
                $rows[$item->id]=$item->nome;
            }
        }
        
        return $rows;
    }
?>