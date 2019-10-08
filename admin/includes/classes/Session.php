<?php 

class Session{

    // property
    private $signed_in = false; // default value false
    public $user_id;
    public $message;

    function __construct()
    {
        session_start();

        $this->checkLogin();
        $this->check_message();
    }

    // create msg function
    public function message($msg = "")
    {
        if(!empty($msg)){
            
            $_SESSION['message'] = $msg;
        
        }else {
            return $this->message;
        }
    }

    // create check message
    private function check_message()
    {
        if(isset($_SESSION['message'])){
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        
        }else{
            $this->message = "";
        }
    }

    // login
    public function login($user)
    {   
        if($user){
            // menset $user
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;

        }else{

        }
    }

    // logout
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }

    public function is_signed_in()
    {
        return $this->signed_in;
    }

    // fungsi untuk mencek apakah user_id tersebut login atau tidak
    private function checkLogin()
    {
        if(isset($_SESSION['user_id'])){

            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;

        } else {
            
            unset($this->user_id);
            $this->signed_in = false;
        }
    }
}

// instansiasi
$session = new Session(); 
?>