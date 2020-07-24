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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

/** TEST */

$router->get('/toto', [
    'uses' => 'MainController@toto',
    'as' => 'toto'
]);

/** CATEGORIES */

// liste des catégories
$router->get('/categories', [
    'as' => 'categories-list',
    'uses' => 'CategoryController@list'
]);

// créer une catégorie
$router->post('/category', [
    'as' => 'categories-create',
    'uses' => 'CategoryController@create'
]);

// Affiche une catégorie
$router->get('/categories/{id}', [
    'as' => 'category',
    'uses' => 'CategoryController@category'
]);

// Mise à jours d'une catégorie
$router->put('/categories/{id}', [
    'as' => 'categories-update',
    'uses' => 'CategoryController@update'
]);

// supprimer une catégorie
$router->delete('/categories/{id}', [
    'as' => 'categories-delete',
    'uses' => 'CategoryController@delete'
]);

/** TASKS */

// Liste des tâches
$router->get('/tasks', [
    'as' => 'tasks-list',
    'uses' => 'TaskController@list'
]);

// créer une tâche
$router->post('/tasks', [
    'as' => 'tasks-create',
    'uses' => 'TaskController@create'
]);

// Affiche une tâche
$router->get('/tasks/{id}', [
    'as' => 'task',
    'uses' => 'TaskController@task'
]);

// Mise à jours une tâche
$router->put('/tasks/{id}', [
    'as' => 'tasks-update',
    'uses' => 'TaskController@update'
]);

// supprimer une tâche
$router->delete('/tasks/{id}', [
    'as' => 'tasks-delete',
    'uses' => 'TaskController@delete'
]);