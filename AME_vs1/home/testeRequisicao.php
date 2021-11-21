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
    <script>

        let data = new FormData();

        data.append("estado", $("#idEstado").val());
        data.append("cidade", $("#idCidade").val());
        data.append("bairro", $("#idBairro").val());
        data.append("empresa", $("#idEmpresa").val());
        data.append("receptor", $("#nmReceptor").val());

        $.ajax({
            url: "./control/function/pesquisaDoacoes.php",
            type: "POST",
            dataType: "json",
            data: data,
            processData: false,
            contentType: false
        }).done(function(result) {
            console.log(result);

        }).fail(function(jqXHR, textStatus ) {
            console.log("Request failed: " + textStatus);

        }).always(function() {
            console.log("completou");
        });

    </script>
</html>
