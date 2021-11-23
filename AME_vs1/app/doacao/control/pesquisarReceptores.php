<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/DoacaoDAO.php');

header("Content-Type: application/json");

$nmEstado = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "nmEstado"), FILTER_SANITIZE_STRING));
$nmCidade = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "nmCidade"), FILTER_SANITIZE_STRING));
$nmBairro = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "nmBairro"), FILTER_SANITIZE_STRING));
$nmEmpresa = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "nmEmpresa"), FILTER_SANITIZE_STRING));
$nmReceptor = trim(FILTER_VAR(FILTER_INPUT(INPUT_POST, "nmReceptor"), FILTER_SANITIZE_STRING));

//Variaveis para busca
$where = "";

if ($nmEstado !== "")
    $where .= " AND (UPPER(es.nm_estado) LIKE UPPER('%$nmEstado%')) ";

if ($nmCidade!== "")
    $where .= " AND (UPPER(c.nm_cidade) LIKE UPPER('%$nmCidade%')) ";

if ($nmBairro !== "")
    $where .= " AND (UPPER(b.nm_bairro) LIKE UPPER('%$nmBairro%')) ";

if ($nmEmpresa !== "")
    $where .= " AND (UPPER(e.nm_empresa) LIKE UPPER('%$nmEmpresa%')) ";

if ($nmReceptor !== "")
    $where .= " AND (UPPER(ur.nm_usuario) LIKE UPPER('%$nmReceptor%')) ";

$result = (new DoacaoDAO())->getReceptoresWhere($where);

echo json_encode(['STATUS' => true, 'RESULT' => $result]);
