<?php

class AskareController extends BaseController {

    public static function index() {
       self::check_logged_in();
       $user_logged_in =  self::get_user_logged_in();
       $params= $_GET;
      // Kint::dump($_GET);
       $options = array('kayttaja_id' => $user_logged_in->id);
        
       if(isset($params['search'])){
         
           $options['search'] =$params['search'];
       }
       
       $askareet = Askare::all($options);
       $askareaiheet =array();
       
       foreach ($askareet as $askare){
         $askareaiheet[] = AskareAihe::findAiheet($askare->id);  
           
       }Kint::dump($askareaiheet);
      
  
       View::make('askare/index.html', array('askareet' => $askareet, 'askareaiheet'=>$askareaiheet));
    }

    public static function show($id) {
        self::check_logged_in();
        $askare = Askare::find($id);

        View::make('askare/esittelysivu.html', array('askare' => $askare));
    }

    public static function store() {
        self::check_logged_in();
        $params = $_POST;
         
     Kint::dump($params);
         //Kint::dump($$mitaTulee);
        
        $askare = new Askare(array(
            
            'nimi' => $params['nimi'],
            'lisatiedot' => $params['lisatiedot'],
            'tarkeysluokka' => $params['tarkeysluokka'],
            'kayttaja_id' =>  $_SESSION['user']
            
        ));
        
 
        $errors= $askare->errors();
       
    
        if(count($errors) ==0){
         $askare->save();
    
        $mitaTulee= $params['aiheet'];
       
         AskareAihe::createConnections($askare->id, $mitaTulee);
         
         Redirect::to('/askare/' . $askare->id, array('message' => 'Askareesi on lisätty Muistilistaan! :D'));
    
        }  else {
           View::make('askare/new.html', array('errors' =>$errors, 'askare' =>$askare));
            
        }
        
        
        
        
    }

    public static function create() {
        self::check_logged_in();
        $aiheet =  Aihe::all();
        View::make('askare/new.html', array('aiheet'=>$aiheet));
        
    }

    public static function edit($id) {
        self::check_logged_in();
        $askare = Askare::find($id);
        $aiheet=  Aihe::findAiheidenNimetAskareelle($id);
        
        View::make('askare/muokkaa.html', array('askare' => $askare,'aiheet' =>$aiheet));
        
    }

    public static function update($id) {
       
       self::check_logged_in();
        $params = $_POST;
        
        $attributes = array(
     
            'id' => $id,
            'nimi' => $params['nimi'],
            'tarkeysluokka' => $params['tarkeysluokka'],
            'lisatiedot' => $params['lisatiedot']
        );
       
         
      //  Kint::dump($params);
        $askare =new Askare($attributes);
        
        $errors = $askare->errors();

    if (count($errors) > 0) {
            View::make('askare/muokkaa.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $askare->update($id);

            Redirect::to('/askare/' . $askare->id, array('message' => 'Askare on nyt muokattu :D'));
        }
    }

    public static function destroy($id) {
        self::check_logged_in();
        $askare = new Askare(array('id' => $id));
        $askare->destroy($id);

        Redirect::to('/askare', array('message' => 'Askare on poistettu'));
    }

}
