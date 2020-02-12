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

Route::prefix('admin')->group(function(){
    Auth::routes();

    Route::group([
        'namespace' => 'Admin\\',
        'as' => 'admin.',
//         'middleware' => ['auth','can:admin'],
    ], function(){
        Route::get('users/excluir/{id}', ['as' => 'user.excluir', 'uses' => 'UsersController@destroy']);

        Route::group(['prefix' => 'users', 'as' => 'users.'], function(){
            Route::name('show_details')->get('show_details', 'UsersController@showDetails');

            Route::group(['prefix' => '/{user}/profile'], function (){
               Route::name('profile.edit')->get('', 'UserProfileController@edit');
               Route::name('profile.update')->put('', 'UserProfileController@update');
            });

        });
        Route::resource('users', 'UsersController');
    });

    Route::group([
        'namespace' => 'Admin\\',
        'as' => 'admin.',
    ], function(){
        //DISCIPLINA
        Route::get('subject/index', ['as' => 'disciplina.index', 'uses' => 'SubjectController@index']);
        Route::get('subject/create', ['as' => 'disciplina.create', 'uses' => 'SubjectController@create']);
        Route::post('subject/salvar', ['as' => 'disciplina.salvar', 'uses' => 'SubjectController@salvar']);
        Route::get('subject/edit/{id}', ['as' => 'disciplina.editar', 'uses' => 'SubjectController@editar']);
        Route::post('subject/atualizar/{id}', ['as' => 'disciplina.atualizar', 'uses' => 'SubjectController@atualizar']);
        Route::get('subject/ver/{id}', ['as' => 'disciplina.ver', 'uses' => 'SubjectController@verDisciplina']);
        Route::get('subject/excluir/{id}', ['as' => 'disciplina.excluir', 'uses' => 'SubjectController@excluir']);

        //TURMA
        Route::get('turma/index', ['as' => 'turma.index', 'uses' => 'ClassInformationController@index']);
        Route::get('turma/create', ['as' => 'turma.create', 'uses' => 'ClassInformationController@create']);
        Route::post('turma/salvar', ['as' => 'turma.salvar', 'uses' => 'ClassInformationController@salvar']);
        Route::get('turma/edit/{id}', ['as' => 'turma.editar', 'uses' => 'ClassInformationController@editar']);
        Route::post('turma/atualizar/{id}', ['as' => 'turma.atualizar', 'uses' => 'ClassInformationController@atualizar']);
        Route::get('turma/ver/{id}', ['as' => 'turma.ver', 'uses' => 'ClassInformationController@verTurma']);
        Route::get('turma/excluir/{id}', ['as' => 'turma.excluir', 'uses' => 'ClassInformationController@excluir']);
    });

    //ADMINISTRACAO DE ESTUDANTES
    Route::group([
        'namespace' => 'Admin\\',
        'as' => 'class_information.'
    ], function(){
        Route::get('student/index', ['as' => 'student.index', 'uses' => 'ClassStudentsController@index']);
        Route::get('student/criar', ['as' => 'student.criar', 'uses' => 'ClassStudentsController@criar']);
        Route::get('student/excluir/{id}', ['as' => 'student.excluir', 'uses' => 'ClassStudentsController@excluir']);
    });

});

Route::get('/home', 'HomeController@index')->name('home');


