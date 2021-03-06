<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Tour;

// Homepage load
Route::GET('/', 'ItineraryController@index');

// Itinerary routes
Route::GET('/trips/explore', 'ItineraryController@all_trips');

Route::GET('/trips/{region?}', 'ItineraryController@trip_search');

Route::GET('/trips/{region?}/{trip?}', 'ItineraryController@itinerary_display');

// Booking routes

Route::POST('/booking', 'BookingController@index');

Route::VIEW('/booking/details', 'details');

Route::POST('/booking/details', 'BookingController@details');

Route::VIEW('/booking/payment', 'payment');

Route::POST('/booking/payment', 'BookingController@payment');

Route::VIEW('/booking/confirmed', 'confirmed');

Route::GET('/booking/forget', 'BookingController@forget');


// Debugging routes
Route::GET('/env', function () {
    dump(config('app.name'));
    dump(config('app.env'));
    dump(config('app.debug'));
    dump(config('app.url'));
});

Route::GET('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});
