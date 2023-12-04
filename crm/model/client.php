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
        fwrite($f, $this->get_line().PHP_EOL);
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

    public static function get_client($client_id){
        $f = fopen($_SERVER["DOCUMENT_ROOT"]."/crm/data/clients.txt", "r");

        while(false !== ($line = fgets($f))){

            $l = explode(":", $line);
            $client = new Client($l[0], $l[1], $l[2], $l[3]);

            if($client->id==$client_id){
                fclose($f);
                return $client;
            }
        }
        fclose($f);
        return null;
    }
    public function get_line(){
        return "$this->imie:$this->email:$this->status:$this->id";
    }

    public static function del_client($client_id){
        $client = self::get_client($client_id);
        if(!$client){
            return 1;
        }
        
        $line = $client->get_line();
        
        $f = $_SERVER["DOCUMENT_ROOT"]."/crm/data/clients.txt";
        $contents = file_get_contents($f);
        $contents = str_replace($line, '', $contents);
        file_put_contents($f, $contents);

    }

}

?>
