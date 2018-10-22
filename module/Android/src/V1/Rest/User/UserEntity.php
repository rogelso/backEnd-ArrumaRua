<?php
namespace Android\V1\Rest\User;

class UserEntity
{
	public $id;

	public $nome;
	public $username;
	public $email;
	public $senha;
	public $img_perfil;


	public function getArrayCopy()
	{
		return array (
			'id'=> $this->id,
			'nome'=> $this->nome,
			'username' => $this->username,
			'email'=> $this->email,
			'senha'=> $this->senha,
			'img_perfil'=> $this->img_perfil
		);
	}


	public function exchangeArray( array $array)
	{
		$this->id = $array['id'];
		$this->nome = $array['nome'];
		$this->username = $array['username'];
		$this->email = $array['email'];
		$this->senha = $array['senha'];
	}
}
