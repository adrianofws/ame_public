<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/model/Empresa.php');
include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/com/dao/BaseDAO.php');

class EmpresaDAO extends BaseDAO {

    private $limpaObjetos = false;

	public function __construct($limpaObjetos = false) {
		$this->limpaObjetos = $limpaObjetos;
	}
    
    public function insertEmpresa(Empresa $empresa) {

        $sql = 'INSERT INTO empresa (
                    idEmpresa, 
                    idFederacao, 
                    idBairro,
                    nmEmpresa,
                    nrNumero,
                    nrCnpj,
                    nrCep,
                    dsEmail,
                    dsEndereco,
                    dsComplemento) VALUES (:id_empresa, 
                                      :id_federacao, 
                                      :id_bairro, 
                                      :nm_empresa, 
                                      :nr_numero, 
                                      :nr_cnpj, 
                                      :nr_cep, 
                                      :ds_emal, 
                                      :ds_endereco, 
                                      :ds_complemenmto)';

        $parameters = array(
            ':id_empresa' => $empresa->getIdEmpresa(),
            ':id_federacao' => $empresa->getIdFederacao(),
            ':id_bairro' => $empresa->getIdBairro(),
            ':nm_empresa' => $empresa->getNmEmpresa(),
            ':nr_numero' => $empresa->getNrNumero(),
            ':nr_cnpj' => $empresa->getNrCnpj(),
            ':nr_cep' => $empresa->getNrCep(),
            ':ds_emal' => $empresa->getDsEmail(),
            ':ds_endereco' => $empresa->getDsEndereco(),
            ':ds_complemenmto' => $empresa->getDsComplemento()
        );

        parent::insert($sql, $parameters);

    }

    public function getEmpresa($idEmpresa)
	{
		return parent::getListCastParam("SELECT * FROM empresa WHERE id_empresa = :id_empresa", array(':id_empresa' => $idEmpresa));
	}

    public function getEmpresas()
	{
		return parent::getListCast("SELECT * FROM empresa");
	}

    public function getListaEmpresas($idUsuario)
	{
		return parent::getListNoCastParam("SELECT
                                                e.NM_EMPRESA,
                                                e.DS_ENDERECO
                                            FROM 
                                                empresa e, 
                                                receptor_empresa re 
                                            where 1=1 
                                                and re.id_empresa = e.id_empresa 
                                                and re.id_receptor = :id_usuario", array(':id_usuario' => $idUsuario));
	}

    public function getEmpresasByEstadoCidadeBairro($idEstado, $idCidade, $idBairro)
	{
        return parent::getListCastParam("SELECT 
                                            * 
                                        FROM 
                                            empresa 
                                        WHERE 1=1 
                                            and id_federacao = :id_federacao
                                            and id_cidade = id_cidade
                                            and id_bairro = id_bairro", 
                                        array(':id_federacao' => $idEstado,
                                              ':id_cidade' => $idCidade,
                                              ':id_bairro' => $idBairro));
	}

    protected function processRow($result) {

		$empresa = new Empresa($result,$this->limpaObjetos);
		
        return $empresa;
	
    }

}

?>