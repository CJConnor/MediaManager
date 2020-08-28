<?php

/**
 * Class User
 */
class User extends System {

    protected $object = null;
    protected $table_name = "users";

    /**
     * Construct user object by querying the DB by id
     * @param $id | int or null
     */
    function __construct($id=null) {
        if ($id != null) {
            $db = new Database;
            $db->query("SELECT * FROM users WHERE id = :id");
            $db->bind(':id', $id);
            $this->object = $db->single();
        }
    }

    /**
     * Gets Object
     * @return string
     */
    public function getObj() {
        return $this->object;
    }

    /**
     * Gets users forename
     * @return string
     */
    public function getFirstName() {
        return $this->object != null ? $this->object->forename : "";
    }

    /**
     * Gets users surname
     * @return string
     */
    public function getLastName() {
        return $this->object != null ? $this->object->surname : "";
    }

    /**
     * Gets users full name
     * @return string
     */
    public function getFullName() {
        return $this->object != null ? $this->object->forename . " " . $this->object->surname : "";
    }

    /**
     * Gets users username
     * @return string
     */
    public function getUsername() {
        return $this->object != null ? @$this->object->username : '';
    }

    /**
     * Gets users media list
     * @return array
     */
    public function getMedia() {
        return $this->object != null ? explode(',', $this->object->media) : [];
    }

    /**
     * Adds a media id on the end of the media list
     * @param $mid
     * @return mixed
     */
    public function setMedia($mid) {
        $this->object->media .= empty($this->object->media) ? $mid : "," . $mid;
        return $this->object->media;
    }

    /**
     * Sets the media new order
     * @param $new_order
     */
    public function newOrder($new_order) {
        $this->object->media = $new_order;
    }
}