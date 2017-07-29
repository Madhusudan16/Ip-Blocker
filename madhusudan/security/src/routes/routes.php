<?php

/* 
 * This file manage router for this package
 */
Route::get('admin/ipblocker', 
  'madhusudan\security\Controllers\IpblockerController@index');

Route::post('admin/ipblocker', 
  'madhusudan\security\Controllers\IpblockerController@save');
