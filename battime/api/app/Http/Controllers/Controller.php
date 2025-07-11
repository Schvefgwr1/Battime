<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.4.8.8",
 *      title="BATTIME Api Documentation",
 *      description="Профессиональная документация Севы, Паши и ChatGPT)",
 *      @OA\Contact(
 *          email=L5_SWAGGER_CONST_EMAIL
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Основной и единственный API"
 * )
 */

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
