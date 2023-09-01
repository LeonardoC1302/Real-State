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
}