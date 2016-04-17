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

    public static function store() {
        $params = $_POST;
        $askare = new Askare(array(
            'nimi' => $params['nimi'],
            'lisatiedot' => $params['lisatiedot'],
            'tarkeysluokka' => $params['tarkeysluokka'],
        ));
       // Kint::dump($params);

        $errors= $askare->errors();
        if(count($errors) ==0){
         $askare->save();
             Redirect::to('/askare/' . $askare->id, array('message' => 'Askareesi on lisätty Muistilistaan! :D'));
    
        }  else {
            View::make('askare/new.html', array('errors' =>$errors, 'askare' =>$askare));
            
        }
        
        
        
        
    }

    public static function create() {
        $aiheet =  Aihe::all();
        View::make('askare/new.html', array('aiheet'=>$aiheet));
        
    }

    public static function edit($id) {
        $askare = Askare::find($id);
        View::make('askare/muokkaa.html', array('attributes' => $askare));
    }

    public static function update($id) {
        $params = $_POST;

        $attributes = array(
            'id' => $id,
            'nimi' => $params['nimi'],
            'tarkeysluokka' => $params['tarkeysluokka'],
            //puuttuu askare aihe
            'lisatiedot' => $params['lisatiedot']
        );
        
        $askare = new Askare($attributes);
        $errors = $askare->errors();

        if (count($errors) > 0) {
            View::make('askare/muokkaa.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $askare->update();

            Redirect::to('/askare/' . $askare->id, array('message' => 'Askare on nyt muokattu :D'));
        }
    }

    public static function destroy($id) {
        $askare = new Askare(array('id' => $id));
        $askare->destroy($id);

        Redirect::to('/askare', array('message' => 'Askare on poistettu'));
    }

}
