<?php

class User extends BaseModel {
    
    public $kayttajatunnus, $salasana;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    public static function authenticate($kayttajatunnus, $salasana) {
        
        $query = DB::connection()->prepare('select * from Kayttaja where kayttajatunnus = :kayttajatunnus and salasana = :salasana limit 1');
        $query->execute(array('kayttajatunnus'=>$kayttajatunnus,'salasana'=>$salasana));
        
        $row = $query->fetch();
        
        if($row) {
            return new User(array('kayttajatunnus'=>$row['kayttajatunnus'],'salasana'=>$row['salasana']));
        } else {
            return null;
        }
    }
    
     public static function find($kayttajatunnus) {
        $query = DB::connection()->prepare('select * from Kayttaja where kayttajatunnus = :kayttajatunnus limit 1');
        $query->execute(array('kayttajatunnus'=>$kayttajatunnus));
        $row = $query->fetch();
        return new User(array('kayttajatunnus'=>$row['kayttajatunnus'],'salasana'=>$row['salasana']));
    }
}

