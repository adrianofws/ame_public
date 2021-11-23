<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/model/Doacao.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/BaseDAO.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/model/Usuario.php');
class DoacaoDAO extends BaseDAO {

    private $limpaObjetos = false;

	public function __construct($limpaObjetos = false) {
		$this->limpaObjetos = $limpaObjetos;
	}
    
    public function insertUsuario(Doacao $doacao) {

        $sql = "INSERT INTO doacao (
                    id_doador, 
                    id_receptor,
                    id_empresa,
                    dt_doacao) VALUES (:id_doador, 
                                      :id_receptor, 
                                      :id_empresa, 
                                      ':dt_doacao')";

        $parameters = array(
            ':id_doador' => $doacao->getIdDoador(),
            ':id_receptor' => $doacao->getIdReceptor(),
            ':id_empresa' => $doacao->getIdEmpresa(),
            ':dt_doacao' => $doacao->getDtDoacao(),
        );

        parent::insert($sql, $parameters);

    }

    public function getDoacao($idDoacao)
	{
		return parent::getListCastParam("SELECT * FROM doacao WHERE id_doacao = :id_doacao", array(':id_doacao' => $idDoacao));
	}

    public function getDoacoes()
	{
		return parent::getListCast("SELECT * FROM doacao");
	}

    public function getReceptoresWhere($where)
	{
        
        $sql = "select
                    UR.ID_USUARIO ID_RECEPTOR,
                    UR.NM_USUARIO NM_RECEPTOR,
                    E.NM_EMPRESA,
                    RE.DS_MOTIVO_DOACAO
                from
                    doacao d,
                    empresa e,
                    usuario ur,
                    receptor_empresa re,
                    estado es,
                    bairro b ,
                    cidade c 
                where 1=1
                    and D.ID_RECEPTOR = UR.ID_USUARIO
                    and D.ID_EMPRESA = E.ID_EMPRESA
                    and E.ID_EMPRESA = RE.ID_EMPRESA
                    and UR.ID_USUARIO = RE.ID_RECEPTOR
                    and e.id_federacao = es.id_estado
                    and e.ID_BAIRRO = b.ID_BAIRRO 
                    and e.ID_CIDADE = c.ID_CIDADE
                    $where";
		
        return parent::getListNoCast($sql);
	}

    public function getModalAgendaDoacao(Usuario $usuario)
	{
        
        $sql = "select
                    E.ID_EMPRESA,
                    UR.ID_USUARIO ID_RECEPTOR,
                    E.NM_EMPRESA,
                    E.DS_ENDERECO,
                    UR.NM_USUARIO,
                    UR.NR_IDADE,
                    RE.DS_MOTIVO_DOACAO
                from
                    doacao d,
                    empresa e,
                    usuario ur,
                    receptor_empresa re
                where 1=1
                    and UR.ID_USUARIO = :id_receptor
                    and D.ID_RECEPTOR = UR.ID_USUARIO
                    and D.ID_EMPRESA = E.ID_EMPRESA
                    and E.ID_EMPRESA = RE.ID_EMPRESA
                    and UR.ID_USUARIO = RE.ID_RECEPTOR";

        $parameters = array(
            ':id_receptor' => $usuario->getIdUsuario()
        );
		
        return parent::getListNoCastParam($sql, $parameters);
	}

    protected function processRow($result) {

		$doacao = new Doacao($result,$this->limpaObjetos);
		
        return $doacao;
	
    }

}

?>