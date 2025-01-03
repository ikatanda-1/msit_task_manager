<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Tasks::index');
$routes->get('/landing','Tasks::index');
$routes->get('/documentation','Tasks::documentation');

$routes->get('registration_success','Tasks::registration_success');
$routes->get('log_in_first','Tasks::log_in_first');

$routes->get('/users/new', 'Tasks::new_user');
$routes->post('/users/new', 'Tasks::new_user');


$route['auth/register'] = 'auth/register';
$routes->get('auth/register','Auth::register');
$routes->post('auth/register','Auth::register');

//$routes->get('login','Tasks::login');




$routes->get('auth/login','Auth::login');
$routes->post('auth/login','Auth::login');


$routes->get('logout','Auth::logout');
//This creates URLs like /admin/dashboard and /admin/users.






#$routes->get('/client/search', 'Client::search');




$routes->post('/client/save', 'Client::saveClient');

//$routes->get('/company/(:num)', 'CompanyController::profile/$1');



$routes->get('404','Tasks::four_o_four');

$routes->group('admin', function($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('users', 'Admin::users');
});
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('about','Tasks::about_project');
    $routes->get('calendar', 'CalendarController::index');
    $routes->get('calendar/events', 'CalendarController::fetchEvents');
    $routes->post('calendar/add', 'CalendarController::addEvent');
    $routes->get('contact','Tasks::contact');
    //clientController
    $routes->get('new_client','Client::newClient');
    $routes->get('clients','Client::index');
    $routes->get('client','Client::index');
    $routes->get('client/search', 'Client::search');

    //companyController
   // $routes->get('company/(:num)', 'CompanyController::index/$1');

    $routes->get('company/(:num)', 'CompanyController::getCoDetails/$1');
    $routes->get('company/searchClients', 'CompanyController::searchClients');



    $routes->get('profile/(:num)', 'ProfileController::index/$1');



    //searchController
    $routes->get('search', 'SearchController::index');
    $routes->get('search/autocomplete', 'SearchController::autocomplete');

    //queue controller
    $routes->get('events/new','QueueController::add_new');
    $routes->get('events','QueueController::index');

    //tasksController
    $routes->get('dash','Tasks::dash');
    $routes->get('time','Tasks::time');

    //ticketsController
    $routes->post('/tickets/store_note', 'TicketsController::store_note');
    $routes->post('/tickets/store_time', 'TicketsController::store_time');
    $routes->post('tickets/update_status/(:num)', 'TicketsController::updateTicketStatus/$1');
    $routes->get('tickets/update_ticket_status/(:num)', 'TicketsController::updateStatusForm/$1');
    $routes->get('tickets/create','TicketsController::create_ticket');

    $routes->get('tickets/tickets', 'TicketsController::index');
    $routes->get('/tickets/(:num)', 'TicketsController::view/$1');
  
    $routes->post('/tickets/store', 'TicketsController::store');
    $routes->get('/tickets/add_note/(:num)', 'TicketsController::add_note/$1');
    $routes->get('/tickets/add_time/(:num)', 'TicketsController::add_time/$1');
    $routes->get('tickets/ticket_form', 'TicketsController::showForm');
    


  
   
    $routes->get('tickets/client/(:num)', 'TicketsController::client/$1');
    $routes->get('tickets/types/(:num)','TicketsController::viewByType/$1');

    //ticketsNoteController

    //timeController
    $routes->get('time/sheet/(:num)','TimeController::index/$1');
    
    //userController
    $routes->get('users', 'UserController::index');
    $routes->get('users/(:num)', 'UserController::show/$1');
    $routes->get('users/searchUser', 'UserController::searchUser');
    
});