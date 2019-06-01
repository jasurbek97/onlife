<?php



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





Route::namespace('Back')->middleware('auth','admin')->prefix('dashboard')->group(function () {
    Route::get('/', 'Controller@index')->name('dashboard');


    Route::namespace('Order')->prefix('/order')->group(function () {
        Route::get('/', 'Controller@index')->name('order');
        Route::get('/create/{id}', 'Controller@create')->name('order.create');
        Route::get('/show/{order}', 'Controller@show')->name('order.show');
        Route::put('/update', 'Controller@update')->name('order.update');
        Route::get('/edit/{id}', 'Controller@edit')->name('order.edit');
        Route::get('/delete/{id}', 'Controller@destroy')->name('order.delete');

    });

    Route::namespace('Post')->prefix('/post')->group(function () {
        Route::get('/', 'Controller@index')->name('post');
        Route::get('/create', 'Controller@create')->name('post.create');
        Route::post('/store', 'Controller@store')->name('post.store');
        Route::put('/update/{post}', 'Controller@update')->name('post.update');
        Route::get('/edit/{post}', 'Controller@edit')->name('post.edit');
        Route::get('/delete/{post}', 'Controller@destroy')->name('post.delete');

    });


    Route::namespace('Photo')->prefix('/photo')->group(function () {
        Route::get('/', 'Controller@index')->name('photo');
        Route::post('/store', 'Controller@store')->name('photo.store');
        Route::put('/update/{photo}', 'Controller@update')->name('photo.update');
        Route::get('/edit/{photo}', 'Controller@edit')->name('photo.edit');
        Route::get('/delete/{photo}', 'Controller@destroy')->name('photo.delete');

    });

    Route::namespace('Slider')->prefix('/slider')->group(function () {
        Route::get('/', 'Controller@index')->name('slider');
        Route::post('/store', 'Controller@store')->name('slider.store');
        Route::get('/update/{slider}', 'Controller@update')->name('slider.update');
        Route::get('/edit/{slider}', 'Controller@edit')->name('slider.edit');
        Route::get('/delete/{slider}', 'Controller@destroy')->name('slider.delete');

    });

});







Route::namespace('Front')->prefix('/')->group(function () {
    Route::get('/', 'Controller@index')->name('index');

    Route::namespace('Order')->prefix('/order')->group(function () {
        Route::post('/store', 'Controller@store')->name('order.store');
    });
});



