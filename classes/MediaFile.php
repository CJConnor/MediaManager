<?php

/**
 * Class MediaFile
 */
class MediaFile extends System {

    protected $object;
    protected $table_name = "media_file";

    public static $mediaFileTypes = ["aac", "mp3", "wav", "mp4", "avi"];
    public static $audioFileTypes = ["aac", "mp3", "wav"];
    public static $videoFileTypes = ["mp4", "avi"];
    public static $imageFileTypes = ["jpg", "png", "jpeg", "gif"];

    /**
     * MediaFile constructor.
     * @param array $media
     */
    function __construct($media=[]) {

        // Instantiate DB connection
        $db = new Database();

        // If there isn't a id then create a empty object from the database
        if (!isset($media['id'])) :
            $db->query("SHOW columns FROM media_file");
            foreach($db->resultSet() as $col) @$this->object->{$col->Field} = "";
            foreach ($media as $key => $value) :
                $this->object->{$key} = $value;
            endforeach;

        // If there is a id then create the object from the database
        else :
            $db->query("SELECT * FROM media_file WHERE id = :id LIMIT 1");
            $db->bind(":id", $media['id']);
            $db->execute();

            try {
                if ($db->rowCount() > 0) :
                    $this->object = $db->single();
                endif;
            } catch (Exception $e) {}

        endif;

    }

    /**
     * Uploads media file
     * @param $file
     * @return array
     */
    public function uploadMediaFile($file) {

        // Create media file name and path
        $target_dir = "../../_assets/uploads/media/";
        $mediaFileType = strtolower(pathinfo(basename($file['name']),PATHINFO_EXTENSION));
        $mediaFile = $target_dir . $this->object->file_name . "." . $mediaFileType;

        // Check media type against accepted ones
        if (!in_array($mediaFileType, self::$mediaFileTypes)) :
            return [0, "Sorry, only AAC, MP3, WAV, MP4 & AVI files are allowed."];
        endif;

        // Upload file and set filename in the object
        if (move_uploaded_file($file["tmp_name"], $mediaFile)) :
            $this->object->file_name .= "." . $mediaFileType;
            return [1];
        else :
            return [0, "Sorry, there was an error uploading your file."];
        endif;
    }

    /**
     * Uploads Image File
     * @param $file
     * @return array
     */
    public function uploadImageFile($file) {

        // Create media file name and path
        $target_dir = "../../_assets/uploads/images/";
        $imageFileType = strtolower(pathinfo(basename($file['name']),PATHINFO_EXTENSION));
        $imageFile = $target_dir . $this->object->image_file . "." . $imageFileType;

        // Check file type against the accepted ones
        if (!in_array($imageFileType, self::$imageFileTypes)) :
            return [0, "Sorry, only JPG, JPEG, PNG & GIF files are allowed."];
        endif;

        // Upload file and set filename
        if (move_uploaded_file($file["tmp_name"], $imageFile)) :
            $this->object->image_file .= "." . $imageFileType;
            return [1];
        else :
            return [0, "Sorry, there was an error uploading your file."];
        endif;
    }


    /**
     * Gets media Id
     * @return mixed|string
     */
    public function getId() {
        return $this->object != null ? $this->object->id : "";
    }

    /**
     * Gets media name
     * @return string
     */
    public function getName() {
        return $this->object != null ? $this->object->name : "";
    }

    /**
     * Gets media filename
     * @return string
     */
    public function getFilename() {
        return $this->object != null ? $this->object->file_name : "";
    }

    /**
     * Gets image filename
     * @return string
     */
    public function getImageFile() {
        return $this->object != null ? $this->object->image_file : "";
    }

    /**
     * Gets category
     * @return string
     */
    public function getCategory() {
        return $this->object != null ? $this->object->category : "";
    }

    /**
     * Gets comment
     * @return string
     */
    public function getComment() {
        return $this->object != null ? $this->object->comment : "";
    }

    /**
     * Sets name
     * @param $name
     */
    public function setName($name) {
        $this->object->name = $name;
    }

    /**
     * Sets filename
     * @param $filename
     */
    public function setFilename($filename) {
        $this->object->file_name = $filename;
    }

    /**
     * Sets Image file name
     * @param $image_file
     */
    public function setImageFile($image_file) {
        $this->object->image_file = $image_file;
    }

    /**
     * sets category
     * @param $cat
     * @return mixed
     */
    public function setCategory($cat) {
        return $this->object->category = $cat;
    }

    /**
     * Sets comment
     * @param $comment
     * @return mixed
     */
    public function setComment($comment) {
        return $this->object->comment = $comment;
    }


}