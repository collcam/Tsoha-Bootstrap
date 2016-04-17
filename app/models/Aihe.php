<?php

class Aihe extends BaseModel {
 public $nimi, $id;

 public function __construct($attributes) {
     parent::__construct($attributes);
}public function all(){
    $query = DB::connection()->prepare('SELECT* FROM Aihe');
        $query->execute();
        $rows = $query->fetchAll();
        $aiheet =array();
        
        foreach ($rows as $row){
            $aiheet[] =new Aihe(array(
                'nimi'=>$row['nimi'],
                'id'=>$row['id']
            ));
        }
        return $aiheet;
        
}

 }