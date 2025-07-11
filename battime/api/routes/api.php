<?php

use App\Http\Controllers\API\Auth\AdminEstablishmentAuthController;
use App\Http\Controllers\API\Auth\AuthSuperAdminController;
use App\Http\Controllers\API\Auth\AuthUserController;
use App\Http\Controllers\API\EstablishmentController;
use App\Http\Controllers\API\EstablishmentFiltersController;
use App\Http\Controllers\API\LikesEstablishmnetsController;
use App\Http\Controllers\API\SuperAdmin\SuperAdminController;
use App\Http\Controllers\API\UserProfileAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
header('Server: https://web.battime.tech');
header('Server: http://127.0.0.1:3000');


/**
 * UsersRoutes
 */
Route::post('/userauth',     [AuthUserController::class, 'authorizeForUserViaNumber']);
Route::post('/usercheck',    [AuthUserController::class, 'checksms']);

//User and institution interaction
Route::middleware('auth:sanctum')->get('/establishment_emoji_point',            [EstablishmentController::class, 'GetPoints'] );
Route::middleware('auth:sanctum')->get('/establishment_card',                   [EstablishmentController::class, 'GetRegisteredEstablishment']);

Route::middleware('auth:sanctum')->post('/establishment_filters',               [EstablishmentFiltersController::class, 'GetEstablishmentsWithFilters']);
Route::middleware('auth:sanctum')->get( '/get_filters',                         [EstablishmentFiltersController::class, 'GetFilters']);
Route::middleware('auth:sanctum')->post('/get_filtered_establishment',          [EstablishmentFiltersController::class, 'GetFilteredWithRadius']);
Route::middleware('auth:sanctum')->post('/establishments/{establishment}/like', [LikesEstablishmnetsController::class, 'toggleLike']);
Route::middleware('auth:sanctum')->post('/establishments/liked',                [LikesEstablishmnetsController::class, 'getLikedEsatblishment']);

Route::middleware('auth:sanctum')->get( '/get_profile',                         [UserProfileAuth::class, 'GetProfile']);
Route::middleware('auth:sanctum')->post('/update_profile',                      [UserProfileAuth::class, 'UpdateProfile']);

/**
 * SuperAdminRoutes
 */
Route::middleware(['auth:sanctum', 'super.admin'])->group(function () {
    Route::get      ('/superadmin/establishment_card',         [EstablishmentController::class,    'GetRegisteredEstablishment']);
    Route::get      ('/superadmin/get_establishments',         [EstablishmentController::class,    'getAllEstablishment']);
    Route::post     ('/superadmin/create_establishments',      [SuperAdminController::class,       'createEstablishments']);
    Route::get      ('/superadmin/establishments/{id}',        [SuperAdminController::class,       'show']);
    Route::get      ('/superadmin/search_establishments',      [SuperAdminController::class,       'searchEstablishmetnsByName']);
    Route::delete   ('/superadmin/delete/{id}',                [EstablishmentController::class,    'delete']);

});


Route::post('/superadmin/login',        [AuthSuperAdminController::class, 'loginSuperAdmin']);
Route::post('/superadmin/verify-2fa',   [AuthSuperAdminController::class, 'verify2FA']);

/**
 * EsatbilshmentAdminRoutes
*/
Route::post('/login/login_admin_establishment', [AdminEstablishmentAuthController::class, 'loginAdminEstab']);
Route::post('/login/forgot_password',           [AdminEstablishmentAuthController::class, 'forgotPassword']);
Route::post('/login/reset_password',            [AdminEstablishmentAuthController::class, 'confirmNewPassword']);

/*Route::group(['middleware' => ['auth:sanctum', 'super.admin']], function () {
    //Route::post('/superadmin/create_admin_establishment', [SuperAdminController::class, 'createEatabAdmin']);
    Route::get('/establishments', [EstablishmentController::class, 'index']);
});*/


