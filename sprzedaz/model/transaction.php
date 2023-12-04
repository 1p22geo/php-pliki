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
        fwrite($f, $this->get_line().PHP_EOL);
        fclose($f);
  }
  public static function load(){
        $transactions = [];
        $f = fopen($_SERVER["DOCUMENT_ROOT"]."/sprzedaz/data/data.txt", "r");

        while(false !== ($line = fgets($f))){

            $l = explode(":", $line);
            $tr = new Transaction($l[2], $l[1], trim($l[3]), $l[0]);

            array_push($transactions, $tr);
        }

        fclose($f);
        return $transactions;
  }
  public static function get_by_id($id){
        $f = fopen($_SERVER["DOCUMENT_ROOT"]."/sprzedaz/data/data.txt", "r");

        while(false !== ($line = fgets($f))){

            $l = explode(":", $line);
            $tr = new Transaction($l[2], $l[1], trim($l[3]), $l[0]);

            if($tr->id==$id){
                fclose($f);
                return $tr;
            }
        }
        fclose($f);
        return null;
    }
  public static function del($id){
    $tr = Transaction::get_by_id($id);
    if(!$tr){
      return 1;
    }
    $line = $tr->get_line();
    $f = $_SERVER["DOCUMENT_ROOT"]."/sprzedaz/data/data.txt";
    $contents = file_get_contents($f);
    $contents = str_replace($line.PHP_EOL, '', $contents);
    file_put_contents($f, $contents);

  }
}

?>
