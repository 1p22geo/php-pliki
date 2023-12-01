<?php

class Transaction{
  public $price;
  public $product;
  public $date;
  public $id;
  public function __construct($price, $product, $date, $new_id=null){
    $this->product = $product;
    $this->price = floatval($price);
    $this->date = DateTime::createFromFormat("Y-m-d", $date);
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
        $date = $this->date->format("Y-m-d");
        $price = strval($this->price);
        return "$this->id:$this->product:$price:$date";
    }
  public function save(){
        $f = fopen($_SERVER["DOCUMENT_ROOT"]."/sprzedaz/data/data.txt", "a");
        fwrite($f, $this->get_line()."\n");
        fclose($f);
    }
}

?>