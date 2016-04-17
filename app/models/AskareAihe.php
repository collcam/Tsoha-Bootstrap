<?php

class AskareAihe extends BaseModel {
    
    public $askare_id, $aihe_id;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
}
