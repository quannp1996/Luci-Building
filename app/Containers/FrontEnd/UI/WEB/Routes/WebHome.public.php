<?php

/** @var Route $router */

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'middleware' => [
            'htmloptimized',
            'Maintenance',
            'WebLocaleRedirect'
        ],
        'namespace' => 'Desktop\Home',
    ],
    function ($router) {
        $router->get('/', ['as'   => 'web.home.index', 'uses' => 'Controller@index',]);
        $router->get('/lien-he', ['as'   => 'web.lienhe.index', 'uses' => 'Controller@lienhe',]);
        $router->get('/{id}-{slug}', ['as'   => 'web.emagazine.detail', 'uses' => 'Controller@detail',]);
    }
);