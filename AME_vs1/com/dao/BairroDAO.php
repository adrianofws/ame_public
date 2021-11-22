<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/model/Bairro.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/BaseDAO.php');

class BairroDAO extends BaseDAO {

    private $limpaObjetos = false;

	public function __construct($limpaObjetos = false) {
		$this->limpaObjetos = $limpaObjetos;
	}
    
    public function insertBairro(Bairro $bairro) {

        $sql = 'INSERT INTO bairro (
                    id_bairro, 
                    nm_bairro) VALUES (:id_bairro, 
                                      :nm_bairro)';

        $parameters = array(
            ':id_bairro' => $bairro->getIdBairro(),
            ':nm_bairro' => $bairro->getNmBairro()
        );

        parent::insert($sql, $parameters);

    }

    public function getBairro($idBairro)
	{
		return parent::getListCastParam("SELECT * FROM bairro WHERE id_bairro = :id_bairro", array(':id_bairro' => $idBairro));
	}

    protected function processRow($result) {

		$bairro = new Bairro($result,$this->limpaObjetos);
		
        return $bairro;
	
    }

}

?>