<?php 

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/model/Usuario.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/UsuarioDAO.php');

header("Content-Type: application/json");

$nmUsuario = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "nmUsuario"), FILTER_SANITIZE_STRING));
$nmSobrenome = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "nmSobrenome"), FILTER_SANITIZE_STRING));
$nrCpf = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "nrCpf"), FILTER_SANITIZE_NUMBER_INT));
$dtNascimento = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "dtNascimento"), FILTER_SANITIZE_STRING));
$dsEndereco = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "dsEndereco"), FILTER_SANITIZE_STRING));
$dsSenha = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "dsSenha"), FILTER_SANITIZE_STRING));
$dsDescricao = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "dsDescricao"), FILTER_SANITIZE_STRING));

if(empty($nmUsuario) || empty($nmSobrenome) || empty($nrCpf) || 
   empty($dtNascimento) || empty($dsEndereco) || empty($dsSenha) || 
   empty($dsDescricao)) {

    echo json_encode(['STATUS' => false, 'MSG' => 'Campos não preenchidos']);
    die();
}

if(!empty($dtNascimento)) {

    $dtNascArray = explode("/", $dtNascimento);
    $dtNascimento = $dtNascArray[2] . "-" . $dtNascArray[1] . "-" . $dtNascArray[0];

}

$usuarioDAO = new UsuarioDAO();
$usuario = new Usuario();

$usuario->setNmUsuario($nmUsuario);
$usuario->setNmSobrenome($nmSobrenome);
$usuario->setNrCpf($nrCpf);
$usuario->setDtNascimento($dtNascimento);
$usuario->setDsEndereco($dsEndereco);
$usuario->setDsSenha($dsSenha);
$usuario->setDsDescricao($dsDescricao);

$result = $usuarioDAO->insertUsuario($usuario);

if($result) {
    echo json_encode(['STATUS' => true]);
} else {
    echo json_encode(['STATUS' => false, 'MSG' => 'Erro de insert']);
}

?>