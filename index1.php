<?php
require_once "class/Person.php"; //importer la classe
require_once "class/Student.php";

// creation d'objets
$houssem = new Person("salma");

//echo $peter->name;

//$houssem->setName("Houssem");
echo $houssem->getName();


$shaheel = new Student("Je suis shaheel");
echo"<br>";
echo $shaheel->getName();
echo "<br>";
$shaheel->setStudentId(1);
echo $shaheel->getStudentId();

echo "<br>";
echo "<br>";


require_once "class/Shape.php";

$circle = new Circle(2);
echo "Radius: ". $circle->calcArea();

echo "<br>";

$rectangle = new Rectangle(10, 15);
echo "Rectangle ".$rectangle->calcArea();




?>



