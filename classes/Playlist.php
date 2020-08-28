<?php

/**
 * Class Playlist
 */
class Playlist extends System {

    protected $object = null;
    protected $table_name = "playlist";

    /**
     * Playlist constructor.
     * @param array $list
     */
    function __construct($list=[]) {

        // Instantiate database connection
        $db = new Database();

        // If there is no id and then create a empty object from the database
        if (!isset($list['id'])) :
            $db->query("SHOW columns FROM playlist");
            foreach($db->resultSet() as $col) @$this->object->{$col->Field} = "";
            foreach ($list as $key => $value) :
                $this->object->{$key} = $value;
            endforeach;

        // If there is a id then create the object from the database
        else :
            $db->query("SELECT * FROM playlist WHERE id = :id LIMIT 1");
            $db->bind(":id", $list['id']);
            $db->execute();

            try {
                if ($db->rowCount() > 0) :
                    $this->object = $db->single();
                endif;
            } catch (Exception $e) {}

        endif;

    }

    /**
     * Gets id
     * @return mixed|string
     */
    public function getId() {
        return $this->object != null ? $this->object->id : "";
    }

    /**
     * Gets name
     * @return string
     */
    public function getName() {
        return $this->object != null ? $this->object->name : "";
    }

    /**
     * Gets media
     * @return array|string
     */
    public function getMedia() {
        return $this->object != null ? explode(',', $this->object->media) : "";
    }

    /**
     * Gets media count
     * @return int|string
     */
    public function getMediaCount() {
        return $this->object != null ? count(explode(',', $this->object->media)) : "";
    }

    /**
     * Sets new media order
     * @param $new_order
     */
    public function newOrder($new_order) {
        $this->object->media = $new_order;
    }

    /**
     * Sets name
     * @param $name
     */
    public function setName($name) {
        $this->object->name = $name;
    }

    /**
     * Sets media
     * @param $media
     */
    public function setMedia($media) {
        $this->object->media = $media;
    }


}