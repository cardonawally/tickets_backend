<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::middleware(['auth:api'])->get('/token/revoke', function (Request $request) {
    DB::table('oauth_access_tokens')
        ->where('user_id', $request->user()->id)
        ->update([
            'revoked' => true
        ]);
    return response()->json('Sesion cerrada',200);
});


Route::get('/tickets','TicketController@index');
Route::post('/tickets/save_ticket','TicketController@store');
Route::get('/ticket/{id}','TicketController@show');
Route::post('/ticket/{id}','TicketController@update');



