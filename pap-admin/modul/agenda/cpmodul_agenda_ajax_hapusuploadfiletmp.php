<?php
$uploaddir = './tmp/berita/'; 
    if(isset($_POST['filenyo']))
    {
        

        unlink($uploaddir.$_POST['filenyo']);
       
    }
?>