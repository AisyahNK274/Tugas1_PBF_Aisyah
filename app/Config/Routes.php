<?php

use App\Controllers\Pages;
use App\Controllers\News;
use CodeIgniter\Router\RouteCollection;

$routes->get('news', [News::class, 'index']);           // Add this line
$routes->get('news/(:segment)', [News::class, 'show']); // Add this line

$routes->get('/', 'Home::index');
$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::Class, 'view']);