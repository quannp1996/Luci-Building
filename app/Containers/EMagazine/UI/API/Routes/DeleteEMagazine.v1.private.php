<?php

/**
 * @apiGroup           EMagazine
 * @apiName            deleteEMagazine
 *
 * @api                {DELETE} /v1/emagazines/:id Endpoint title here..
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
$router->delete('emagazines/{id}', [
    'as' => 'api_emagazine_delete_e_magazine',
    'uses'  => 'Controller@deleteEMagazine',
    'middleware' => [
      'auth:api',
    ],
]);
