<?php

  $routes->get('/', function() {
      MuistilistaController::etusivu();
  });

  $routes->get('/kirjautuminen', function() {
      MuistilistaController::kirjautuminen();
  });
  $routes->get('/etsi', function() {
      MuistilistaController::EtsiAskare();
  });
  $routes->get('/listaa_askareet', function() {
      MuistilistaController::Listaa_askareet();
  });
  $routes->get('/lisaa_askare', function() {
      MuistilistaController::lisaaAskare();
  });
  $routes->get('/muokkaa', function() {
      MuistilistaController::Askare_muokkaussivu();
  });$routes->get('/askare', function() {
      AskareController::index();
  }); 
  
  $routes->post('/askare', function(){
      AskareController::store();  
  });
  
  
  $routes->get('/askare/new', function(){
      AskareController::create();  
  });
   $routes->get('/askare/:id', function($id) {
       AskareController::show($id);
  });
  $routes->get('/hiekkalaatikko', function() {
  HelloWorldController::sandbox();
  });
  $routes->get('/askare/:id/edit', function($id) {
      AskareController::edit($id);
  });
  $routes->post('/askare/:id/edit', function($id) {
      AskareController::update($id);
  });
  $routes->post('/askare/:id/destroy', function($id) {
      AskareController::destroy($id);
  });
   $routes->get('/login', function() {
      UserController::login();
  });
  $routes->post('/login', function() {
      
      UserController::handle_login();
  });
  $routes->post('/logout', function() {
      UserController::logout();
  });
  $routes->get('/aihe', function() {
      AiheController::index();
  });
  $routes->post('/aihe', function() {
      AiheController::store();
  });
  
  $routes->get('/aihe/new', function(){
      AiheController::create();
  });
   $routes->get('/aihe/:id', function($id) {
       AiheController::show($id);
  });
   $routes->get('/aihe/:id/edit', function($id) {
       AiheController::edit($id);
  });
  $routes->post('/aihe/:id/edit', function($id) {
      AiheController::update($id);
  });
  $routes->post('/aihe/:id/destroy', function($id) {
      AiheController::destroy($id);
  });
  
  
  
