<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/DoacaoDAO.php');

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');

$idEmpresa = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "idEmpresa"), FILTER_SANITIZE_STRING));

// $where = "";

// if ($nmEstado !== "")
//     $where .= " AND (UPPER(es.nm_estado) LIKE UPPER('%$nmEstado%')) ";

// if ($nmCidade!== "")
//     $where .= " AND (UPPER(c.nm_cidade) LIKE UPPER('%$nmCidade%')) ";

// if ($nmBairro !== "")
//     $where .= " AND (UPPER(b.nm_bairro) LIKE UPPER('%$nmBairro%')) ";

// if ($nmEmpresa !== "")
//     $where .= " AND (UPPER(e.nm_empresa) LIKE UPPER('%$nmEmpresa%')) ";

// if ($nmReceptor !== "")
//     $where .= " AND (UPPER(ur.nm_usuario) LIKE UPPER('%$nmReceptor%')) ";

$result = (new DoacaoDAO())->getReceptoresByIdEmpresa($idEmpresa);

echo json_encode(['STATUS' => true, 'RESULT' => $result]);
