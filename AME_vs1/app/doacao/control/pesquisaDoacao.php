<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/DoacaoDAO.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/UsuarioDAO.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/EmpresaDAO.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/EstadoDAO.php');

header("Content-Type: application/json");

$result = (new DoacaoDAO())->getDoacoes();
// $result = (new UsuarioDAO())->getUsuario(1);
// $result = (new EmpresaDAO())->getEmpresas();
// $result = (new EstadoDAO())->getEstado(1);

echo json_encode(['STATUS' => true, 'RESULT' => $result]);
