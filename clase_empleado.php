<?php
class clase_empleado{ 
 
private $nameempl1 = ""; 
private $ageemple1 = 0; 
private $genero = ""; 
private $estado = ""; 
private $salario1 = ""; 

public function getNombre(){ 
    return $this->nameempl1; 
} 

public function setNombre($nameempl1){ 
    $this->nameempl1 =$nameempl1; 
} 

public function getEdad(){
    return $this -> ageemple1;
}

public function setEdad($ageemple1){ 
    $this->ageemple1 =$ageemple1; 
}

public function getGenero(){
    return $this -> genero;
}

public function setGenero($genero){ 
    $this->genero =$genero; 
}

public function getEstado(){
    return $this -> estado;
}

public function setEstado($estado){ 
    $this->estado =$estado; 
} 

public function getSueldo(){
    return $this -> salario1;
}

public function setSueldo($salario1){ 
    $this->salario1 =$salario1; 
} 

}






?>