<?php
// little php 7.0 :)
//use App\{PortDb, PortApi};  
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/schedule', 'ScheduleController@index');
/* Route::get('/run', function () {
    $portdb = new PortDB(new PortApi);
    // Date format: YYYY-MM-DD
    $portdb->store('2020-03-05');
    return redirect('/schedule');
}); */
