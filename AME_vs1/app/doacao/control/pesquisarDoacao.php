<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/DoacaoDAO.php');

header("Content-Type: application/json");

$result = (new DoacaoDAO())->getDoacoes();

echo json_encode(['STATUS' => true, 'RESULT' => $result]);
