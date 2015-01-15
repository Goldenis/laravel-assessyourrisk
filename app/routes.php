<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/pledge/{id}', 'PledgeController@get');
Route::get('/pledge/{id}/count', 'PledgeController@getCount');
Route::post('/pledge', 'PledgeController@post');

/**
 * Test harnesses --
 * 
 */
Route::get('/bmi', function()
{
	return View::make('scale');
});
Route::get('/charts', function()
{
	return View::make('charts');
});
Route::get('/roulette', function()
{
	return View::make('roulette');
});
Route::get('/pledge', function()
{
	return View::make('pledge');
});
