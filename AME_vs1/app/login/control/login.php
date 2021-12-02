<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/DoacaoDAO.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/UsuarioDAO.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/model/Usuario.php');

header("Content-Type: application/json");

session_start();

$nrCpf = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "nrCpf"), FILTER_SANITIZE_STRING));
$dsSenha = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "dsSenha"), FILTER_SANITIZE_STRING));

$usuario = new Usuario();

$usuario->setNrCpf($nrCpf);
$usuario->setDsSenha($dsSenha);

$result = (new UsuarioDAO())->login($usuario);

if(count($result) > 0) {

    $idUsuarioLogado = $result[0]->getIdUsuario();

    $_SESSION["idUsuarioLogado"] = $idUsuarioLogado;
   
    echo json_encode(['STATUS' => true, 
                      'ID_USUARIO_LOGADO' => $_SESSION["idUsuarioLogado"], 
                      'RESULT' => $result]);

} else {

    echo json_encode(['STATUS' => false, 'RESULT' => ""]);

}

