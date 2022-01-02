<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Panel Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'panel'], function () {

    //Dashboard
    Route::get('dashboard', ['as' => 'panel.dashboard', 'uses' => 'Panel\DashboardController@index']);

    //Subjects
    Route::get('subjects', ['as' => 'panel.pages.subject', 'uses' => 'Panel\SubjectController@index']);
    Route::get('subject/create', ['as' =>'pages.subject.create', 'uses' => 'Panel\SubjectController@create']);
    Route::put('subject/store', ['as' =>'pages.subject.store', 'uses' => 'Panel\SubjectController@store']);
    Route::get('subject/edit/{id}', ['as' =>'pages.subject.edit', 'uses' => 'Panel\SubjectController@edit']);
    Route::put('subject/update/{id}', ['as' =>'pages.subject.update', 'uses' => 'Panel\SubjectController@update']);
    Route::delete('subject/delete/{id}', ['as' =>'pages.subject.delete', 'uses' => 'Panel\SubjectController@destroy']);

    //Exams
    Route::get('exams', ['as' => 'panel.pages.exam', 'uses' => 'Panel\ExamController@index']);
    Route::get('exam/create', ['as' =>'pages.exam.create', 'uses' => 'Panel\ExamController@create']);
    Route::put('exam/store', ['as' =>'pages.exam.store', 'uses' => 'Panel\ExamController@store']);
    Route::get('exam/edit/{id}', ['as' =>'pages.exam.edit', 'uses' => 'Panel\ExamController@edit']);
    Route::put('exam/update/{id}', ['as' =>'pages.exam.update', 'uses' => 'Panel\ExamController@update']);
    Route::delete('exam/delete/{id}', ['as' =>'pages.exam.delete', 'uses' => 'Panel\ExamController@destroy']);

    //Test BookLets
    Route::get('test-booklet', ['as' => 'panel.pages.test-booklet', 'uses' => 'Panel\TestBookletController@index']);
    Route::get('test-booklet/create', ['as' =>'pages.test-booklet.create', 'uses' => 'Panel\TestBookletController@create']);
    Route::put('test-booklet/store', ['as' =>'pages.test-booklet.store', 'uses' => 'Panel\TestBookletController@store']);
    Route::get('test-booklet/edit/{id}', ['as' =>'pages.test-booklet.edit', 'uses' => 'Panel\TestBookletController@edit']);
    Route::put('test-booklet/update/{id}', ['as' =>'pages.test-booklet.update', 'uses' => 'Panel\TestBookletController@update']);

    //Exam BookLets
    Route::get('exam-booklet', ['as' => 'panel.pages.exam-booklet', 'uses' => 'Panel\ExamBookletController@index']);
    Route::get('exam-booklet/create', ['as' =>'pages.exam-booklet.create', 'uses' => 'Panel\ExamBookletController@create']);
    Route::put('exam-booklet/store', ['as' =>'pages.exam-booklet.store', 'uses' => 'Panel\ExamBookletController@store']);
    Route::get('exam-booklet/edit/{id}', ['as' =>'pages.exam-booklet.edit', 'uses' => 'Panel\ExamBookletController@edit']);
    Route::put('exam-booklet/update/{id}', ['as' =>'pages.exam-booklet.update', 'uses' => 'Panel\ExamBookletController@update']);

     //Questions
     Route::get('questions', ['as' => 'panel.pages.questions', 'uses' => 'Panel\QuestionController@index']);
     Route::get('questions/create', ['as' =>'pages.questions.create', 'uses' => 'Panel\QuestionController@create']);
     Route::put('questions/store', ['as' =>'pages.questions.store', 'uses' => 'Panel\QuestionController@store']);
     Route::get('questions/edit/{id}', ['as' =>'pages.questions.edit', 'uses' => 'Panel\QuestionController@edit']);
     Route::put('questions/update/{id}', ['as' =>'pages.questions.update', 'uses' => 'Panel\QuestionController@update']);


});
