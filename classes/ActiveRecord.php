<?php

namespace App;

class ActiveRecord {
    // DB
    protected static $db;
    protected static $columns_db = [];
    protected static $table = '';

    // Validation
    protected static $errors = [];

    public static function setDB($database){
        self::$db = $database;
    }

    public function save(){
        if(!is_null($this->id)){
            $this->update();
        } else {
            $this->create();
        }
    }

    public function create() {
        $attributes = $this->sanitizeData();
        // Insert data
        $query = "INSERT INTO " . static::$table . " ( ";
        $query .= join(', ', array_keys($attributes));
        $query .= ") VALUES ('";
        $query .= join("', '", array_values($attributes));
        $query .= "')";
        $result = self::$db->query($query);
        if($result) {
            // Redirect to admin
            header('Location: /admin?result=1');
        }
    }

    public function update(){
        // Sanitize inputs
        $attributes = $this->sanitizeData();

        $values = [];
        foreach ($attributes as $key=>$value) {
            $values[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$table . " SET ";
        $query .= join(', ', $values);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1";

        $result = self::$db->query($query);
        if($result) {
            // Redirect to admin
            header('Location: /admin?result=2');
        }
    }
    // Delete a register
    public function delete(){
        $query = "DELETE FROM " . static::$table . " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1";
        $result = self::$db->query($query);
        if($result) {
            $this->deleteImage();
            header('Location: /admin?result=3');
        }
    }

    // Identify all the attributes of the object
    public function attributes(){
        $attributes = [];
        foreach (static::$columns_db as $column) {
            if($column === 'id')  continue; 
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    public function sanitizeData(){
        $attributes = $this->attributes();
        $sanitized = [];
        foreach ($attributes as $key=>$value) {
            $sanitized[$key] = self::$db->escape_string($value);
        }
        return $sanitized;
    }

    public function setImage($image){
        // Delete the previous image
        if(!is_null($this->id)){
            $this->deleteImage();
        }

        if($image){
            $this->image = $image;
        }
    }

    public function deleteImage(){
        $fileExists = file_exists(IMAGES_DIR . $this->image);
        if($fileExists){
            unlink(IMAGES_DIR . $this->image);
        }
    }

    // Validate the inputs
    public static function getErrors() {
        return static::$errors;
    }

    public function validate(){
        static::$errors = [];
        return static::$errors;
    }

    public static function all(){
        $query = "SELECT * FROM " . static::$table;
        $result = self::querySQL($query);
        return $result;
    }

    public static function get($quantity){
        $query = "SELECT * FROM " . static::$table . " LIMIT " . $quantity;
        $result = self::querySQL($query);
        return $result;
    }

    public static function find($id){
        $query = "SELECT * FROM " . static::$table . " WHERE id = $id";
        $result = self::querySQL($query);
        return array_shift($result); // Get the first element of the array
    }

    public static function querySQL($query){
        $result = self::$db->query($query);
        $array = [];
        while($register = $result->fetch_assoc()){
            $array[] = static::createObject($register);
        }
        $result->free(); // Free the memory
        return $array;
    }

    protected static function createObject($register){
        $object = new static;
        foreach($register as $key=>$value){
            if(property_exists($object, $key)){
                $object->$key = $value;
            }
        }
        return $object;
    }

    // Sync the object with the new values
    public function sync($args = []){
        foreach($args as $key=>$value){
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}