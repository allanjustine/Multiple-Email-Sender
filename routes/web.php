<?php

use App\Http\Controllers\EmailToSendController;
use App\Http\Controllers\SendEmailController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landing-page');

Route::view('/send-email', 'send-email')->name('send-email');
Route::post('send-email', [SendEmailController::class, 'store'])->name('send-email.store');

Route::resource('emails', EmailToSendController::class);
Route::get('emails/{email}/delete', [EmailToSendController::class, 'delete'])->name('emails.delete');
