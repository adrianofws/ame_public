<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/ReceptorEmpresaDAO.php');

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');

session_start();

$idEmpresa = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "idEmpresa"), FILTER_SANITIZE_STRING));
$dsMotivoDoacao = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "dsMotivoDoacao"), FILTER_SANITIZE_STRING));
$idUsuario = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "idUsuario"), FILTER_SANITIZE_STRING));

$receptorEmpresa = new receptorEmpresa();

$receptorEmpresa->setIdReceptor($idUsuario);
$receptorEmpresa->setIdEmpresa($idEmpresa);
$receptorEmpresa->setDsMotivoDoacao($dsMotivoDoacao);

$result = (new ReceptorEmpresaDAO())->insertReceptorEmpresa($receptorEmpresa);

echo json_encode(['STATUS' => true, 'RESULT' => $result]);