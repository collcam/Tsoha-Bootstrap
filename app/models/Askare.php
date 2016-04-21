<?php

class Askare extends BaseModel {

    public $id, $nimi, $laatimisaika, $tarkeysluokka, $lisatiedot;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_nimi','validate_tarkeysluokka');
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT* FROM Askare');
        $query->execute();
        $rows = $query->fetchAll();
        $askareet = array();

        foreach ($rows as $row) {
            $askareet[] = new Askare(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'laatimisaika' => $row['laatimisaika'],
                'tarkeysluokka' => $row['tarkeysluokka'],
                'lisatiedot' => $row['lisatiedot']
            ));
        }
        return $askareet;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Askare WHERE id= :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $askare = new Askare(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'laatimisaika' => $row['laatimisaika'],
                'tarkeysluokka' => $row['tarkeysluokka'],
                //askareaihe puuttuu
                'lisatiedot' => $row['lisatiedot']
            ));

            return $askare;
        }
        return null;
    }

    public function findAiheetAskareelle($id) {
        $query = DB::connection()->prepare('SELECT * FROM AskareAihe WHERE aihe_id= :id');
        $query->execute(array('id' => $id));
        $rows = $query->fetch();

        if ($rows) {
            $askareaihe = new AiheAskare(array(
                'id' => $rows['id'],
                'aihe_id' => $rows['id'],
                'askare_id' => $row['askare_id']
            ));
        }
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Askare (nimi, lisatiedot, tarkeysluokka, laatimisaika ) VALUES (:nimi, :lisatiedot, :tarkeysluokka, NOW()) RETURNING id');
        $query->execute(array('nimi' => $this->nimi, 'lisatiedot' => $this->lisatiedot, 'tarkeysluokka' => $this->tarkeysluokka));
        $row = $query->fetch();
        //    Kint::trace();
        // Kint::dump($row);
        $this->id = $row['id'];
        
    }public function destroy($id){
         $query = DB::connection()->prepare('DELETE FROM Askare WHERE id= :id');
        $query->execute(array('id'=>$id));
        
    }
    public function update($id){
        $query = DB::connection()->prepare('UPDATE Askare set nimi =:nimi, tarkeysluokka =:tarkeysluokka, lisatiedot =:lisatiedot WHERE id= :id');
        $query->execute(array('nimi'=>  $this->nimi, 'tarkeysluokka'=> $this->tarkeysluokka,'lisatiedot'=> $this->lisatiedot, 'id'=> $id));
        $row =$query->fetch();
        Kint::trace();
        Kint::dump($row);
    }

    public function validate_nimi() {
        $errors = array();
        if ($this->nimi == '' || $this->nimi == null) {
            $errors[] = 'Et voi jättää askareen nimeä tyhjäksi';
        }
        return $errors;
    }

    public function validate_tarkeysluokka() {
        $errors = array();
        if($this->tarkeysluokka!=null){
            $tarkeysInt=(integer) $this->tarkeysluokka;
            
        if((!is_int($tarkeysInt)) || ($tarkeysInt < 1) ||($tarkeysInt > 5)){
           $errors[] = 'tärkeysluokan arvo on oltava numero 1 ja 5 väliltä';
        }
        }
        return $errors;
    }

}
