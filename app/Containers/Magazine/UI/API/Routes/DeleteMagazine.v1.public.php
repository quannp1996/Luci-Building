<?php

/**
 * @apiGroup           Magazine
 * @apiName            deleteMagazine
 *
 * @api                {DELETE} /v1/magazines/:id Endpoint title here..
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
$router->delete('magazines/{id}', [
    'as' => 'api_magazine_delete_magazine',
    'uses'  => 'Controller@deleteMagazine',
    'middleware' => [
      'auth:api',
    ],
]);
