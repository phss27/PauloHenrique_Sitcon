<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <title>Sitcon - Registro </title>
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
                <div class="row">
                    <div class="col-2 mt-3">
                        <a class="btn btn-outline-primary" href="/views/registro.php" role="button">Voltar</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
            require_once '../Models/conexao.php';
            
            $sql = "SELECT * FROM pacientes";
            $res = $conexao->query($sql);
            $qtd = $res -> num_rows;

            if($qtd > 0){
                ?>
                <table class='table table-hover table-striped' id='listar-pagina'>
                  <thead>
                    <tr>
                      <th>Paciente</th>
                      <th>Nascimento</th>
                      <th>CPF</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($row = $res->fetch_object()) { ?>
                      <tr>
                        <td><?php echo $row->nome; ?></td>
                        <td><?php echo $row->dataNasc; ?></td>
                        <td class="cpf"><?php echo $row->CPF; ?></td>
                        <td>
                          <button onclick="location.href='?page=editar&id<?php echo $row->id; ?>';" class='btn btn-warning'>Prosseguir</button>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <?php
              } else {
                ?>
                <p class ='alert alert-danger'>Não encontrou resultados!</p>
                <?php
              }
        ?>
    </div>
   
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

  <script>
    $(document).ready(function () {
        $('#listar-pagina').DataTable({
            "language": {
            "lengthMenu": "Mostrar _MENU_ entradas por página",
            "zeroRecords": "Nenhum registro correspondente encontrado",
            "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas",
            "infoEmpty": "Mostrando de 0 a 0 de 0 entradas",
            "infoFiltered": "(filtrado de _MAX_ entradas no total)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primeiro",
                "last": "Último",
                "next": "Próximo",
                "previous": "Anterior"
            }
            }
        });
    });
  </script>

  <script>
    $(document).ready(function() {
        $('.cpf').mask('999.999.999-99');
    });
  </script>
</body>
</html>
