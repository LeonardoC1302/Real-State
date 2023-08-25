<?php

namespace App;

class Property {
    public $id;
    public $title;
    public $price;
    public $description;
    public $rooms;
    public $wc;
    public $parking;
    public $created;
    public $seller_id;

    public function __construct($args = []) {
        $this->title =  $args['title'] ?? ''; //The title or an empty string
        $this->price =  $args['price'] ?? '';
        $this->description =  $args['description'] ?? '';
        $this->rooms =  $args['rooms'] ?? '';
        $this->wc =  $args['wc'] ?? '';
        $this->parking =  $args['parking'] ?? '';
        $this->created =  date('Y/m/d');
        $this->seller_id =  $args['seller_id'] ?? '';
    }

    public function save() {

    }
}