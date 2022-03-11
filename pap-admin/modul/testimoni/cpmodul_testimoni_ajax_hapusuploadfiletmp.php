<?php
$uploaddir = 'tmp/testimoni/'; 
    if(isset($_POST['filenyo']))
    {
        

        unlink($uploaddir.$_POST['filenyo']);
       
    }
?>