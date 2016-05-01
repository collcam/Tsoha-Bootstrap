<?php

class User extends BaseModel {
    
    public $id, $kayttajatunnus, $salasana;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    public static function authenticate($kayttajatunnus, $salasana) {
        
        $query = DB::connection()->prepare('select * from Kayttaja where kayttajatunnus = :kayttajatunnus and salasana = :salasana limit 1');
        $query->execute(array('kayttajatunnus'=>$kayttajatunnus,'salasana'=>$salasana));
        
        $row = $query->fetch();
        
        if($row) {
            return new User(array('id'=>$row['id'], 'kayttajatunnus'=>$row['kayttajatunnus'],'salasana'=>$row['salasana']));
        } else {
            return null;
        }
    }
    
     public static function find($id) {
        $query = DB::connection()->prepare('select * from Kayttaja where id = :id limit 1');
        $query->execute(array('id'=>$id));
        $row = $query->fetch();
        return new User(array('id'=> $id, 'kayttajatunnus'=>$row['kayttajatunnus'],'salasana'=>$row['salasana']));
    } 
    
    public function save() {
        $query = DB::connection()->prepare('INSERT INTO User (kayttajatunnus, salasana) VALUES (:kayttajatunnus, :salasana) RETURNING id');
        $query->execute(array('kayttajatunnus' => $this-> kayttajatunnus,'salasana'=>  $this->salasana));
        $row = $query->fetch();
        //    Kint::trace();
        // Kint::dump($row);
        $this->id = $row['id'];
        
    }public function validate_kayttajatunnus() {
        $errors = array();
        if ($this->kayttajatunnus == '' || $this->kayttajatunnus == null) {
            $errors[] = 'Et voi jättää kayttajatunnusta tyhjäksi';
        }
        
        return $errors;
    }

   
}

