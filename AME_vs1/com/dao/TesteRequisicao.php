<?php 

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/DoacaoDAO.php');

$doacao = new DoacaoDAO();

$array = $doacao->getDoacoes();

echo "RESULTADO: " . $array[0]["DOADOR"];

?>