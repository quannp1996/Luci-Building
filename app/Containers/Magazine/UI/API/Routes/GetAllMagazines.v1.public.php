<?php

/**
 * @apiGroup           Magazine
 * @apiName            getAllMagazines
 *
 * @api                {GET} /v1/magazines Endpoint title here..
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

use App\Containers\Localization\Actions\CheckSegmentLanguageAction;

/** @var Route $router */
$router->group([
  'prefix' => app(CheckSegmentLanguageAction::class)->run().'/magazines',
  'middleware' => [
    'api',
  ],
], function($route){
  $route->get('/', [
    'as' => 'api_magazine_get_all_magazines',
    'uses'  => 'Controller@getAllMagazines',
  ]);
});
