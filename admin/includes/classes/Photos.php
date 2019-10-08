<?php 

class Photos extends DB_Object
{
    // abstracting tables
    protected static $table = "photos";
    protected static $table_fields = array('photos_id','title','description','filename','type','size');
    // properties
    public $photos_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;
}

?>