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
        
}public static function findAiheidenNimetAskareelle($aihe_id){
    
        $query = DB::connection()->prepare('SELECT nimi FROM Aihe where id= :aihe_id');
        $query->execute(array('aihe_id'=>$aihe_id));
        $rows = $query->fetchAll();
        $aiheidenNimet =array();
        
        foreach ($rows as $row){
            $aiheidenNimet[] =new Aihe(array(
                'nimi'=>$row['nimi']
          
            ));
        }
        return $aiheidenNimet;
        
    }

 }