<?php

namespace App;

class Property extends ActiveRecord{
    protected static $table = 'properties';
    protected static $columns_db = ['id', 'title', 'price', 'image', 'description', 'rooms', 'wc', 'parking', 'created', 'seller_id'];
    
    public $id;
    public $title;
    public $price;
    public $image;
    public $description;
    public $rooms;
    public $wc;
    public $parking;
    public $created;
    public $seller_id;

    public function __construct($args = []) {
        $this->id =  $args['id'] ?? null; //The id or null
        $this->title =  $args['title'] ?? ''; //The title or an empty string
        $this->price =  $args['price'] ?? '';
        $this->description =  $args['description'] ?? '';
        $this->rooms =  $args['rooms'] ?? '';
        $this->wc =  $args['wc'] ?? '';
        $this->parking =  $args['parking'] ?? '';
        $this->created =  date('Y/m/d');
        $this->seller_id =  $args['seller_id'] ?? '';
        $this->image =  $args['image'] ?? '';
    }

    public function validate(){
        if(!$this->title) {
            self::$errors[] = "The title is mandatory";
        }
        if(!$this->price) {
            self::$errors[] = "The price is mandatory";
        }
        if(strlen($this->description) < 25) {
            self::$errors[] = "The description is mandatory and must be at least 25 characters";
        }
        if(!$this->rooms) {
            self::$errors[] = "The room quantity is mandatory";
        }
        if(!$this->wc) {
            self::$errors[] = "The bathroom quantity is mandatory";
        }
        if(!$this->parking) {
            self::$errors[] = "The parking quantity is mandatory";
        }
        if(!$this->seller_id) {
            self::$errors[] = "The seller is mandatory";
        }
        // Image validation
        if(!$this->image){
            self::$errors[] = "The image is mandatory";
        }
        return self::$errors;
    }
}