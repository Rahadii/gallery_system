<?php 
    require_once('config.php');

    class Database{

        // untuk menampung mysqli_connect()
        public $connection;

        function __construct()
        {
            $this->open_db_connection();
        }

        // membuat sebuah fungsi untuk menyambungkan ke database
        public function open_db_connection(){
            
            // $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            
            $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if($this->connection->connect_errno){
                die("Database Connection Failed : " . $this->connection->connect_error);
            }
        }

        // query function
        public function query($sql){
            // $result = mysqli_query($this->connection, $sql);
            
            $result = $this->connection->query($sql);

            // panggil confirm query untuk dieksekusi
            $this->confirm_query($result);

            return $result;
        }

        private function confirm_query($result){
            // validasi
            if(!$result){
                die("Query Gagal" . $this->connection->error);
            }            
        }

        public function escape_string($string){
            // $escapeString = mysqli_escape_string($this->connection, $string);

            $escapeString = $this->connection->escape_string($string);

            // return
            return $escapeString;
        }

        public function insert_id(){

        }
    }

    $db = new Database();

?>