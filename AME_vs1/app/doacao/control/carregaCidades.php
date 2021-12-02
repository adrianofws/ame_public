<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/CidadeDAO.php');

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');

$idEstado = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "idEstado"), FILTER_SANITIZE_STRING));

$result = (new CidadeDAO())->getCidadesByEstado($idEstado);

echo json_encode(['STATUS' => true, 'RESULT' => $result]);
