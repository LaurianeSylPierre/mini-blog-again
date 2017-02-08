<?php

require_once 'connexionDB.php';

class FORM{

    private $data;

    public function __construct($data = array()){
        $this->data = $data;
    }

//Fonction qui crée un input
    public function input($name){
        echo '<label>'.$name.'</label><input type="text" name="'.$name.'"><br/>';
    }

//Fonction qui crée un textarea
    public function textarea($name){
        echo '<label>'.$name.'</label><textarea name="'.$name.'" required></textarea><br/>';
    }

//Fonction qui crée un bouton submit
    public function submit(){
        echo '<button type="submit">Envoyer</button>';
    }
}
?>
