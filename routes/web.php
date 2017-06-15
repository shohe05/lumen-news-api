<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
use App\Article;

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/news-list', function(Article $articleModel) {
    return response()->json($articleModel->paginate(15));
});
