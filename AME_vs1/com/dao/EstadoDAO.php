<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/model/Estado.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/BaseDAO.php');

class EstadoDAO extends BaseDAO {

    private $limpaObjetos = false;

	public function __construct($limpaObjetos = false) {
		$this->limpaObjetos = $limpaObjetos;
	}
    
    public function insertEstado(Estado $estado) {

        $sql = 'INSERT INTO estado (
                    id_estado, 
                    nm_estado) VALUES (:id_estado, 
                                      :nm_estado)';

        $parameters = array(
            ':id_estado' => $estado->getIdEstado(),
            ':nm_estado' => $estado->getNmEstado()
        );

        parent::insert($sql, $parameters);

    }

    public function getEstado($idEstado)
	{
		return parent::getListCastParam("SELECT * FROM estado WHERE id_estado = :id_estado", array(':id_estado' => $idEstado));
	}

    protected function processRow($result) {

		$estado = new Estado($result,$this->limpaObjetos);
		
        return $estado;
	
    }

}

?>