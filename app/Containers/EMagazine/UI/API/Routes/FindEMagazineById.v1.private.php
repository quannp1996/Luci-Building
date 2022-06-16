<?php

/**
 * @apiGroup           EMagazine
 * @apiName            findEMagazineById
 *
 * @api                {GET} /v1/emagazines/:id Endpoint title here..
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
$router->get('emagazines/{id}', [
    'as' => 'api_emagazine_find_e_magazine_by_id',
    'uses'  => 'Controller@findEMagazineById',
    'middleware' => [
      'auth:api',
    ],
]);
