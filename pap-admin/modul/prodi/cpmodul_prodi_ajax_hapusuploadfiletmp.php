<?php
$uploaddir = 'tmp/prodi/'; 
    if(isset($_POST['filenyo']))
    {
        

        unlink($uploaddir.$_POST['filenyo']);
       
    }
    else if(isset($_POST['filenyo_pd']))
    {
        

        unlink($uploaddir.$_POST['filenyo_pd']);
       
    }
?>