<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Visiteur
$routes->get('/', 'Home::index');
$routes->get('accueil', 'Visiteur::accueil');
$routes->get('liaisonparsecteur', 'Visiteur::liaisonParSecteur');
$routes->get('tarifsparliaison/(:alphanum)', 'Visiteur::tarifsParLiaison/$1');
$routes->get('tarifsparliaison', 'Visiteur::tarifsParLiaison');
$routes->match(['get','post'], 'creeruncompte', 'Visiteur::ajouterClient');
$routes->match(['get', 'post'],'seconnecter', 'Visiteur::seConnecter');
$routes->match(['get', 'post'],'sedeconnecter', 'Visiteur::seDeconnecter');

//Client
$routes->match(['get','post'], 'modifieruncompte', 'Client::modifierClient');
$routes->get('reservationspourunclient/(:alphanum)', 'Client::reservationsPourUnClient/$1');
$routes->get('reservationspourunclient', 'Client::reservationsPourUnClient');