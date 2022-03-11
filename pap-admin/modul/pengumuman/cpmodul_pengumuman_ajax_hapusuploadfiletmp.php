<?php
$uploaddir = 'tmp/pengumuman/'; 
    if(isset($_POST['filenyo']))
    {
        

        unlink($uploaddir.$_POST['filenyo']);
       
    }
?>