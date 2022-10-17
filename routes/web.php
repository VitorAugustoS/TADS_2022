<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/alunos', function () {
    return view('alunos.index');
});

Route::get('/professores', function () {
    return view('professores.index');
});

Route::get('/atividades', function () {
    return view('atividades.index');
});

Route::get('/turmas', function () {
    return view('turmas.index');
});