<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {

    if(Configure::read('App.maintenance'))
    {
        $routes->connect('*', ['controller' => 'Offline', 'action' => 'index']);
    }
    else
    {
        $routes->connect('/', ['controller' => 'Pages', 'action' => 'home']);

        $routes->connect('/privacidade', ['controller' => 'Pages', 'action' => 'privacidade']);
        $routes->connect('/secretaria/*', ['controller' => 'Secretaria', 'action' => 'index']);
        $routes->connect('/faleconosco', ['controller' => 'Pages', 'action' => 'faleconosco']);
        $routes->connect('/fale-conosco', ['controller' => 'Pages', 'action' => 'faleconosco']);
        $routes->connect('/contato', ['controller' => 'Pages', 'action' => 'contato']);
        $routes->connect('/transparencia', ['controller' => 'Pages', 'action' => 'transparencia']);
        $routes->connect('/construcao', ['controller' => 'Pages', 'action' => 'construcao']);
        $routes->connect('/fale-sucesso', ['controller' => 'Pages', 'action' => 'contatosucesso']);
        $routes->connect('/notafiscal', ['controller' => 'Pages', 'action' => 'notafiscal']);
        $routes->connect('/iluminacao', ['controller' => 'Ouvidoria', 'action' => 'iluminacao']);
    }

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
