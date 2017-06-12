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
Router::defaultRouteClass('DashedRoute');
Router::extensions(['json']);
Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'UsersAdmin', 'action' => 'login']);

    $routes->connect('/get_user/*', ['controller' => 'Home','action'=>'getUser']);
    $routes->connect('/get_users', ['controller' => 'Home','action'=>'getUsers']);
    $routes->connect('/get_books', ['controller' => 'Home','action'=>'getBooks']);
    $routes->connect('/get_general_info', ['controller' => 'Home','action'=>'getGeneralInfo']);
    $routes->connect('/get_gallery', ['controller' => 'Home','action'=>'getGallery']);
    $routes->connect('/get_events', ['controller' => 'Home','action'=>'getEvents']);
    $routes->connect('/get_event/*', ['controller' => 'Home','action'=>'getEvent']);
    $routes->connect('/get_trivia/*', ['controller' => 'Home','action'=>'getTrivia']);
    $routes->connect('/get_survey/*', ['controller' => 'Home','action'=>'getSurvey']);
    $routes->connect('/get_new_clue/*', ['controller' => 'Home','action'=>'getNewClue']);
    $routes->connect('/get_assigned_clue/*', ['controller' => 'Home','action'=>'getAssignedClue']);
    
    $routes->connect('/activate_user/*', ['controller' => 'Home','action'=>'activateUser']);
    $routes->connect('/authenticate_user/*', ['controller' => 'Home','action'=>'authenticateUser']);
    $routes->connect('/send_survey/*', ['controller' => 'Home','action'=>'sendSurvey']);
    $routes->connect('/answer_trivia/*', ['controller' => 'Home','action'=>'answerTrivia']);
    $routes->connect('/register_token/*', ['controller' => 'Home','action'=>'registerToken']);
    $routes->connect('/reset_password/*', ['controller' => 'Home','action'=>'resetPassword']);
    $routes->connect('/send_email/*', ['controller' => 'Home','action'=>'sendEmail']);
    $routes->connect('/update_user/*', ['controller' => 'Home','action'=>'updateUser']);
    $routes->connect('/update_user_ios/*', ['controller' => 'Home','action'=>'updateUserIOS']);
    $routes->connect('/upload_image/', ['controller' => 'Home','action'=>'uploadImage']);
    $routes->connect('/get_parameters/', ['controller' => 'Home','action'=>'getParameters']);

    $routes->resources('UsersApp');
    $routes->resources('UsersAdmin');
    $routes->resources('GlobalParameters');
    $routes->resources('Notifications');
    //$routes->resources('CluesFound');
    $routes->resources('CluesAssigned');
    $routes->resources('Books');
    $routes->resources('CluesTreasure');
    $routes->resources('GeneralInformation');
    $routes->resources('Pictures');
    $routes->resources('Schedules');
    $routes->resources('Sections');
    $routes->resources('SectionsVisited');
    $routes->resources('SurveyAnswers');
    $routes->resources('SurveyQuestions');
    $routes->resources('SurveyResults');
    $routes->resources('TriviaAnswers');
    $routes->resources('TriviaQuestions');
    $routes->resources('TriviaResults');

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
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
    $routes->fallbacks('DashedRoute');
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
