<?php

class Client{
    public $imie;
    public $email;
    public $status;
    public $id;
    public function __construct($imie, $email, $status, $new_id=null){
        $this->imie = $imie;
        $this->email = $email;
        $this->status = $status;
        if(!$new_id){

            $f = fopen($_SERVER["DOCUMENT_ROOT"]."/crm/model/id.counter", "r");
            $id = fgets($f);
            fclose($f);
            
            $id++;
            $this->id = $id;
            
            $f = fopen($_SERVER["DOCUMENT_ROOT"]."/crm/model/id.counter", "w");
            fputs($f, $id);
            fclose($f);
        }
        else{
            $this->id= $new_id;
        }

    }

    public function save(){
        $f = fopen($_SERVER["DOCUMENT_ROOT"]."/crm/data/clients.txt", "a");
        fwrite($f, "$this->imie:$this->email:$this->status:$this->id\n");
        fclose($f);
    }

    public static function load(){
        $clients = [];
        $f = fopen($_SERVER["DOCUMENT_ROOT"]."/crm/data/clients.txt", "r");

        while(false !== ($line = fgets($f))){

            $l = explode(":", $line);
            $client = new Client($l[0], $l[1], $l[2], $l[3]);

            array_push($clients, $client);
        }

        fclose($f);
        return $clients;
    }


}

?>