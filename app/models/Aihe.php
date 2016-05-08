<?php

class Aihe extends BaseModel {
 public $nimi, $id;

 public function __construct($attributes) {
     parent::__construct($attributes);
     $this->validators = array('validate_nimi');
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
        
    }public function save(){
       
        $query= DB:: connection()->prepare('INSERT into Aihe (nimi) VALUES (:nimi) Returning id');
       
        $query->execute(array('nimi'=>  $this->nimi));
       
        $row =$query->fetch();
        $this->id=$row['id'];
        
    }   public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Aihe WHERE id = :id limit 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        if ($row) {
            return new Aihe(array('id' => $id, 'nimi' => $row['nimi']));
        } else {
            return null;
        }
    }
  public static function edit($id) {
        $query = DB::connection()->prepare('select * from Aihe where id = :id limit 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        if ($row) {
            $aihe = new Aihe(array(
                'id' => $row['id '],
                'nimi' => $row['nimi']              
                
            ));
            return $aihe;
        }
        return null;
    }public function update($id) {
        $query = DB::connection()->prepare('update Aihe set nimi = :nimi where id =:id');
        $query->execute(array('nimi' => $this->nimi, 'id' => $id));
        
    }
    public function destroy($id) {
        $query = DB::connection()->prepare('delete from Aihe where id =:id');
        $query->execute(array('id'=>$id));
    }
    public function validate_nimi() {
        $errors = array();
        if ($this->nimi == '' || $this->nimi == null) {
            $errors[] = 'Aiheen nimi ei saa olla tyhjä!';
        }
        return $errors;
    }public function errors(){
      $errors = array();
      if($this->nimi == '' ||$this->nimi == null ){
        $errors[]= 'Luokan nimi ei saa olla tyhjä!';
      }
      return $errors;
    }



 }