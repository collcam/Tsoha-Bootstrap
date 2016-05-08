<?php

class AiheController extends BaseController {
    
    public static function index() {
 
        $aiheet = Aihe::all();
        View::make('aihe/index.html', array('aiheet'=>$aiheet));
    }
    
    public static function find($id) {
        $aihe = Aihe::find($id);
        View::make('luokka/show.html', array('aihe'=>$aihe));
    }
    
    public static function create() {
        View::make('aihe/new.html');
    }
    
    public static function store() {
        $params = $_POST;
        $aihe = new Aihe(array(
            'nimi' => $params['nimi']
            
        ));
        $errors = $aihe->errors();
        if (count($errors) == 0) {
            $aihe->save();
            Redirect::to('/aihe/' . $aihe->id, array('message' => 'Aihe lisätty!'));
        } else {
            View::make('aihe/new.html', array('errors' => $errors, 'aihe' => $aihe));
        }
    }
    
     public static function edit($id) {
        $aihe = Aihe::find($id);
        View::make('aihe/edit.html', array('aihe' => $aihe));
    }
    public static function update($id) {
        $params = $_POST;
        $aihe = new Aihe(array(
            'id'=>$id,
            'nimi' => $params['nimi']
           
        ));
        $errors = $aihe->errors();
        if (count($errors) == 0) {
            $aihe->update($id);

            Redirect::to('/aihe/' . $id .'/edit', array('message' => 'Aihetta muokattu!'));
        } else {
            View::make('aihe/edit.html', array('errors' => $errors, 'aihe' => $aihe));
        }
    }
    public static function destroy($id) {
        $aihe = new Aihe(array('id' => $id));
        $aihe->destroy($id);
        Redirect::to('/aihe', array('message' => 'Aihe poistettu'));
    } 
    public static function show($id) {
       
        $aihe = Aihe::find($id);

        View::make('aihe/show.html', array('aihe' => $aihe));
    }
}

