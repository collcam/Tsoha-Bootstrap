<?php

class AskareAihe extends BaseModel {
    
    public $id, $askare_id, $aihe_id;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    public function createConnections($askare_id, $aiheet){
    foreach ($aiheet as $aihe){
        $askareaihe =new AskareAihe(array(
            "aihe_id" =>$aihe['id'],
            "askare_id" =>$askare_id
            
        ));
        $askareaihe->save();
    }
    
}public function findAiheet($attributes){
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
        
    }public function save(){
      $query = DB::connection()->prepare('INSERT INTO AskareAihe (askare_id, aihe_id) VALUES (:askare_id, :aihe_id )RETURNING id ' );
        $query->execute(array('askare_id'=>  $this->askare_id,'aihe_id'=>  $this->aihe_id)); 
        $this->id= $query->fetch();
    }
    
}
