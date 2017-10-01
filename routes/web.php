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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', 'UserController@index');
Route::get('/users/{id}', 'UserController@getUser');

//Url para crear N cantidad de usuarios de forma automatica
//Recibe como parametro la cantidad de usuarios
Route::get('/create/users/{total}', function(Request $request, $total){
    $users = factory(App\User::class, (int)$total)->create();
    return $users;
});

//Url para crear N cantidad de post de forma automatica
//Recibe como parametro la cantidad de post y el id del usuario
Route::get('/create/post/{total}/{id}', function(Request $request, $total, $id){
    $user = \App\User::find($id);
    $post = factory(App\Post::class, (int)$total)->create([
        'user_id' => $user,
    ]);
    return $post;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
