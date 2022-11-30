<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

//use the controller
use App\Http\Controllers\{
    UserController,ArticleController,RegisterController
};

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




/*
|--------------------------------------------------------------------------
| ch 11
|--------------------------------------------------------------------------
*/

/**
* route to control register form
*/
Route::post('register', [RegisterController::class, 'register'])->name('post.register');

/**
* route to get register controller
*/
Route::get('register', [RegisterController::class, 'index'])->name('register');

Route::get('profile/{username}', [UserController::class, 'profile'])->name('user.profile');

Route::resource('articles', ArticleController::class);

/*
|--------------------------------------------------------------------------
| ch 7
|--------------------------------------------------------------------------
*/

// Route::get('test', function (){
//     return view('test')->with('title', 'Laravel');
// });

// Route::get('test2', function (){
//     return view('test2')->with('title', 'PHP');
// });

// Route::get('structures', function (){

//     $fruits = ['apple', 'orange', 'raisin'];
//     $data = [
//         'number'=> 5,
//         'fruits' => $fruits
//     ];

//     return view('structures', $data);
// });

/*
|--------------------------------------------------------------------------
| ch 6
|--------------------------------------------------------------------------
*/

// // utiliser un controller dans une route
// Route::get('profile/{username}', [UserController::class, 'profile'])->name('user.profile');

// // utiliser un controller resource
// Route::resource('articles', ArticleController::class);


// Route::resource('articles', ArticleController::class)->only([
//     'index', 'create', 'store', 'show'
// ]);

/*
->only
using this specifies by params which routes we want to ONLY use

->except 
using this specifies by params which routes we want to exclude from routes
*/


/*
|--------------------------------------------------------------------------
| ch 5
|--------------------------------------------------------------------------
*/

//retourner une view
// Route::get('test', function (){
//     return view('test.index');
// });

// //passer les params URL à la view
// Route::get('profile/{firstname}/{lastname}', function($firstname = null, $lastname = null){
    
//     //return view('profile.index')-> with('firstname', $firstname)-> with ('lastname', $lastname);

//     //return view('profile.index')->with(compact('firstname', 'lastname'));

//     //return view('profile.index')->withFirstname($firstname)->withLastname($lastname);

//     $data = [
//         'title' => 'my title',
//         'description' => 'my description',
//         'firstname' => $firstname,
//         'lastname' => $lastname,
//     ];

//     return view('profile.index',$data);
// });


// //passer les query string à la view 
// Route::get('test' ,function(){
//     $firstname = request()->query('firstname', null);
//     $lastname = request()->query('lastname', null);
//     $data = [
//         'title' => "Page de ".$firstname,
//         'description' => "Page de ".$firstname .' '. $lastname,
//         'firstname' => $firstname,
//         'lastname' => $lastname,
//     ];

//     return view('test.index', $data);
// });

/*
|--------------------------------------------------------------------------
| ch 4
|--------------------------------------------------------------------------
*/

// // utiliser les params URL
// Route::get("test/{user}", function ($user) {
//     echo 'hello ' . $user;
// });

// // utiliser les params URL
// // Route::get('profile/{name?}', function ($name = null) {
// //     if ($name) {
// //         echo 'hello ' . $name;
// //     } else {
// //         echo 'hello stranger';
// //     }
// // });

// //trier les articles avec les query string
// Route::get('articles', function () {
//     $articles = ['B', 'A', 'C'];

//     $sort = request()->query('sort', 'desc');

//     $count = request()->query('count', 5);

//     dump($count);

//     switch ($sort) {
//         case 'desc':
//             rsort($articles);
//             break;

//         case 'asc':
//             sort($articles);
//             break;

//         default:
//             # code...
//             break;
//     }

//     foreach ($articles as $article) {
//         echo '<p>' . $article . '</p>';
//     }
// });
