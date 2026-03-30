<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Visiteur
$routes->get('/', 'Home::index');
$routes->get('accueil', 'Visiteur::accueil');
$routes->match(['get','post'], 'creeruncompte', 'Visiteur::ajouterClient');

//Client


//Administrateur
