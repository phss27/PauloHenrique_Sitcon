<?php

    require_once '../Models/conexao.php';

    switch ($_REQUEST["acao"]){
        case 'cadastrar':
            $nome = $_POST["inputNome"];
            $data = $_POST["inputDataNasc"];
            $cpf = $_POST["inputCPF"];

            $sql = "INSERT INTO pacientes (inputNome,
            inputDataNasc, inputCPF) VALUES ('{$nome}', 
            '{$data}', '{$cpf}')";

            $res = $conexao->query($sql);

            if($res==true){
                print "<script>alert('Cadastro feito com sucesso!');</script>";
                print "<script>location.href='?page=listagem.php';</script>";
            }else{
                print "<script>alert('Não foi possível cadastrar!');</script>";
                print "<script>location.href='?page=listagem.php';</script>";
            }
            break;

        case 'editar':
            $nome = $_POST["inputNome"];
            $data = $_POST["inputDataNasc"];
            $cpf = $_POST["inputCPF"];

            $sql = "UPDATE pacientes SET inputNome='{$nome}',
                                         inputDataNasc='{$data}',
                                         inputCPF='{$cpf}'
                                         WHERE id=".$_REQUEST["id"];

            $res = $conexao->query($sql);

            if($res==true){
                print "<script>alert('Editado feito com sucesso!');</script>";
                print "<script>location.href='?page=listagem.php';</script>";
            }else{
                print "<script>alert('Não foi possível editar!');</script>";
                print "<script>location.href='?page=listagem.php';</script>";
            }

            break;

        case 'excluir':

            break;
    }
?>