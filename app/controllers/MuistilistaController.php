<?php

class MuistilistaController extends BaseController{
    public static function index(){
        $askareet =  Askare::all();
        
        View::make('askare/index.html', array('askareet' =>$askareet));
    }
    public static function etusivu(){
        View::make('etusivu.html');
    }public static function lisaaAskare(){
    View::make('luoAskare.html'); 
    
    }public static function EtsiAskare(){
    View::make('etsiAskare.html');
    }
    public static function Askare_muokkaussivu(){
        View::make('askare_muokkaussivu.html');
        
    }public static function Listaa_askareet(){
     View::make('listaa_askareet.html');
    }public static function Askare_esittelysivu(){
    View::make('askare_esittelysivu.html'); 
    
    }public static function kirjautuminen(){
    View::make('kirjautuminen.html'); 
    
    }
}