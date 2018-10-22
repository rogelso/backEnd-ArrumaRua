<?php
namespace Android\V1\Rest\Publicacao;

class PublicacaoResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('Android\V1\Rest\Publicacao\PublicacaoMapper');
        return new PublicacaoResource($mapper);
    }
}
