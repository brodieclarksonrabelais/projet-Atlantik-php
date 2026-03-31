<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Visiteur
$routes->get('/', 'Home::index');
$routes->get('accueil', 'Visiteur::accueil');
$routes->get('liaisonparsecteur', 'Visiteur::liaisonParSecteur');
$routes->match(['get','post'], 'creeruncompte', 'Visiteur::ajouterClient');
$routes->match(['get', 'post'],'seconnecter', 'Visiteur::seConnecter');

//Client

