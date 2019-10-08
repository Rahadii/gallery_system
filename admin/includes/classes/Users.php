<?php 

class Users extends DB_Object {
    
    // abstracting tables
    protected static $table = "users";
    protected static $table_fields = array('username','password','first_name','last_name');
    // properties
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;


    public function verify_user($username, $password)
    {
        global $db;

        $username = $db->escape_string($username);
        $password = $db->escape_string($password);

        $sql     = "SELECT * FROM " . self::$table ." WHERE";
        $sql    .= " username = '{$username}'";
        $sql    .= " AND password = '{$password}'";
        $sql    .= " LIMIT 1";

        // menangkap
        $result = self::find_by_query($sql);

        return !empty($result) ? array_shift($result) : false;

    }
}


?>