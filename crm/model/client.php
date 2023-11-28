<?php

class Client{
    public $imie;
    public $email;
    public $status;
    public $id;
    public function __construct($imie, $email, $status){
        $this->imie = $imie;
        $this->email = $email;
        $this->status = $status;
        $f = fopen($_SERVER["DOCUMENT_ROOT"]."/crm/model/id.counter", "r");
        $id = fgets($f);
        fclose($f);

        $id++;
        $this->id = $id;

        $f = fopen($_SERVER["DOCUMENT_ROOT"]."/crm/model/id.counter", "w");
        fputs($f, $id);
        fclose($f);

    }


}

?>