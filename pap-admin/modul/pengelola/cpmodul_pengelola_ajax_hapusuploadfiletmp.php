<?php
$uploaddir = 'tmp/pengelola/'; 
    if(isset($_POST['filenyo']))
    {
        

        unlink($uploaddir.$_POST['filenyo']);
       
    }
?>