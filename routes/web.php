<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;


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

Route::get('hello', function () {
    return "<h1> Hello! MCDS =) </h1>";
});

Route::get('allusers', function () {
    $users = App\Models\User::take(5)->get();
    dd($users);
});

Route::get('showuser/{id}', function (Request $request) {
    $id = $request->id;
    $user = App\Models\User::find($id);
    return view('showuser')->with('user', $user);
});


Route::get('challenge', function () {

    foreach(App\Models\User::all()->take(10) as $user) {
        $years     = Carbon::createFromDate($user->birthdate)->diff()->format('%y years old');
        $since     = Carbon::parse($user->created_at);
        $results[] = $user->fullname . " - " . $years . " - created " . $since->diffForHumans() . "<br>";
    }
    dd($results);
});

Route::get('viewusers', function() {
    $users = App\Models\User::all();
    return view('viewusers')->with('users', $users);
});

Route::get('examples', function() {
    return view('examples');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('locale/{locale}', [LocaleController::class, 'index']);

//Route::get('/user', [UserController::class, 'index']);


Route::resources([
    'users'     => UserController::class,
    //'catgories' => CategoryController::class,
    //'games'     => GameController::class,
]);