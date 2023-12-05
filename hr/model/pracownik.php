<?php

class Pracownik{
  public $imie;
  public $entry;
  public $birth;
  public $oddz;
  public $permissions;
  public $id;
  public function __construct($name, $entry, $birth, $permissions, $oddz, $new_id=null){
    $this->imie = $name;
    $this->oddz = $oddz;
    $this->entry = DateTime::createFromFormat("Y-m-d", $entry);
    $this->birth = DateTime::createFromFormat("Y-m-d", $birth);
    $this->permissions = $permissions;
        if(!$new_id){

            $f = fopen($_SERVER["DOCUMENT_ROOT"]."/hr/model/id.counter", "r");
            $id = fgets($f);
            fclose($f);
            
            $id++;
            $this->id = $id;
            
            $f = fopen($_SERVER["DOCUMENT_ROOT"]."/hr/model/id.counter", "w");
            fputs($f, $id);
            fclose($f);
        }
        else{
            $this->id= $new_id;
        }


  }
  public function get_line(){
        $entry = $this->entry->format("Y-m-d");
        $birth = $this->birth->format("Y-m-d");
        return "$this->id:$this->imie:$entry:$birth:$this->permissions:$this->oddz";
    }
  public function save(){
        $f = fopen($_SERVER["DOCUMENT_ROOT"]."/hr/data/data.txt", "a");
        fwrite($f, $this->get_line()."\n");
        fclose($f);
  }
  public static function load(){
        $pr = [];
        $f = fopen($_SERVER["DOCUMENT_ROOT"]."/hr/data/data.txt", "r");

        while(false !== ($line = fgets($f))){

            $l = explode(":", $line);
            $p = new Pracownik($l[1], $l[2], $l[3], $l[4], $l[5], $l[0]);

            array_push($pr, $p);
        }

        fclose($f);
        return $pr;
  }
  public static function get_by_id($id){
        $f = fopen($_SERVER["DOCUMENT_ROOT"]."/hr/data/data.txt", "r");

        while(false !== ($line = fgets($f))){

            $l = explode(":", $line);
            $tr = new Pracownik($l[1], $l[2], $l[3], $l[4], $l[5], $l[0]);

            if($tr->id==$id){
                fclose($f);
                return $tr;
            }
        }
        fclose($f);
        return null;
    }
  public static function del($id){
    $tr = Pracownik::get_by_id($id);
    if(!$tr){
      return 1;
    }
    $line = $tr->get_line();
    $f = $_SERVER["DOCUMENT_ROOT"]."/hr/data/data.txt";
    $contents = file_get_contents($f);
    $contents = str_replace($line."\n", '', $contents);
    file_put_contents($f, $contents);

  }
}

?>
