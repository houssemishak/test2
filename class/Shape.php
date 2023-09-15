<?php

interface Shape{
    public function calcArea();
}

class Circle implements Shape{
    private $radius;

    public function __construct($radius){
        $this->radius = $radius;
    }

    public function calcArea(){
        return $this->radius * $this->radius * pi();
    }


}

class Rectangle implements Shape{
    private $widht;
    private $height;

    public function __construct($widht,$height){
        $this->widht = $widht;
        $this->height = $height;


    }

    public function calcArea(){
        return $this->widht * $this->height;
    }
}
?>