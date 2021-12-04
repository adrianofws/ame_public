<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/EmpresaDAO.php');

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');

$idUsuario = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "idUsuario"), FILTER_SANITIZE_STRING));

$result = (new EmpresaDAO())->getListaEmpresas($idUsuario);

echo json_encode(['STATUS' => true, 'RESULT' => $result]);