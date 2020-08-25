<?php


class User {

    private $object = null;

    # Construct user object by querying the DB by id
    function __construct($id=null) {
        if ($id != null) {
            $db = new Database;
            $db->query("SELECT * FROM users WHERE id = :id");
            $db->bind(':id', $id);
            $this->object = $db->single();
        }
    }

    public function getObj() {
        return $this->object;
    }

    public function getFirstName() {
        return explode(' ', @$this->object->name)[0];
    }

    public function getLastName() {
        return explode(' ', @$this->object->name)[1];
    }

    public function getName() {
        return $this->object != null ? @$this->object->name : '';
    }

    public function getUsername() {
        return $this->object != null ? @$this->object->username : '';
    }

}