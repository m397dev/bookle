<?php

use App\Controllers\Admin\Home as AdminHome;
use App\Controllers\Shop\Home as ShopHome;
use CodeIgniter\Router\RouteCollection;

/**
 * Admin routes.
 *
 * @var RouteCollection $routes
 */
$routes->group('admin', static function ($routes) {
    /**
     * Get method.
     */
    $routes->get('/', [AdminHome::class, 'index']);

    /**
     * Post method.
     */
    // $routes->get(smth);

    /**
     * Ajax routes.
     */
    $routes->group('ajax', static function ($routes) {});
});

/**
 * Shop routes.
 *
 * @var RouteCollection $routes
 */
$routes->group('/', static function ($routes) {
    /**
     * Get method.
     */
    $routes->get('', [ShopHome::class, 'index']);

    /**
     * Post method.
     */
    // $routes->get(smth);

    /**
     * Ajax routes.
     */
    $routes->group('ajax', static function ($routes) {});
});
