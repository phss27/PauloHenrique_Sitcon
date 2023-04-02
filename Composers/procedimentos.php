<?php
    
    function getprocedimentos(){
        require('models/conexao.php');

        $sql = "SELECT id, descricao FROM procedimentos";

        $res = $conexao->query($sql);
    
        $qtd = $res -> num_rows;

        $rows = [];

        if($qtd > 0){


            while ($item = $res->fetch_object()) {
                $rows[$item->id]=$item->descricao;
            }
        }
        
        return $rows;
    }
?>