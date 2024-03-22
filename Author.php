<?php

class Author
{
    public $name;

    public $email;
    public $birthdate;


    public function __construct($name, $email, $birthdate)
    {
        $this->name = $name;
        $this->email = $email;
        $this->birthdate = $birthdate;

    }



}