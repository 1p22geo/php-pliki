<?php

class Transaction{
  public $price;
  public $product;
  public $date;
  public $id;
  public function __construct($price, $product, $date, $new_id=null){
    $this->price = $price;
    $this->product = $product;
    $this->date = $date;
        if(!$new_id){

            $f = fopen($_SERVER["DOCUMENT_ROOT"]."/sprzedaz/model/id.counter", "r");
            $id = fgets($f);
            fclose($f);
            
            $id++;
            $this->id = $id;
            
            $f = fopen($_SERVER["DOCUMENT_ROOT"]."/sprzedaz/model/id.counter", "w");
            fputs($f, $id);
            fclose($f);
        }
        else{
            $this->id= $new_id;
        }


  }
  public function get_line(){
        return "$this->id:$this->product:$this->price:$this->date";
    }
  public function save(){
        $f = fopen($_SERVER["DOCUMENT_ROOT"]."/sprzedaz/data/data.txt", "a");
        fwrite($f, $this->get_line()."\n");
        fclose($f);
    }
}

?>
