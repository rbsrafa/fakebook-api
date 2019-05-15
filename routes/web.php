<?php

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/pages/home', 'PagesController@home')->name('home');
Route::get('/pages/{id}/profile', 'PagesController@profile');
Route::get('/pages/friends', 'PagesController@friends');
Route::get('/pages/edit_user', 'PagesController@editUser');
Route::get('/pages/profile_image', 'PagesController@profileImage');
Route::get('/pages/cover_image', 'PagesController@coverImage');
Route::get('/pages/users', 'PagesController@users');
Route::post('/pages/search', 'PagesController@search');
Route::get('/pages/album', 'PagesController@album');
Route::get('/pages/friends_request', 'PagesController@friendsRequest');
Route::get('/pages/{id}/edit_post', 'PagesController@editPost');

Route::resource('/posts', 'PostsController');


Route::resource('/users', 'UsersController');


Route::resource('/likes', 'LikesController');
Route::post('/likes/choose', 'LikesController@likeUnlike');


Route::resource('/comments', 'CommentsController');
Route::post('/comments/choose', 'CommentsController@deleteOrStore');


Route::put('/images/{id}/updateProfileImage', 'ImagesController@updateProfileImage');
Route::put('/images/{id}/updateCoverImage', 'ImagesController@updateCoverImage');
Route::delete('/images{image}', 'ImagesController@destroy');

Route::resource('/friendss', 'FriendsController');
Route::post('/accept_decline', 'FriendsController@acceptDecline');


Route::resource('/friends', 'FriendRequestsController');
