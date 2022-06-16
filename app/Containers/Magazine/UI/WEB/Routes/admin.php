<?php
$router->group(
    [
        'prefix' => 'magazines',
        'namespace' => '\App\Containers\Magazine\UI\WEB\Controllers\Admin',
        'domain' => 'admin.' . parse_url(config('app.url'))['host'],
        'middleware' => [
            'auth:admin',
        ],
    ],
    function () use ($router) {
        $router->get('/', [
            'as'   => 'admin_magazines_home_page',
            'uses' => 'Controller@index',
        ]);

        $router->get('/ajax', [
            'as'   => 'admin_magazines_ajax',
            'uses' => 'Controller@ajax',
        ]);

        $router->get('/edit/{id}', [
            'as'   => 'admin_magazines_edit_page',
            'uses' => 'Controller@edit',
        ]);

        $router->post('/update/{id}', [
            'as'   => 'admin_magazines_update',
            'uses' => 'Controller@update',
        ]);

        $router->get('/add', [
            'as'   => 'admin_magazines_add_page',
            'uses' => 'Controller@create',
        ]);

        $router->post('/store', [
            'as'   => 'admin_magazines_store',
            'uses' => 'Controller@store',
        ]);

        $router->delete('/delete/{id}', [
            'as'   => 'admin_magazines_delete',
            'uses' => 'Controller@delete',
        ]);

        $router->get('/toggleStatus/{id}', [
            'as'   => 'admin_magazines_toggleStatus',
            'uses' => 'Controller@toggleStatus',
        ]);

        $router->post('/status/{field}', [
            'as'   => 'admin_magazines_change_status',
            'uses' => 'Controller@updateSomeStatus',
        ]);
    }
);
