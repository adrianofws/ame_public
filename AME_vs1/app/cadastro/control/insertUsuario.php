<?php 

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/model/User.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/UserDAO.php');

$nome = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "nome"), FILTER_SANITIZE_STRING));
$sobrenome = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "sobrenome"), FILTER_SANITIZE_STRING));
$identidade = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "identidade"), FILTER_SANITIZE_NUMBER_INT));
$cpf = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "cpf"), FILTER_SANITIZE_NUMBER_INT));
$datanasc = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "datanasc"), FILTER_SANITIZE_STRING));
$endereco = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "endereco"), FILTER_SANITIZE_STRING));

$usuarioDAO = new UsuarioDAO();
$usuario = new Usuario();

$user->setNmUsuario($nome);
$user->setNmSobrenome($sobrenome);
$user->setNrCpf($cpf);
$user->setDtNascimento($datanasc);
$user->setDsEndereco($endereco);
$user->setDsDescricao($endereco);

$result = $userDAO->insertUser($user);

echo json_encode($result, JSON_PRETTY_PRINT);

?>