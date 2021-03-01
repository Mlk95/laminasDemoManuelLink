<?php

namespace Userdata;

use Laminas\Router\Http\Segment;

/** Routing für das Userdata Modul.
 * Welche Factorys für welchen Controller.
 * Url für requests um an Controlleractions weiter zu leiten.
 * Daten aus Actions die an Views übergeben werden und in Form von HTML gerendert werden sollen.
 */
return [
    'router' => [
        'routes' => [
            'userdata' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/userdata[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\UserdataController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'userdata' => __DIR__ . '/../view',
        ],
    ],
];