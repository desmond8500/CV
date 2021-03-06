<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});










Route::resource('taches', 'tachesAPIController');





Route::resource('skills', 'SkillsAPIController');

Route::resource('interets', 'InteretAPIController');

Route::resource('formations', 'FormationAPIController');

Route::resource('competences', 'CompetenceAPIController');

Route::resource('etat__civils', 'Etat_CivilAPIController');

Route::resource('langues', 'LangueAPIController');

Route::resource('exptasks', 'ExptaskAPIController');