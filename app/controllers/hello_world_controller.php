<?php
require 'app/models/Askare.php';
  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	 echo 'Tämä on etusivu!';
    }

   
  public static function sandbox(){
   
   $askare = Askare::find(1);
    $askareet = Askare::all();
    
    // Kint-luokan dump-metodi tulostaa muuttujan arvon
    Kint::dump($askareet);
    Kint::dump($askare);
  }
}
    
  
