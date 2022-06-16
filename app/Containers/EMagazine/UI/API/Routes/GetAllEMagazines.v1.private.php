<?php

/**
 * @apiGroup           EMagazine
 * @apiName            getAllEMagazines
 *
 * @api                {GET} /v1/emagazines Endpoint title here..
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
$router->get('emagazines', [
    'as' => 'api_emagazine_get_all_e_magazines',
    'uses'  => 'Controller@getAllEMagazines',
    'middleware' => [
      'auth:api',
    ],
]);
