<?php

// Strict Types seit PHP7 davor möglich Datentypen und Rückgabewerte durch Typehints anzugeben.
declare(strict_types=1);

namespace Userdata;

use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig() : array
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    // returned factories die vom Module Manager gemerged werden:
    public function getServiceConfig(): array
    {
        return [
            'factories' => [
                Model\UserTable::class => function($container) {
                    $tableGateway = $container->get(Model\UserTableGateway::class);
                    return new Model\UserTable($tableGateway);
                },
                Model\UserTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\User());
                    return new TableGateway('user', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }


    public function getControllerConfig(): array
    {
        return [
            'factories' => [
                Controller\UserdataController::class => function($container) {
                    return new Controller\UserdataController(
                        $container->get(Model\UserTable::class),
                        $container->get(Service\DownloadUserDataService::class)
                    );
                },
            ],
        ];
    }
}