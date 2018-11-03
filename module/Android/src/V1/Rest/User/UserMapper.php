<?php
namespace Android\V1\Rest\User;

use Zend\Db\TableGateway\TableGateway;


class UserMapper
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
			throw new \Exception("Usuario com id {$id}, não encontrado ", 1);
		}

		return $row;
	}

	public function save(UserEntity $user)
	{
			$data = [
				'nome' => $user->nome,
				'username' => $user->username,
				'email' => $user->email,
				'senha' => $user->senha,
				'img_perfil'=>$user->img_perfil
			];

			//$data = $cliente->getArrayCopy();

			$id = (int)$user->id;

			if($id == 0){
				$res = $this->tableGateway->insert($data);
				//$user->id = $this->tableGateway->lastInsertValue;
				//$id2 = 5;
				//return $this->fetchOne($id2);
				//return $user;

			} else {
					if($this->fetchOne($id)){
						$this->tableGateway->update($data, array('id'=>$id));
						return $user;
					}
			}
	}

	public function delete($id)
	{
		return $this->tableGateway->delete(array('id'=>(int)$id));
	}
}
