<?php

class UserController extends BaseController{
  public static function login(){
      View::make('user/login.html');
  }
  public static function handle_login(){
    $params = $_POST;
    
    $user = User::authenticate($params['kayttajatunnus'], $params['salasana']);
    
    if(!$user){
      View::make('user/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'kayttajatunnus' => $params['kayttajatunnus']));
    }else{
      $_SESSION['user'] = $user->id;

      Redirect::to('/', array('message' => 'Tervetuloa takaisin!! :D'));
    }
  }public static function logout(){
    $_SESSION['user'] = null;
    Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
  }
   public static function storeUser() {
      
        $params = $_POST;
        
      
        $user = new User(array(
            
            'kayttajatunnus' => $params['kayttajatunnus'],
            'salasana' => $params['salasana']
           
        ));
        //Kint::dump($params);

        $errors= $user->errors();
        if(count($errors) ==0){
         $user->save();
       
            Redirect::to('/login' . $user->id, array('message' => 'Nyt voit kirjautua sisään! :D'));
    
        }  else {
           View::make('/sign_in', array('errors' =>$errors, 'user' =>$user));
            
        }

}}


