<?php

use App\Http\Controllers\Api\MembersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::Resource('members', MembersController::class);


require __DIR__.'/auth.php';
