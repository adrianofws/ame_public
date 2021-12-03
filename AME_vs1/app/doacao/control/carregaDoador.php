<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/DoacaoDAO.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/UsuarioDAO.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/model/Usuario.php');

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');

$idReceptor = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "idReceptor"), FILTER_SANITIZE_STRING));

$usuario = new Usuario();

$usuario->setIdUsuario($idReceptor);

$result = (new DoacaoDAO())->getModalAgendaDoacao($usuario);

echo json_encode(['STATUS' => true, 'RESULT' => $result]);
