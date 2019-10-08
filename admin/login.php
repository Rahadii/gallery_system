<?php require_once('includes/header.php'); ?>

<?php 
// set apabila dia session ada
if($session->is_signed_in()){
    redirect("index.php");
}

if(isset($_POST['submit'])){
    // deklarasi variabel
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // memanggil fungsi/method dari class User
    $user_found = Users::verify_user($username, $password);

    // method untuk mengecek database
    if($user_found){
        $session->login($user_found);
        redirect("index.php");
    }else{
        $msg = "Password atau Username anda salah !";
    }

}else {
        $msg = "";
        $username = "";
        $password = "";
}
?>

<body style="background : white;">
    <div class="col-md-4 col-md-offset-3">
        <h2 class="text-center">Login</h2>        
        <h4><?= $msg; ?></h4>
        
        <form id="login-id" action="" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?= htmlentities($username); ?>"/>
        </div>  
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?= htmlentities($password); ?>" />
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </div>
    </div>
</form>
