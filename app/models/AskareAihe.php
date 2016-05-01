<?php

class AskareAihe extends BaseModel {
    
    public $id, $askare_id, $aihe_id, $aihe_nimi;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    public function createConnections($askare_id, $aiheet){
    foreach ($aiheet as $aihe){
        $askareaihe =new AskareAihe(array(
            "aihe_id" =>$aihe,
            "askare_id" =>$askare_id
            
        ));
        
        $askareaihe->save();
    }
    
}public function findAiheet($id){
        $query = DB::connection()->prepare('SELECT nimi,aihe_id, askare_id FROM AskareAihe, Aihe WHERE askare_id =:id and aihe_id= Aihe.id');
       
        
        $query->execute(array('id'=>  $id));
        
        $rows = $query->fetchAll();
        $askareaihe =array();
        
        
        foreach ($rows as $row){
            $askareaihe[] = new AskareAihe(array(
                'aihe_id'=>$row['aihe_id'],
                'askare_id'=>$row['askare_id'],
                'aihe_nimi'=>$row['nimi']
           )); 
        }
        
        return $askareaihe;
        
    }public function save(){
      $query = DB::connection()->prepare('INSERT INTO AskareAihe (askare_id, aihe_id) VALUES (:askare_id, :aihe_id )RETURNING id ' );
        $query->execute(array('askare_id'=>  $this->askare_id,'aihe_id'=>  $this->aihe_id)); 
        $this->id= $query->fetch();
        
        
    }
    
}
