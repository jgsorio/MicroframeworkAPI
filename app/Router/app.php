<?php

global $app;

use App\Controllers\User\ListUserController;

$app->get('/users', ListUserController::class);