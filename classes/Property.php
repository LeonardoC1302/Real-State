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
}