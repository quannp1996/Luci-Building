<?php

/**
 * @apiGroup           Magazine
 * @apiName            createMagazine
 *
 * @api                {POST} /v1/magazines Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->post('magazines', [
    'as' => 'api_magazine_create_magazine',
    'uses'  => 'Controller@createMagazine',
    'middleware' => [
      'auth:api',
    ],
]);
