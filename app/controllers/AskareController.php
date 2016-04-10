<?php

class AskareController extends BaseController {

    public static function index() {

        $askareet = Askare::all();

        View::make('askare/index.html', array('askareet' => $askareet));
    }

    public static function show($id) {

        $askare = Askare::find($id);

        View::make('askare/esittelysivu.html', array('askare' => $askare));
       
    }
     public static function store(){
     $params = $_POST;
    $askare = new Askare(array(
      'nimi' => $params['nimi'],
      'lisatiedot' => $params['lisatiedot'],
      'tarkeysluokka' => $params['tarkeysluokka'],
      
    ));
    // Kint::dump($params);

    $askare->save();

  Redirect::to('/askare/' . $askare->id, array('message' => 'Askareesi on lisätty Muistilistaan! :D'));
  }public static function create(){
      View::make('askare/new.html');
  }
}


