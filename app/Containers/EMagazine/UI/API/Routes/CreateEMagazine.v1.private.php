<?php

/**
 * @apiGroup           EMagazine
 * @apiName            createEMagazine
 *
 * @api                {POST} /v1/emagazines Endpoint title here..
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
$router->post('emagazines', [
    'as' => 'api_emagazine_create_e_magazine',
    'uses'  => 'Controller@createEMagazine',
    'middleware' => [
      'auth:api',
    ],
]);
