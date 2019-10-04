<?php 

class Users{

    // mencari semua user yang ada
    public function findAllUsers(){
        global $db;

        $result_set = $db->query("SELECT * FROM users");

        return $result_set;
    }
}


?>