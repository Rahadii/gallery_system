<?php 

function classAutoLoader($class)
{

    // pembuatan huruf kapital untuk penamaan file
    $class = ucwords($class);
    // path
    $path = "includes/classes/{$class}.php";

    if(file_exists($path))
    {
        include_once($path);
    }
    else
    {
        die("Nama File : {$class}.php, tidak ditemukan");
    }
    
}
    // menggunakan fungsi build-in dari PHP untuk memanggil nama function
    spl_autoload_register('classAutoLoader');

function redirect($location)
{
    header("location: {$location}");
}

?>