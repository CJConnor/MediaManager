<?php

/**
 * Class Category
 */
class Category extends System {

    protected $object = null;
    protected $table_name = "category";

    /**
     * Category constructor.
     * @param array $cat
     */
    function __construct($cat=[]) {

        // Instantiate database connection
        $db = new Database();

        // If there is not id create a empty object using the database
        if (!isset($cat['id'])) :
            $db->query("SHOW columns FROM category");
            foreach($db->resultSet() as $col) @$this->object->{$col->Field} = "";
            foreach ($cat as $key => $value) :
                $this->object->{$key} = $value;
            endforeach;

        // If there is and id then create the object from the database
        else :
            $db->query("SELECT * FROM category WHERE id = :id LIMIT 1");
            $db->bind(":id", $cat['id']);
            $db->execute();

            try {
                if ($db->rowCount() > 0) :
                    $this->object = $db->single();
                endif;
            } catch (Exception $e) {}

        endif;
    }

    /**
     * Gets category by name and user id
     * @param $name
     * @param $uid
     * @return Category|null
     */
    public function getCategory($name, $uid) {

        // Instantiate database connection
        $db = new Database();

        // Query the database using name and user id
        $db->query("SELECT id FROM category WHERE name = :name AND uid = :uid LIMIT 1");
        $db->bind(":name", $name);
        $db->bind(":uid", $uid);
        $db->execute();

        try {

            // If there is a database entry, grab it and create an object from it
            if ($db->rowCount() > 0) :
                $row = $db->single();
                $cat =  new self(['id' => $row->id]);
            else:
                $cat = null;
            endif;

        } catch (Exception $e) {}

        return $cat;

    }

    /**
     * Get Category Id
     * @return mixed|string
     */
    public function getId() {
        return $this->object != null ? $this->object->id : "";
    }

    /**
     * Get Category Name
     * @return string
     */
    public function getName() {
        return $this->object != null ? $this->object->name : "";
    }

    /**
     * Sets Category Name
     * @param $name
     */
    public function setName($name) {
        $this->object->name = $name;
    }

}