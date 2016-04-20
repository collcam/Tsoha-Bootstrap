<?php

class AskareAihe extends BaseModel {
    
    public $askare_id, $aihe_id;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    public function findAiheet($attributes){
        $query = DB::connection()->prepare('SELECT* FROM Aihe,Askare WHERE aihe.id in askare.askareaihe ');
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
