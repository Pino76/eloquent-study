<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

use App\Models\User;
use App\Models\Hobby;
use App\Models\Favorite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/contacts', ContactController::class);

#HasOneThrow
Route::get('relation-hot', function (){
    return User::find(1)->branch()->get();
});


#HasManyThrow
Route::get('relation-hot', function (){
    return User::find(1)->phoneNumbers()->get();
});


#ManyToMany
Route::get('hobbies', function(){
    #return User::find(1)->hobbies;
    $user = User::find(1);
    collect($user->hobbies)->each(function ($item){
        echo "<p>Creato il " . $item->pivot->created_at . "</p>";
    });
});

Route::get('users', function(){
    return Hobby::find(2)->users;
});


Route::get('favorites', function (){
    $user = User::where('name', 'Peppiniello')->first();
    return $user->favorites;
});
