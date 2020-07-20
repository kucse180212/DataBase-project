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

use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Route;
use App\Post;

//Route::get('/post/{id}','postController@index');


Route::get('/TBS',function ()
{
    return view('learning/login');
});

Route::get('/signup',function ()
{
    return view('learning/signup');
});
Route::get('/signupasadmin',function ()
{
    return view('Welcome');
});


Route::get('/Ticket_Booking_Sysytem', function () {
    return view('learning/Main');
});
Route::post('/sign_up_as_Customer','postController@save_customer');
Route::post('/sign_up_as_Admin','postController@save_Admin');
Route::post('/Buy_tickets/{post_id}','postController@checkticket');


Route::get('/Final_selection/{post_id}/{post_id2}',[
    'uses'=>'postController@finalcheck',
    'as'=>'Final_selection'
]);

Route::post('/check','postController@verify');
Route::post('/confirm_tickets/{post_id}/{post_id2}','postController@confirm_tickets');

Route::get('/place/{post_id}',[
    'uses'=>'postController@place',
    'as'=>'place'
]);

Route::get('googlemap',function()
{
    return view ('learning/googlemap');
});
Route::get('/stripecheckout',function()
{
    return view('learning/stripe_checkout');
});

Route::get('/add_company/{post_id}',[
    'uses'=>'postController@add_company',
    'as'=>'add_company'
]);

Route::post('/save_company/{post_id}',[
    'uses'=>'postController@save_company',
    'as'=>'save_company'
]);

Route::get('/returnpage/{post_id}',[
    'uses'=>'postController@return',
    'as'=>'returnpage'
]);

Route::get('/check_buses/{post_id}',[
    'uses'=>'postController@check_buses',
    'as'=>'check_buses'
]);

Route::get('/add_buses/{post_id}',[
    'uses'=>'postController@add_buses',
    'as'=>'add_buses'
]);

Route::post('/save_bus/{post_id}',[
    'uses'=>'postController@save_bus',
    'as'=>'save_bus'
]);

Route::get('/payment', 'PostController@index');
Route::post('/charge', 'PostController@charge');






