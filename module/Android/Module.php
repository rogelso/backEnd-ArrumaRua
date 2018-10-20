<?php
namespace Android;

use ZF\Apigility\Provider\ApigilityProviderInterface;
use Zend\Db\ResultSet\ResultSet;
use Android\V1\Rest\User\UserEntity;
use Android\V1\Rest\User\UserMapper;
use Zend\Db\TableGateway\TableGateway;

use Zend\ModuleManager\Feature\ConfigProviderInterface;


class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
      return array(
        'factories' => array(
          'UserTableGateway' => function($sm){
            $dbAdapter = $sm->get('localhost');
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new UserEntity());
            return new TableGateway('user', $dbAdapter, null, $resultSetPrototype);
          },
          'Android\V1\Rest\User\UserMapper' =>  function($sm) {
            $tableGateway = $sm->get('UserTableGateway');
            return new UserMapper($tableGateway);
          }
        )
      );
    }

    public function getAutoloaderConfig()
    {
        return [
            'ZF\Apigility\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }
}
