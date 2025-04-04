<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;

Route::resource('projects', ProjectController::class);
Route::resource('skills', SkillController::class);
