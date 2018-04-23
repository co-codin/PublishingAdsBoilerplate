<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/user/area/{area}', 'User\AreaController@store')->name("user.area.store");


Route::group(['prefix' => '/{area}'], function() {

  /**
  * Category
  */
  Route::group(['prefix' => 'categories'], function() {
    Route::get('/', 'Category\CategoryController@index')->name('categories.index');

    Route::group(['prefix' => '/{category}'], function() {
      Route::get('/listings', 'Listing\ListingController@index')->name('listings.index');
    });
  });

  /**
  * Listing
  */

});
