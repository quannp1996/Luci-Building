<?php

/**
 * @apiGroup           EMagazine
 * @apiName            updateEMagazine
 *
 * @api                {PATCH} /v1/emagazines/:id Endpoint title here..
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
$router->patch('emagazines/{id}', [
    'as' => 'api_emagazine_update_e_magazine',
    'uses'  => 'Controller@updateEMagazine',
    'middleware' => [
      'auth:api',
    ],
]);
