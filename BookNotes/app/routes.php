<?php

$router->get('', 'IndexController@index');

$router->get('signup', 'SignupController@index');
$router->post('signup', 'SignupController@create');

$router->get('login', 'LoginController@index');
$router->post('login', 'LoginController@login');
$router->post('logout', 'LoginController@logout');

$router->get('library', 'LibraryController@listAll');

$router->get('create_notes', 'LibraryController@createNotes');
$router->post('create_notes', 'LibraryController@create');

$router->get('user_notes', 'LibraryController@userNotes');

$router->get('note', 'LibraryController@read');

