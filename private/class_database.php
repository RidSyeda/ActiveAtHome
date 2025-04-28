<?php

class Database {

    static protected $database;
    static protected $table_name = "";
    static protected $primary_key = ""; // 
    static protected $db_columns = [];

    // Set the database connection
    static public function set_database($database) {
        self::$database = $database;
    }

    // Run raw SQL and return an array of objects
    static public function find_by_sql($sql) {
        $result = self::$database->query($sql);
        if (!$result) {
            exit("Database query failed: " . self::$database->error);
        }

        $object_array = [];
        while ($record = $result->fetch_assoc()) {
            $object_array[] = static::instantiate($record);
        }
        return $object_array;
    }

    // Return all rows as object array
    static public function find_all() {
        $sql = "SELECT * FROM " . static::$table_name;
        return static::find_by_sql($sql);
    }

    // Find a record by primary key
    static public function find_by_id($id) {
        $escaped_id = self::$database->escape_string($id);
        $sql = "SELECT * FROM " . static::$table_name .
               " WHERE " . static::$primary_key . " = '" . $escaped_id . "'";
        $obj_array = static::find_by_sql($sql);
        return !empty($obj_array) ? array_shift($obj_array) : false;
    }

    // Convert DB row to object
    static protected function instantiate($record) {
        $object = new static;
        foreach ($record as $property => $value) {
            if (property_exists($object, $property)) {
                $object->$property = $value;
            }
        }
        return $object;
    }

    // Get object attributes (excluding PK)
    public function attributes() {
        $attributes = [];
        foreach (static::$db_columns as $column) {
            if ($column == static::$primary_key) continue;
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    // Return escaped/sanitized attributes
    public function sanitized_attributes() {
        $sanitized = [];
        foreach ($this->attributes() as $key => $value) {
            $sanitized[$key] = self::$database->escape_string($value);
        }
        return $sanitized;
    }

    // Insert a new record
    public function create() {
        $attributes = $this->sanitized_attributes();
        $sql = "INSERT INTO " . static::$table_name . " (";
        $sql .= join(", ", array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";
        $result = self::$database->query($sql);
        
        if($result) {
            $pk = static::$primary_key;
            if(property_exists($this, $pk)) {
                $this->$pk = self::$database->insert_id;
            }
        }
        
        return $result;
    }
    
    // Update a record
    public function update() {
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = [];
        foreach ($attributes as $key => $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }
        $pk = static::$primary_key;
        $escaped_id = self::$database->escape_string($this->$pk);
        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(", ", $attribute_pairs);
        $sql .= " WHERE {$pk} = '{$escaped_id}' LIMIT 1";
        return self::$database->query($sql);
    }

    // Delete a record
    public function delete() {
        $pk = static::$primary_key;
        $escaped_id = self::$database->escape_string($this->$pk);
        $sql = "DELETE FROM " . static::$table_name;
        $sql .= " WHERE {$pk} = '{$escaped_id}' LIMIT 1";
        return self::$database->query($sql);
    }

    // Merge an array of input into object properties
    public function merge_attributes($args = []) {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}

?>