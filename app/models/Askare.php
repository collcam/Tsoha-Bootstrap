<?php

class Askare extends BaseModel {

    public $id, $nimi, $laatimisaika, $tarkeysluokka, $lisatiedot, $kayttaja_id;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_nimi','validate_tarkeysluokka');
    }

    public static function all($options) {
        $query_string = 'SELECT * FROM Askare WHERE kayttaja_id = :kayttaja_id ';
        $options = array('kayttaja_id' => $options['kayttaja_id']);
         
        if(isset($options['search'])){
           die("tullaan tänne"); 
            $query_string .= 'AND nimi LIKE :like';
            $options['like'] = '%' . $options['search'] . '%';
            
        }
        $query =DB::connection()->prepare($query_string);
        $query->execute($options);
        //die("päästiin");
        $rows = $query->fetchAll();
        $askareet = array();

        foreach ($rows as $row) {
            $askareet[] = new Askare($row);
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
        $query = DB::connection()->prepare('INSERT INTO Askare (kayttaja_id, nimi, lisatiedot, tarkeysluokka, laatimisaika ) VALUES (:kayttaja_id, :nimi, :lisatiedot, :tarkeysluokka, NOW()) RETURNING id');
        $query->execute(array('kayttaja_id' => $this-> kayttaja_id, 'nimi' => $this->nimi, 'lisatiedot' => $this->lisatiedot, 'tarkeysluokka' => $this->tarkeysluokka));
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
