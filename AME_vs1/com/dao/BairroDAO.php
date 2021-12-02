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
                    nm_bairro,
                    id_cidade) VALUES (:id_bairro, 
                                      :nm_bairro,
                                      :id_cidade)';

        $parameters = array(
            ':id_bairro' => $bairro->getIdBairro(),
            ':nm_bairro' => $bairro->getNmBairro(),
            ':id_cidade' => $bairro->getIdCidade()
        );

        parent::insert($sql, $parameters);

    }

    public function getBairro($idBairro)
	{
		return parent::getListCastParam("SELECT * FROM bairro WHERE id_bairro = :id_bairro", array(':id_bairro' => $idBairro));
	}

    public function getBairrosByCidade($idCidade)
	{
        return parent::getListCastParam("SELECT * FROM bairro WHERE id_cidade = :id_cidade", array(':id_cidade' => $idCidade));
	}

    protected function processRow($result) {

		$bairro = new Bairro($result,$this->limpaObjetos);
		
        return $bairro;
	
    }

}

?>