<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/DoacaoDAO.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/EmpresaDAO.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/UsuarioDAO.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/model/Empresa.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/EstadoDAO.php');

// $array = (new UsuarioDAO())->getUsuario(1);

// echo $array[0]->getNmUsuario();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Projeto Ame</title>
    <meta charset="UTF-8">
    <meta name="author" content="Adriano, Gabriel e Brunno">
    <meta name="description" content="lista de documentos">
</head>
<body>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

    function f1 () {

        let data = new FormData();

        data.append("nmEstado", "Pernambuco");
        data.append("nmCidade", "Paulista");
        data.append("nmBairro", "Janga");
        data.append("nmEmpresa", "PISOCOLA");
        data.append("nmReceptor", "Junior");

        $.ajax({
            url: "./control/pesquisaDoacao.php",
            type: "POST",
            dataType: "json",
            data: data,
            processData: false,
            contentType: false
        }).done(function(result) {
            console.log("Resultado: " + result);
        }).fail(function(jqXHR, textStatus ) {
            console.log("Request failed: " + textStatus);

        }).always(function() {
            console.log("completou");
        });
    
    }

    function f2 () {

        $.ajax({
            url: "./control/pesquisaDoacao.php",
            type: "POST",
            dataType: "json",
            processData: false,
            contentType: false
        }).done(function(result) {

            let resultado = result.RESULT;

            console.log("Resultado: ", resultado[0]);

        }).fail(function(jqXHR, textStatus ) {
            console.log("Request failed: " + textStatus);
        }).always(function() {
            console.log("completou");
        });

    }

    f2();

</script>
</html>
