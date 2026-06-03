<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InquiryFormController;

Route::post('/inquiry-form/store', [InquiryFormController::class, 'store']);

Route::get('/inquiry-form/list', [InquiryFormController::class, 'index']);