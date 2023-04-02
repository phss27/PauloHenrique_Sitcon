$(document).ready(function () {
    $('#listar-pagina').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "../views/listar-paginas.php",
    });
});