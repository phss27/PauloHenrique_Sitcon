<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitcon - Registro </title>
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row pt-3 pb-3" style="background-color: #00629B">
            <div class="col-8"></div>
            <div class="col-4">
                <a class="btn btn-outline-light btn-sm mr-3" href="/views/registro.php" role="button">Solicitações Clínicas</a>
                <a class="btn btn-outline-light btn-sm" href="#" role="button">Listagem de Solicitações</a>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-light pl-5 pr-5 pb-4">
        <div class="row">
            <div class="col mt-3 mb-3">
                <form class="form-inline" action="pesquisa.php" >
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button><input class="form-control m-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" id="">

                </form>
            </div>
        </div>

        <?php

            require_once '../Models/conexao.php';
            
            $sql = "SELECT * FROM pacientes, tiposolicitacao, procedimentos";

            $res = $conexao->query($sql);

            $qtd = $res -> num_rows;

            if($qtd > 0){
                print "<table class='table table-hover table-striped ' id='listar-pagina'>";
                    print "<tr>";
                    print "<th>Paciente</th>";
                    print "<th>CPF</th>";
                    print "<th>Tipo Solicitação</th>";
                    print "<th>Procedimentos</th>";
                    print "<th>Data</th>";
                    print "<th>Hora</th>";
                    print "<th>Ações</th>";
                    print "</tr>";
                while ($row = $res->fetch_object()) {
                    print "<tr>";
                    print "<td>".$row->nome."</td>";
                    print "<td>".$row->CPF."</td>";
                    print "<td>".$row->descricao."</td>";
                    print "<td>".$row->descricao."</td>";
                    print "<td>".$row->dataNasc."</td>";
                    print "<td>".$row->hora."</td>";
                    print "<td>
                                <button class='btn btn-warning'>Prosseguir</button>
                            </td>";
                    print "</tr>";
                }
                print "</table>";
            }else{
                print "<p class ='alert alert-danger'>Não encontrou resultados!</p>";
                
            }

        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- <script src="../public/bootstrap/js/datatable.js"></script> -->
</body>
</html>
