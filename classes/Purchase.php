<?php

class Purchase
{
    public $id;
    public $fname;
    public $lname;
    public $email;
    public $address;
    public $zipcode;
    public $city;
    public $date;
    public $smartphone_id;

    public function __construct()
    {
        settype($this->id, 'integer');
        settype($this->smartphone_id,'integer');
    }
}