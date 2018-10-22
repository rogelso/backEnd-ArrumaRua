<?php
namespace Android\V1\Rest\Publicacao;

class PublicacaoEntity
{
  public $id;
	public $id_user;
	public $endereco;
	public $descricao;
	public $img_1;
  public $img_2;
  public $img_3;


  public function getArrayCopy()
  {
    return array (
      'id'=> $this->id,
      'id_user'=> $this->id_user,
      'endereco' => $this->endereco,
      'descricao'=> $this->descricao,
      'img_1'=> $this->img_1,
      'img_2'=> $this->img_2,
      'img_3'=> $this->img_3
    );
  }


  public function exchangeArray( array $array)
  {
    $this->id = $array['id'];
    $this->id_user = $array['id_user'];
    $this->endereco = $array['endereco'];
    $this->descricao = $array['descricao'];
    $this->img_1 = $array['img_1'];
    $this->img_2 = $array['img_2'];
    $this->img_3 = $array['img_3'];
  }
}
