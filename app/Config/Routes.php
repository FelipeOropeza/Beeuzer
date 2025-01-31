<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

require APPPATH . 'Config/Routes/PublicRoutes.php';
require APPPATH . 'Config/Routes/UserRoutes.php';
require APPPATH . 'Config/Routes/AdminRoutes.php';
