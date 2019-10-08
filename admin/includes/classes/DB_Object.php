<?php 

class DB_Object{

    // mencari semua user yang ada
    public static function find_all()
    {
        // get semua data user dari table users
        // $result_set = $db->query("SELECT * FROM users");

        // menunjuk ke sebuah method find_by_query()
        // menggunakan late static binding
        return static::find_by_query("SELECT * FROM ". static::$table ." ");
    }

    // mencari semua user dengan berdasarkan id
    public static function findById($user_id)
    {
        global $db;

        // get semua data user dari table users
        $result_set_array = static::find_by_query("SELECT * FROM ". static::$table . " WHERE id='$user_id' ");
        // $found_user = mysqli_fetch_array($result_set);
        // if(!empty($result_set)){
            
        //     $first_item = array_shift($result_set);
        //     return $first_item;
        
        // } else {
        //     return false;
        // }
        
        return !empty($result_set_array) ? array_shift($result_set_array) : false;
    }

    public static function find_by_query($sql)
    {
        global $db;

        // set perintah query yang ditampung di dalam $result_set
        $result_set = $db->query($sql);

        // membuat array kosong untuk menampung semua properti yang ada
        $object_array = array();

        // mengambil data dari tabel database menggunakan loop sementara dan ditampung dalam $row
        while($row = mysqli_fetch_array($result_set)){
            
            // mengambil hasil tersebut dengan menunjuk pula dari method/fungsi auto_instatiation() dan ditampung di dalam variabel $object_array[]
            $object_array[] = static::instantiation($row);
        }
        
        return $object_array;
    }

    public static function instantiation($the_record)
    {
        // get calling class
        $callingClass = get_called_class();

        $object = new $callingClass; // menginstansiasi class DB_Object

        // $object->id         = $found_user['id'];
        // $object->username   = $found_user['username'];
        // $object->first_name = $found_user['first_name'];
        // $object->last_name  = $found_user['last_name'];

        // short way auto instantiation
        foreach ($the_record as $the_attribute => $value) {
            
            // mengecek keberadaan atribut
            if($object->checking_attributes($the_attribute)){

                $object->$the_attribute = $value;
            }
        }

        return $object;
    }

    // create function for checking attributes
    private function checking_attributes($the_attribute)
    {
        
        // get_object_vars() berfungsi untuk mengambil sebuah variabel dalam objek
        $object_properties = get_object_vars($this);

        // array_key_exists() fungsi cek array untuk kunci tertentu, dan mengembalikan nilai true jika kunci ada dan false jika kunci tidak ada. 
        return array_key_exists($the_attribute, $object_properties);
    }

    // abstract properties
    protected function properties()
    {
        // return get_object_vars($this);

        $properties = array();

        foreach (static::$table_fields as $tb_fields) {
            // mengecek apakah objek atau kelas memiliki properti
            if(property_exists($this, $tb_fields)){

                $properties[$tb_fields] = $this->$tb_fields;
            }
        }
        return $properties;
    }

    // clean properties
    protected function clean_properties()
    {
        global $db;

        $clean_properties = array();

        foreach($this->properties() as $key => $value){
            $clean_properties[$key] = $db->escape_string($value);
        }

        return $clean_properties;
    }    

    // save
    public function save()
    {
        // cheking by id
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create()
    {
        global $db;

        // deklarasi properties
        $properties = $this->clean_properties();    

        $sql = "INSERT INTO " . static::$table . "(" . implode(",", array_keys($properties)) . ")";
        $sql.= "VALUES ('" . implode("','", array_values($properties)) . "')";

        // $sql.= $db->escape_string($this->username). "', '";
        // $sql.= $db->escape_string($this->password). "', '";
        // $sql.= $db->escape_string($this->first_name). "', '";
        // $sql.= $db->escape_string($this->last_name). "')";

        // query validationo
        if($db->query($sql)){
            
            $this->id = $db->insert_id();
            return true;
        
        } else {

            return false;
        }
    }

    public function update()
    {
        global $db;

        // get properties
        $properties = $this->properties();

        $properties_arr = array();

        foreach ($properties as $key => $value) {
            $properties_arr[] = "{$key}='{$value}'";
        }

        $sql  = "UPDATE " . static::$table . " SET ";
        $sql .= implode(", ", $properties_arr);
        // $sql .= "username= '" . $db->escape_string($this->username) . "', ";
        // $sql .= "password= '" . $db->escape_string($this->password) . "', ";
        // $sql .= "first_name= '" . $db->escape_string($this->first_name) . "', ";
        // $sql .= "last_name= '" . $db->escape_string($this->last_name) . "' ";
        $sql .= " WHERE id= '" . $db->escape_string($this->id) . "' ";

        $db->query($sql);

        return (mysqli_affected_rows($db->connection) == 1) ? true : false;
    }

    // delete
    public function delete()
    {
        global $db;

        // // get properties
        // $properties = $this->properties();

        // $properties_arr = array();

        // foreach ($properties as $key => $value) {
        //     $properties_arr[] = "{$key}=>'{$value}'";
        // }

        $sql  = "DELETE FROM " .static::$table. " ";
        $sql .= "WHERE id= ". $db->escape_string($this->id);
        $sql .= " LIMIT 1";

        $db->query($sql);

        return (mysqli_affected_rows($db->connection) == 1) ? true : false;
    }
}

?>