<?php
namespace Android\V1\Rest\User;

class UserResourceFactory
{
    public function __invoke($services)
    {
	      $mapper = $services->get('Android\V1\Rest\User\UserMapper');
        return new UserResource($mapper);
    }
}
