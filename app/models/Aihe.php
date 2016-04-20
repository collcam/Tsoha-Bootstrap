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
        
}public static function findAiheetAskareelle($askare_id){
    
        $query = DB::connection()->prepare('SELECT * FROM Aihe');
        $query->execute();
        $rows = $query->fetchAll();
        $askareaihe =array();
        
        foreach ($rows as $row){
            $askareaihe[] =new Aihe(array(
                'nimi'=>$row['nimi'],
                'id'=>$row['id']
            ));
        }
        return $askareaihe;
        
    }

 }