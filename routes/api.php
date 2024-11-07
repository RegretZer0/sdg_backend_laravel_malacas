<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\projectsController;
use App\Http\Controllers\tagsController;
use App\Http\Controllers\subjectController;
use App\Http\Controllers\environmentController;
use App\Http\Controllers\resourcesController;
use App\Http\Controllers\mechanismController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Project
Route::get('projects', [projectsController::class,'index'] );
Route::post('projects', [projectsController::class,'upload'] );
Route::put('projects/edit/{id}', [projectsController::class,'edit'] );
Route::delete('projects/delete/{id}', [projectsController::class,'delete'] );

// Tags
Route::get('tags', [tagsController::class,'index'] );
Route::post('tags', [tagsController::class,'upload'] );
Route::put('tags/edit/{tags_id}', [tagsController::class,'edit'] );
Route::delete('tags/delete/{tags_id}', [tagsController::class,'delete'] );

// Subject
Route::get('subject', [subjectController::class,'index'] );
Route::post('subject', [subjectController::class,'upload'] );
Route::put('subject/edit/{subject_id}', [subjectController::class,'edit'] );
Route::delete('subject/delete/{subject_id}', [subjectController::class,'delete'] );

// Environment
Route::get('environment', [environmentController::class,'index'] );
Route::post('environment', [environmentController::class,'upload'] );
Route::put('environment/edit/{environment_id}', [environmentController::class,'edit'] );
Route::delete('environment/delete/{environment_id}', [environmentController::class,'delete'] );

// Resources
Route::get('resources', [resourcesController::class,'index'] );
Route::post('resources', [resourcesController::class,'upload'] );
Route::put('resources/edit/{resources_id}', [resourcesController::class,'edit'] );
Route::delete('resources/delete/{resources_id}', [resourcesController::class,'delete'] );

//Mechanism
Route::get('mechanism', [mechanismController::class,'index'] );
Route::post('mechanism', [mechanismController::class,'upload'] );
Route::put('mechanism/edit/{mechanism_id}', [mechanismController::class,'edit'] );
Route::delete('mechanism/delete/{mechanism_id}', [mechanismController::class,'delete'] );