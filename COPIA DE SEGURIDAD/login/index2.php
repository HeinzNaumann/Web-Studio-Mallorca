<?php


class coche{

    public $marca;
    public $color;
    public $metros_recorridos=0;
    public $motor = false;
    
    function nuevo_coche($brand, $model){

        $this->marca = $brand;
        $this->modelo = $model;

        echo "El modelo de este coche se llama ".$this->marca." y el modelo es un: ".$this->modelo."</br>";
    }

    function arrancar_motor(){
            if($this->motor == true){
                $this->motor = false;
                echo " El motor esta arrancado <br>";
            }else{
                echo " El motor ya esta arrancado <br>";
            }
    }

    function apagar_motor(){
        if($this->motor == false){
            $this->motor = true;
            echo "El motor esta apagado <br>";
        }else{
            echo "El motor ya esta apagado <br>";
        }
    }

    function acelerar($metros){


        $this->metros_recorridos = $this->metros_recorridos + $metros;

        echo "El ".$this->marca." a recorrido ".$metros." y en total lleva ".$this->metros_recorridos." en total"."<br>";

    }

    function para_motor(){

    }

}


$coche = new coche;

$coche2 = new coche;


echo $coche2->nuevo_coche("Ferrari", "Testarrosa");

echo $coche->nuevo_coche("Ford", "Focus");


echo $coche2->acelerar(300);
echo $coche2->acelerar(900);


echo $coche->acelerar(20);

echo $coche->acelerar(29);

echo $coche->arrancar_motor();

echo $coche->apagar_motor();

echo $coche->arrancar_motor();

echo $coche->apagar_motor();



echo $coche->arrancar_motor();

var_dump($coche);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <form action="">
        <label>Nombre</label></br>
        <input type="text"></br>
        <label>Apellido</label></br>
        <input type="text">
    </form>




</body>
</html>