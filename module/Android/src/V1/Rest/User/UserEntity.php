<?php
namespace Android\V1\Rest\User;

class UserEntity
{
	public $id;
	public $username;
	public $email;


	public function getArrayCopy()
	{
		return array (
			'id'=> $this->id,
			'username' => $this->username,
			'email'=> $this->email
		);
	}


	public function exchangeArray( array $array)
	{
		$this->id = $array['id'];
		$this->username = $array['username'];
		$this->email = $array['email'];
	}
}
