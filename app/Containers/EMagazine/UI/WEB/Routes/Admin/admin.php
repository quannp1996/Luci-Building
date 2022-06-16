<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
Route::group(
    [
        'prefix' => 'emagazine',
        'namespace' => '\App\Containers\EMagazine\UI\WEB\Controllers\Admin',
        'domain' => 'admin.' . parse_url(Config::get('app.url'))['host'],
        'middleware' => [
            'auth:admin',
        ],
    ],
    function () use ($router) {
        $router->get('/', [
            'as' => 'admin_emagazine_list',
            'uses' => 'Controller@listEmagazine'
        ]);
        $router->get('/list', [
            'as' => 'admin_emagazine_list',
            'uses' => 'Controller@listEmagazine'
        ]);
        $router->get('/add', [
            'as' => 'admin_emagazine_add',
            'uses' => 'Controller@addEmagazine'
        ]);

        $router->get('/edit/{id}', [
            'as' => 'admin_emagazine_edit',
            'uses' => 'Controller@editEmagazine'
        ]);

        $router->post('/update/{id}', [
            'as' => 'admin_emagazine_update',
            'uses' => 'Controller@updateEmagazine'
        ]);

        $router->post('/store', [
            'as' => 'admin_emagazine_store',
            'uses' => 'Controller@storeEmagazine'
        ]);

        $router->delete('/delete/{id}', [
            'as' => 'admin_emagazine_delete',
            'uses' => 'Controller@deleteEmagazine'
        ]);

        $router->post('/disable/{id}', [
            'as' => 'admin_emagazine_disable',
            'uses' => 'Controller@disableEmagazine'
        ]);

        $router->post('/enable/{id}', [
            'as' => 'admin_emagazine_enable',
            'uses' => 'Controller@enableEmagazine'
        ]);

        $router->get('/replicate/{id}', [
            'as' => 'admin_emagazine_replicate',
            'uses' => 'Controller@replicateEmagazine'
        ]);
    }
);
