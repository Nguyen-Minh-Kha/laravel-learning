<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

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

Route::get('test', function (){
    return view('test.index');
});

Route::get('profile/{firstname}/{lastname}', function($firstname = null, $lastname = null){
    
    //return view('profile.index')-> with('firstname', $firstname)-> with ('lastname', $lastname);

    //return view('profile.index')->with(compact('firstname', 'lastname'));

    //return view('profile.index')->withFirstname($firstname)->withLastname($lastname);

    $data = [
        'title' => 'my title',
        'description' => 'my description',
        'firstname' => $firstname,
        'lastname' => $lastname,
    ];

    return view('profile.index',$data);
});

Route::get("test/{user}", function ($user) {
    echo 'hello ' . $user;
});

// Route::get('profile/{name?}', function ($name = null) {
//     if ($name) {
//         echo 'hello ' . $name;
//     } else {
//         echo 'hello stranger';
//     }
// });

Route::get('articles', function () {
    $articles = ['B', 'A', 'C'];

    $sort = request()->query('sort', 'desc');

    $count = request()->query('count', 5);

    dump($count);

    switch ($sort) {
        case 'desc':
            rsort($articles);
            break;

        case 'asc':
            sort($articles);
            break;

        default:
            # code...
            break;
    }

    foreach ($articles as $article) {
        echo '<p>' . $article . '</p>';
    }
});
