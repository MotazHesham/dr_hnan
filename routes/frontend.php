<?php

use Illuminate\Support\Facades\Route; 

Route::group(['as' => 'frontend.', 'namespace' => 'Frontend'], function () {

    Route::get('/', 'HomeController@index')->name('home'); 

    // quotations
    Route::post('quotations', 'HomeController@quotations')->name('quotations'); 

    // joinings
    Route::post('joining', 'HomeController@joining')->name('joining'); 
    Route::post('joinings/media', 'HomeController@storeMedia')->name('joinings.storeMedia');
    Route::post('joinings/ckmedia', 'HomeController@storeCKEditorImages')->name('joinings.storeCKEditorImages');

    // contact_us
    Route::post('contact_us', 'HomeController@contact_us')->name('contact_us'); 
}); 
