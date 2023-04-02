<?php
    require_once('composers/professional.php');
    require_once('composers/solicitacao.php');
    require_once('composers/procedimentos.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitcon - Registro </title>
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap-multiselect.css">
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap-multiselect.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row pt-3 pb-3" style="background-color: #00629B">
            <div class="col-8"></div>
            <div class="col-4">
                <a class="btn btn-outline-light btn-sm mr-3" href="#" role="button">Solicitações Clínicas</a>
                <a class="btn btn-outline-light btn-sm" href="/views/listagem.php" role="button">Listagem de Solicitações</a>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-light pl-5 pr-5 pb-4">
        <div class="row">
            <div class="col-2 mt-3">
                <a class="btn btn-outline-primary" href="#" role="button">Voltar</a>
            </div>
        </div>

        <form action="../controllers/salvar.php" method="post">
            <input type="hidden" name="acao" value="cadastrar">
            <div class="form-row mt-4">
                <div class="form-group col-md-4 font-weight-bold">
                    <label for="inputNome">Nome do Paciente</label>
                    <input type="text" class="form-control" id="inputNome">
                </div>

                <div class="form-group col-md-4 font-weight-bold">
                    <label for="inputDataNasc">Data de nascimento</label>
                    <input type="date" class="form-control" id="inputDataNasc">
                </div>

                <div class="form-group col-md-4 font-weight-bold">
                    <label for="inputCPF">CPF</label>
                    <input type="text" class="form-control" id="inputCPF">
                </div>
            </div>
            <div class="form-group">
                <div class="alert alert-success justify-content-center" role="alert">
                    <strong>Atenção!</strong> Os Campos com * devem ser preenchidos obrigatoriamente.
                </div>
                <label for="inputProfissional" class="font-weight-bold">Profissional*</label>
                <select id="inputProfissional" class="form-control">
                    <?php
                        foreach (getprofessional() as $key => $value) {
                            echo "<option value='{$key}'>{$value}</option>";
                        }

                    ?>
                </select>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 font-weight-bold">
                    <label for="inputSolicitacao">Tipo de solicitação*</label>
                    <select id="inputSolicitacao" class="form-control">
                        <?php
                            foreach (getsolicitacao() as $key => $value) {
                                echo "<option value='{$key}'>{$value}</option>";
                            }

                        ?>

                    </select>
                </div>

                <div class="form-group col-md-6 font-weight-bold">
                    <label for="inputProcedimento">Procedimentos*</label>
                    <select id="inputProcedimento" class="form-control" >
                        <?php
                            foreach (getprocedimentos() as $key => $value) {
                                echo "<option value='{$key}'>{$value}</option>";
                            }

                        ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 font-weight-bold">
                    <label for="inputData">Data*</label>
                    <input type="date" class="form-control" id="inputData" placeholder="dd/mm/aaaa">
                </div>
                <div class="form-group col-md-6 font-weight-bold">
                    <label for="inputHora">Hora*</label>
                    <input type="time" class="form-control" id="inputHora" placeholder="__:__">
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <p class="text-center text-primary pt-4">Paulo_Henrique_SITCON</p>                
            </div>
            
        </div>
    </div>

    <script src="../public/bootstrap/js/bootstrap.js"></script>
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>