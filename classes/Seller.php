<?php

namespace App;

class Seller extends ActiveRecord{
    protected static $table = 'sellers';
    protected static $columns_db = ['id', 'name', 'lastName', 'phone'];

    public $id;
    public $name;
    public $lastName;
    public $phone;

    public function __construct($args = []) {
        $this->id =  $args['id'] ?? null; //The id or null
        $this->name =  $args['name'] ?? ''; //The title or an empty string
        $this->lastName =  $args['lastName'] ?? '';
        $this->phone =  $args['phone'] ?? '';
    }

    public function validate(){
        if(!$this->name) {
            self::$errors[] = "The name is mandatory";
        }
        if(!$this->lastName) {
            self::$errors[] = "The last name is mandatory";
        }
        if(!$this->phone) {
            self::$errors[] = "The phone is mandatory";
        }

        if($this->phone && !preg_match('/[0-9]{8}/', $this->phone)){
            self::$errors[] = "The phone must be 8 digits";
        }

        return self::$errors;
    }
}