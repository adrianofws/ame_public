<?php 

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/UsersDAO.php');

$cpf = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "cpf"), FILTER_SANITIZE_NUMBER_INT));
$nome = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "nome"), FILTER_SANITIZE_STRING));
$endereco = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "endereco"), FILTER_SANITIZE_STRING));

$userDAO = new UsersDAO();

$result = $userDAO->insert($cpf, $nome, $endereco);

echo json_encode($result, JSON_PRETTY_PRINT);

?>