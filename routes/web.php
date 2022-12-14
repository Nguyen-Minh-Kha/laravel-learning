<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

//use the controller
use App\Http\Controllers\{
    UserController,
    ArticleController,
    LoginController,
    LogoutController,
    RegisterController,
    ForgotController,
    ResetController,
    CommentController,
    CategoryController
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

/**
 * homepage route
 */
Route::get('/', [ArticleController::class, 'index']);

/*
|--------------------------------------------------------------------------
| ch 23
|--------------------------------------------------------------------------
*/

/**
 *  
 */
Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');

/*
|--------------------------------------------------------------------------
| ch 22
|--------------------------------------------------------------------------
*/

/**
 *  
 */
Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');

/*
|--------------------------------------------------------------------------
| ch 20
|--------------------------------------------------------------------------
*/

/**
 *  
 */
Route::get('user/password', [UserController::class, 'password'])->name('user.password');

/**
 *  
 */
Route::post('password', [UserController::class, 'updatePassword'])->name('update.password');

/**
 *  
 */
Route::post('user/store', [UserController::class, 'store'])->name('post.user');

/**
 *  
 */
Route::get('user/edit', [UserController::class, 'edit'])->name('user.edit');

/*
|--------------------------------------------------------------------------
| ch 16
|--------------------------------------------------------------------------
*/

/**
 *  
 */
Route::post('comment/{article}', [CommentController::class, 'store'])->name('post.comment');

/*
|--------------------------------------------------------------------------
| ch 11
|--------------------------------------------------------------------------
*/

/**
 * update pwd 
 */
Route::post('reset', [ResetController::class, 'reset'])->name('post.reset');

/**
 * reset pwd index 
 */
Route::get('reset/{token}', [ResetController::class, 'index'])->name('reset');

/**
 * forgot pwd control 
 */
Route::post('forgot', [ForgotController::class, 'store'])->name('post.forgot');

/**
 * forgot pwd index 
 */
Route::get('forgot', [ForgotController::class, 'index'])->name('forgot');

/**
 * logout route 
 */
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');

/**
 * login control
 */
Route::post('login', [LoginController::class, 'login'])->name('post.login');

/**
 * loging index
 */
Route::get('login', [LoginController::class, 'index'])->name('login');

/**
 * route to control register form
 */
Route::post('register', [RegisterController::class, 'register'])->name('post.register');

/**
 * route to get register controller
 */
Route::get('register', [RegisterController::class, 'index'])->name('register');

Route::get('profile/{user}', [UserController::class, 'profile'])->name('user.profile');

Route::resource('articles', ArticleController::class)->except('index');

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

// //passer les params URL ?? la view
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


// //passer les query string ?? la view 
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
