<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/model/ReceptorEmpresa.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/BaseDAO.php');

class ReceptorEmpresaDAO extends BaseDAO {

    private $limpaObjetos = false;

	public function __construct($limpaObjetos = false) {
		$this->limpaObjetos = $limpaObjetos;
	}
    
    public function insertReceptorEmpresa(ReceptorEmpresa $receptorEmpresa) {

        $sql = "INSERT INTO receptor_empresa (
                    id_empresa, 
                    id_receptor, 
                    ds_motivo_doacao) VALUES (:id_empresa, 
                                      :id_receptor, 
                                      :ds_motivo_doacao)";

        $parameters = array(
            ':id_empresa' => $receptorEmpresa->getIdEmpresa(),
            ':id_receptor' => $receptorEmpresa->getIdReceptor(),
            ':ds_motivo_doacao' => $receptorEmpresa->getDsMotivoDoacao(),
        );

        return parent::insert($sql, $parameters);

    }

    protected function processRow($result) {

		$receptorEmpresa = new ReceptorEmpresa($result,$this->limpaObjetos);
		
        return $receptorEmpresa;
	
    }

}

?>