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
  });
   $routes->get('/esittelysivu', function() {
      MuistilistaController::Askare_esittelysivu();
  });
  
