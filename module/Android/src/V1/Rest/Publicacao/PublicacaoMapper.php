<?php
namespace Android\V1\Rest\Publicacao;

use Zend\Db\TableGateway\TableGateway;


class PublicacaoMapper
{
	protected $tableGateway;


	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}

	public function fetchOne($id)
	{
		$id = (int) $id;
		$rowset = $this
			->tableGateway
			->select(array('id'=>$id));

		$row= $rowset->current();

		if(!$row){
			throw new \Exception("Publicação com id {$id}, não encontrada ", 1);
		}

		return $row;
	}

	public function save(PublicacaoEntity $publicacao)
	{
			$data = [
				'id_user' => $publicacao->id_user,
				'endereco' => $publicacao->endereco,
				'descricao' => $publicacao->descricao,
				'img_1' => $publicacao->img_1,
        'img_2' => $publicacao->img_2,
        'img_3' => $publicacao->img_3
			];

			$id = (int)$publicacao->id;

			if($id == 0){
				$res = $this->tableGateway->insert($data);

			} else {
					if($this->fetchOne($id)){
						$this->tableGateway->update($data, array('id'=>$id));
						return $this->fetchOne($id);
					}
			}
	}

	public function delete($id)
	{
		return $this->tableGateway->delete(array('id'=>(int)$id));
	}
}
