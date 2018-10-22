<?php
namespace Android\V1\Rest\Publicacao;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class PublicacaoResource extends AbstractResourceListener
{
  protected $mapper;

  public function __construct($mapper)
  {
    $this->mapper = $mapper;
  }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
          $publicacaoEntity = new PublicacaoEntity();

          $publicacaoEntity->id_user= $data->id_user;
          $publicacaoEntity->endereco= $data->endereco;
          $publicacaoEntity->descricao = $data->descricao;

          $publicacaoEntity->img_1 = $data->img_1;
          $publicacaoEntity->img_2 = $data->img_2;
          $publicacaoEntity->img_3 = $data->img_3;


          return $this->mapper->save($publicacaoEntity);
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
      if($this->mapper->delete($id)){
          return true;
      }
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return $this->mapper->fetchOne($id);
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        return $this->mapper->fetchAll();
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patchList($data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
      $publicacaoEntity = new PublicacaoEntity();

      $publicacaoEntity->id= $id;
      $publicacaoEntity->id_user = $data->id_user;
      $publicacaoEntity->endereco = $data->endereco;
      $publicacaoEntity->descricao = $data->descricao;

      $publicacaoEntity->img_1 = $data->img_1;
      $publicacaoEntity->img_2 = $data->img_2;
      $publicacaoEntity->img_3 = $data->img_3;

      return $this->mapper->save($publicacaoEntity);
    }
}
