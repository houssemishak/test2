<?php

class Personne{
    public $name;
    public $adress;
    public $zipCode;
    public $phone;
    public $email;

public function getName(){
    return $this->name;
}

public function setName($name){
    $this->name = $name;
}
}



?>