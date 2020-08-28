<?php

/**
 * Class System
 */
class System  {

    protected $object = null;
    protected $table_name = "";

    /**
     * Inserts object into the database
     * @return string
     */
    public function create() {

        // Instantiate database connection
        $db = new Database();

        $properties = "";
        $values = "";

        // If there is an object id unset it
        if (isset($this->object->id))
            unset($this->object->id);

        // Build the properties and values for the sql statement
        foreach (get_object_vars($this->object) as $property => $value ) :
            $properties .= $property . ",";
            $values .= ":" . $property . ",";
        endforeach;

        // Remove the last comma from the strings
        $properties = rtrim($properties, ",");
        $values = rtrim($values, ",");

        // Build sql query
        $db->query("INSERT INTO " . $this->table_name . " (" . $properties . ") VALUES (" . $values . ")");

        // Bind values to the sql query
        foreach (get_object_vars($this->object) as $property => $value) :
            $db->bind(":" . $property, $value);
        endforeach;

        // Execute query
        $db->execute();

        $this->object->id = $db->lastInsertId();

        return $db->lastInsertId();

    }

    /**
     * Updates existing database entry with a object
     * @return mixed
     */
    public function update () {

        // Instantiate Database connect
        $db = new Database();

        $sql_set = "";

        // Build the sql set
        foreach (get_object_vars($this->object) as $property => $value) :
            $sql_set .= $property . " = :" . $property . ",";
        endforeach;

        // Remove last comma from string
        $sql_set = rtrim($sql_set, ",");

        // Build sql query
        $db->query("UPDATE " . $this->table_name . " SET " . $sql_set . " WHERE id = :id LIMIT 1");

        // Bind values to the sql statement
        foreach (get_object_vars($this->object) as $property => $value) :
            $db->bind(":" . $property, $value);
        endforeach;

        // Execute query
        $db->execute();

        return $this->object->id;

    }

    /**
     * Decides between inserting and updating in the database
     * @return mixed|string
     */
    public function save() {

        if ($this->object->id === "") :
            return $this->create();
        else :
            return $this->update();
        endif;

    }

}