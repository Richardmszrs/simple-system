<?php

Route::group(['prefix' => 'invoice', 'middleware' => 'auth'], function() {
    Route::get('', 'InvoiceController@index')->name('invoice');

    Route::get('create', 'InvoiceController@create')->name('invoice.create');
    Route::post('store', 'InvoiceController@store')->name('invoice.store');

    Route::get('edit/{invoice}', 'InvoiceController@edit')->name('invoice.edit');
    Route::post('update/{invoice}', 'InvoiceController@update')->name('invoice.update');

    Route::get('destroy/{invoice}', 'InvoiceController@destroy')->name('invoice.destroy');

    Route::get('pdfview',array('as'=>'pdfview','uses'=>'InvoiceController@pdfview'));

});