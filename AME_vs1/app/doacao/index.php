<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/DoacaoDAO.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/EmpresaDAO.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/UsuarioDAO.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/model/Empresa.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/EstadoDAO.php');

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

    function pesquisarReceptores () {

        let data = new FormData();

        data.append("nmEstado", "Pernambuco");
        data.append("nmCidade", "Paulista");
        data.append("nmBairro", "Janga");
        data.append("nmEmpresa", "PISOCOLA");
        data.append("nmReceptor", "Junior");

        $.ajax({
            url: "./control/pesquisarReceptores.php",
            type: "POST",
            dataType: "json",
            data: data,
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

    function pesquisarDoacao () {

        $.ajax({
            url: "./control/pesquisarDoacao.php",
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

    function agendarDoacao () {

        let data = new FormData();

        data.append("idReceptor", 3);

        $.ajax({
            url: "./control/agendarDoacao.php",
            type: "POST",
            dataType: "json",
            data: data,
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

    function inserirDoacao () {

        let data = new FormData();

        data.append("idDoador", 1);
        data.append("idReceptor", 3);
        data.append("idEmpresa", 4);
        data.append("dtDoacao", "2021-11-23");

        $.ajax({
            url: "./control/inserirDoacao.php",
            type: "POST",
            dataType: "json",
            data: data,
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

    // inserirDoacao();
    agendarDoacao();
    // pesquisarReceptores();

</script>
</html>
