<?php


class Smartphone
{
    public $id;
    public $name;
    public $picture;
    public $description;
    public $vendor_id;


    public function __construct()
    {
        settype($this->id, 'integer');
        settype($this->vendor_id, 'integer');
    }
}