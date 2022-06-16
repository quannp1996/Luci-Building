<?php

/**
 * @apiGroup           Magazine
 * @apiName            findMagazineById
 *
 * @api                {GET} /v1/magazines/:id Endpoint title here..
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
$router->get('magazines/{id}', [
    'as' => 'api_magazine_find_magazine_by_id',
    'uses'  => 'Controller@findMagazineById',
    'middleware' => [
      'auth:api',
    ],
]);
