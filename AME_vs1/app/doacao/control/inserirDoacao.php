<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/DoacaoDAO.php');

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');

$idDoador = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "idDoador"), FILTER_SANITIZE_STRING));
$idReceptor = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "idReceptor"), FILTER_SANITIZE_STRING));
$idEmpresa = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "idEmpresa"), FILTER_SANITIZE_STRING));
$dsDoacao = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "dsDoacao"), FILTER_SANITIZE_STRING));
$dtDoacao = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "dtDoacao"), FILTER_SANITIZE_STRING));

$doacao = new Doacao();

$doacao->setIdDoador($idDoador);
$doacao->setIdReceptor($idReceptor);
$doacao->setIdEmpresa($idEmpresa);
$doacao->setDsDoacao($dsDoacao);
$doacao->setDtDoacao($dtDoacao);

$result = (new DoacaoDAO())->insertUsuario($doacao);

echo json_encode(['STATUS' => true, 'RESULT' => $result]);
